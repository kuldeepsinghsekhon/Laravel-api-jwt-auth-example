<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/vendor/autoload.php'); // require paypal files

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;

class Paypal extends MY_Controller
{
    public $_api_context;

    function  __construct()
    {
        parent::__construct();
        $this->load->model('paypal_model');
        // paypal credentials
        //$this->config->load('paypal');
        $config['client_id'] = 'AfLLkWIVeAJRz8UqH224GYzXJh_f2tUGr7rQg0c2bnRTH_WDVY1MQT0iarXxy0pvcd_MFvykPHQO-crU';
        $config['secret'] = 'ENE4GUdVD99gWstIZ4AaGijZSi_wHtDwUL3j2moJMEURm-XBGC44oEfjeh9dGlusn5zqRlWmMtbekcWf';
         $this->_api_context = new \PayPal\Rest\ApiContext(
          new \PayPal\Auth\OAuthTokenCredential(
            $config['client_id'],
            $config['secret']
          )
        );
       /* $this->_api_context = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $this->config->item('client_id'), $this->config->item('secret')
            )
        );*/
    }

    function index(){
        $booking_data = $this->booking_model->get_bookings(array('id'=>$this->session->userdata('booking_id')));
        $plan_data = $this->plan_model->get_plans(array('id'=>$booking_data[0]['plan_id']));
        $service_data = $this->service_model->get_services(array('id'=>$booking_data[0]['service_id']));
        // echo'<pre>';print_r($booking_data);die;
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        $payment=$booking_data[0]['payment_before_event'];
        // Set redirect URLs
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(base_url('paypal/process'))
          ->setCancelUrl(base_url('paypal/cancel'));
        $item1 = new Item();
        $item1->setName('"'.$plan_data[0]['plan_name'].'" plan, '.$plan_data[0]['mariachis'].' musicians, '.$service_data[0]['hour'].' hours')
          ->setCurrency('USD')
          ->setQuantity(1)
          ->setPrice($payment);

        $itemList = new ItemList();
        $itemList->setItems(array($item1));

        // Set payment details
        $details = new Details();
        $details->setTax(30)
          ->setSubtotal($payment);

        // Set payment amount
        $amount = new Amount();
        $amount->setCurrency("USD")
          ->setTotal($payment+30)
          ->setDetails($details);

        // Set transaction object
        $transaction = new Transaction();
        $transaction->setAmount($amount)
          ->setItemList($itemList)
          ->setDescription("Payment description")
          ->setInvoiceNumber(uniqid());
        $payment = new Payment();
        $payment->setIntent('sale')
          ->setPayer($payer)
          ->setRedirectUrls($redirectUrls)
          ->setTransactions(array($transaction));

          // Create payment with valid API context
        try {
          $payment->create($this->_api_context);

          // Get PayPal redirect URL and redirect the customer
          $approvalUrl = $payment->getApprovalLink();

        header('Location: '.$approvalUrl);
          // Redirect the customer to $approvalUrl
        } catch (PayPal\Exception\PayPalConnectionException $ex) {
          echo $ex->getCode();
          echo $ex->getData();
          echo '<pre>';print_r($ex);die;
        } catch (Exception $ex) {
            echo '<pre>';print_r($ex);die;
        }
       // $this->load->view('content/payment_credit_form');
    }


    function process()
    {

        $paymentId = $_GET['paymentId'];
        $payment = Payment::get($paymentId,  $this->_api_context);
        $payerId = $_GET['PayerID'];

        // Execute payment with payer ID
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
          // Execute payment
          $result = $payment->execute($execution,  $this->_api_context);
          echo"<pre>";print_r($result);die;
          redirect(base_url('paypal/success'));
          //var_dump($result);
          // $this->load->view("content/success");
        } catch (PayPal\Exception\PayPalConnectionException $ex) {
          echo $ex->getCode();
          echo $ex->getData();
          die($ex);
        } catch (Exception $ex) {
          die($ex);
        }
        

    }

    function success()
    {
        $this->load->view("templates/header");
        $this->load->view("paypal/success");
        $this->load->view("templates/footer");
    }
    function cancel()
    {
        $this->session->$this->session->set_flashdata('payment_cancelled', 'Payment Cancelled.');
        $data['booking_data'] = $this->booking_model->get_bookings(array('id'=>$this->session->userdata('booking_id')));
        $this->load->view('bookings/view', $data);
    }
}