


/**
 * Active Links
 */
$('#navigation ul li a[href="'+window.location.pathname+'"]').parent().addClass('active');

/*
 * When buy product button is clicked
 *
 */
$(".buy-product").click(function(event){
    event.preventDefault();
    var productid = $(this).attr("data-id");
    if(authenticated){
        showCardPaymentForm({
            buttonClass: "submit-button",
            callback: "stripeToken('buyproduct("+productid+", response.id)')"
        });
    }else{
        $("#createaccount").modal("show");
    }
});
 
 
/*
 * Buy product
 */
 function buyproduct(productid, token){
    showLoader();
    server({ 
        url: buyproductUrl,
        data: {
            "productid": productid,
            "token": token
        },
        loader: true
    });
 }

/*
 * get stripe token
 */
 function stripeToken(callback){
    showLoader();
    var $form = $(".card-payment-form");
    // Reset the token first
    Stripe.card.createToken($form, function(status, response) {
    if (response.error) {
    	hideLoader();
    	toastr.clear();
    	toastr.error(response.error.message, "Oops!", {
    		closeButton: true
    	});
    	return false;
    } else {
        hideLoader();
        eval(callback);
    }
    });
 }


/*
 * Choose swag option
 */
$(".swag-option").click(function(event){
	event.preventDefault();
	$("input[name=swag_name]").val($(this).attr("swag-title"));
	$("input[name=image_url]").val($(this).attr("swag-url"));
	$("#swagmodal").modal("show");
});


/*
 * view teemill product
 */
$(".teemill-form").submit(function(event){
	event.preventDefault();
	$(this).parsley().validate();
	if (($(this).parsley().isValid())) {
		showLoader();
		var item_code = $("select[name=item_code]").val();
		var image_url = $("input[name=image_url]").val();
		var product_name = $("input[name=swag_name]").val();
	    $.get("https://teemill.co.uk/api-access-point/?api_key="+teemilApiKey+"&item_code="+item_code+"&product_name="+product_name+"&colour=White&image_url="+image_url, function(data, status){
          hideLoader();
          window.open(data);
        });
	}
});


/*
 * view teemill product
 */
$(document).on("click", ".next-step", function(event){
    event.preventDefault();
    var validateSec = $(this).attr("validate");
    var nextSec = $(this).attr("href");
	$(validateSec).parsley().validate();
	if (($(validateSec).parsley().isValid())) {
	    $(".tab-pane").removeClass("in active show");
	    $(nextSec).addClass("in active show");
	}
});


/*
 * view teemill product
 */
$(document).on("click", ".back-step", function(event){
    event.preventDefault();
    var nextSec = $(this).attr("href");
    $(".tab-pane").removeClass("in active show");
    $(nextSec).addClass("in active show");
});



/*
 * When request mentorship button is clicked
 *
 */
$(".request-mentorship").click(function(event){
    event.preventDefault();
    var mentorid = $(this).attr("data-id");
    var mentorname = $(this).attr("data-name");
    if(authenticated){
        $("input[name=mentorname]").val(mentorname);
        $("input[name=mentorid]").val(mentorid);
        $("textarea[name=message]").val('');
        $("#requestmentorship").modal("show");
    }else{
        $("#createaccount").modal("show");
    }
});


/*
 * Close mentorship request modal
 *
 */
function closeRequestModal(){
    $("#requestmentorship").modal("hide");
}





