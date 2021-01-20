<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stripe extends MY_Controller {
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('stripe_model');
    }
    
    
    public function index()
    {   
        // $this->load->view('header');
        $this->load->view('templates/header');
        $this->load->view('stripe_payment/view');
        $this->load->view('templates/footer');
        // $this->load->view('footer');
    }
    
    public function payment($token = null)
    {   
        if($token === null)
            die;

        $booking_data = $this->booking_model->get_bookings(array('id'=>$this->session->userdata('booking_id')));
        $plan_data = $this->plan_model->get_plans(array('id'=>$booking_data[0]['plan_id']));
        $service_data = $this->service_model->get_services(array('id'=>$booking_data[0]['service_id']));
        // echo'<pre>';print_r($booking_data);die;

         require_once('./vendor/stripe_payment/stripe/stripe-php/init.php');
    
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
     
       $charge = \Stripe\Charge::create ([
                "amount" => $booking_data[0]['payment_before_event'],
                "currency" => "USD",
                "source" => $token,
                "description" => "Booking Payment",
                'shipping' => [
                    'name' => $booking_data[0]['name'],
                    'address' => [
                      'line1' => '510 Townsend St',
                      'postal_code' => '98140',
                      'city' => 'San Francisco',
                      'state' => 'CA',
                      'country' => 'US',
                    ]
                  ]
        ]);
    $chargeJson = $charge->jsonSerialize();
        
 // echo '<pre>';print_r($chargeJson);die;   
    date_default_timezone_set("Asia/Calcutta");    
  /*  for insert data in database start */
     if($chargeJson['status'] === 'succeeded'):
      $insert_data = array(
                        'booking_id'            => $booking_data[0]['id'],
                        'txn_id'                => $chargeJson['balance_transaction'],
                        'card_id'              =>  $chargeJson['source']['id'],
                        'paid_amount'           => $chargeJson['amount'],
                        'payment_status'        => $chargeJson['status'],
                        'created_date'          => strtotime(date('d-m-Y h:i:s a')),
                        'payment_data'          => serialize($chargeJson)
                         );
            
            
            $this->stripe_model->insert_data($insert_data);
                  /*  for insert data in database close */

            // update booking table column payment_status
            $this->booking_model->update_booking(array('payment_status'=>'half_paid'), array('id'=>$booking_data[0]['id']));                
            
            $this->session->sess_destroy();  
            $this->session->set_flashdata('success', 'Payment made successfully.');
            
            $data['name'] = $booking_data[0]['name'];
            $data['paid'] = $chargeJson['amount'];
            $data['date_time'] = date('d-m-Y h:i:s a');
            $data['txn_id'] = $chargeJson['balance_transaction'];

            $this->load->view('templates/header');   
            $this->load->view('stripe_payment/success', $data);   
            $this->load->view('templates/footer');   
            //redirect('/stripe/Payments/index', 'refresh');

    elseif($chargeJson['status'] === 'payment_failed'):
        $this->session->set_flashdata('payment_failed', 'Payment Failed');
        redirect(base_url('contract/'.$booking_data[0]['email'].'/'.$booking_data[0]['id'].'/'.$booking_data[0]['contract_id']));

    endif;
    }
}