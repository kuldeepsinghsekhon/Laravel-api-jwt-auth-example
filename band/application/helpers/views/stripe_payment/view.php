<style>
#paymentFrm {
    margin: auto;
    width: 40%;
}
</style>

<!-- stripe payment form -->
<form action="<?=base_url('payment')?>" method="POST" id="paymentFrm">   
        <span class="payment-errors alert"></span>
        
        <div class="form-group">
        <label>Card Number</label>
        <input type="text" name="card_num" size="20" autocomplete="off" class="card-number form-control" placeholder="Please enter card number"/>
        </div> 

        <div class="form-group">
        <label>CVC</label>
        <input type="text" name="card_cvc" size="4" autocomplete="off" class="card-cvc form-control" placeholder="Please enter cvc"/>
        </div>

        <div class="form-group">
        <label>Card Expiry Month</label>    
        <input type="text" name="card_exp_month" size="2" class="card-expiry-month form-control" placeholder="Please enter month"/>
        </div>    

        <div class="form-group">
        <label>Card Expiry Year</label>      
        <input type="text" name="card_exp_year" size="4" class="card-expiry-year form-control" placeholder="Please enter year"/>
        </div>
    
        <div class="form-group">
        <button type="submit" id="payBtn" class="btn btn-success">Pay Now</button>
        </div>


    
</form>
  

<!-- Stripe JavaScript library -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>   
<!-- <script src='https://js.stripe.com/v3/' type='text/javascript'></script> -->

<script type="text/javascript">
//set your publishable key
Stripe.setPublishableKey('pk_test_pjnfnPfHMSsGxDwZfcTfsjpE00Dlg2bmdI');

//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        $('#payBtn').removeAttr("disabled");
        //display the errors on the form
        $(".payment-errors").html('<div class="alert alert-danger">'+response.error.message+'</div>');
    } else {
        var form$ = $("#paymentFrm");
        //get token id
        var token = response['id'];
        //insert the token into the form
        form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
        //submit form to the server
        form$.get(0).submit();
    }
}
$(document).ready(function() {
    //on form submit
    $("#paymentFrm").submit(function(event) {
        //disable the submit button to prevent repeated clicks
        $('#payBtn').attr("disabled", "disabled");
        
        //create single-use token to charge the user
        Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
        
        //submit from callback
        return false;
    });
});
</script>
