
/**
 * When Jquery is ready
 */
$(document).ready(function(){
    
    

    /**
     * Close a modal
     */
    $(".mc-modal__close").click(function(event){
        event.preventDefault();
        $(this).closest(".mc-modal").hide();
    });
    


    /**
     * Give gift
     */
    $(".give-gift").click(function(event){
        event.preventDefault();
        $(".gift-form").parsley().validate();
        if (($(".gift-form").parsley().isValid())) {
            showCardPaymentForm({
                buttonClass: "submit-button",
                callback: "stripeToken('giveGift(response.id)')"
            });
        }
    });
    
    

    
    /**
     * watch preview video
     */
    $(".brightcove-popover-trigger").click(function(){
        $(".brightcove-popover").addClass("visible");
        $("body").addClass("modal-active");
        videojs("preview-video").play();
    });
    
    
    /**
     * stop preview video
     */
    $(".legacy-mc-modal-close").click(function(event){
        event.preventDefault();
        videojs("preview-video").pause();
        $(".brightcove-popover").removeClass("visible");
        $("body").removeClass("modal-active");
    });
    
    
    
    /**
     * Launch login modal
     */
    $(".authentication-modal-trigger").click(function(event){
        event.preventDefault();
        $(".login-modal").show();
    });
    
    
    
    /**
     * Launch search modal
     */
    $(".launch-search").click(function(event){
        event.preventDefault();
        $(".search-modal").show();
    });
    
    
    /**
     * Give a gift
     */
    $(".class-gift").click(function(event){
        event.preventDefault();
        if(authenticated){
            $(".gift-modal").show();
        }else{
            $(".login-modal").show();
        }
    });
    
    
    /**
     * Get all access
     */
    $(".all-access").click(function(event){
        event.preventDefault();
        if(authenticated){
            showCardPaymentForm({
                buttonClass: "submit-button",
                callback: "stripeToken('allAccess(response.id)')"
            });
        }else{
            $(".login-modal").show();
        }
    });
    
});
 
 
/*
 * Get all access
 */
 function allAccess(token){
    showLoader();
    server({ 
        url: allAccessUrl,
        data: {
            "token": token
        },
        loader: true
    });
 }

 
 
/*
 * submit gift form
 */
 function giveGift(token){
    showLoader();
    $("input[name=token]").val(token);
    $(".gift-form").submit();
 }
