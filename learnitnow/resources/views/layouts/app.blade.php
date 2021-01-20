
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('assets/libs/slider/css/bootstrap-slider.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/libs/daterangepicker/daterangepicker.css') }}" rel="stylesheet"/>

	<link rel="stylesheet" href="{{ asset('css/style.css')}}">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.3/css/intlTelInput.css" />
    <!-- Material design icons -->
    <link href="{{ asset('assets/fonts/mdi/css/materialdesignicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->

    <link href="{{ asset('assets/css/simcify.min.css') }}" rel="stylesheet">
  <!--Custom template CSS Responsive-->
  <!-- <link href="{{ asset('assets/assets/webcss/site-responsive.css')}}" rel="stylesheet"> -->
       <!--Animated CSS -->
     <link href="{{ asset('assets/assets/webcss/animate.css')}}" rel="stylesheet">
     <!--Owsome Fonts -->
    <link rel="stylesheet" href="{{ asset('assets/assets/owlslider/owl-carousel/owl.carousel.css')}}">
    <!-- Default template -->
    <link rel="stylesheet" href="{{ asset('assets/assets/owlslider/owl-carousel/owl.template.css')}}">

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- <link href="{{ asset('assets/assets/css/bootstrap.min.css')}}" rel="stylesheet"> -->
    <!--Custom template CSS-->
     

</head>

<body>	
 @include('layouts.includes.header')
 @yield('contents')
 @include('layouts.includes.footer')

<script>let modalId = $('#image-gallery');
$(document)
  .ready(function () {

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current) {
      $('#show-previous-image, #show-next-image')
        .show();
      if (counter_max === counter_current) {
        $('#show-next-image')
          .hide();
      } else if (counter_current === 1) {
        $('#show-previous-image')
          .hide();
      }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr) {
      let current_image,
        selector,
        counter = 0;

      $('#show-next-image, #show-previous-image')
        .click(function () {
          if ($(this)
            .attr('id') === 'show-previous-image') {
            current_image--;
          } else {
            current_image++;
          }

          selector = $('[data-image-id="' + current_image + '"]');
          updateGallery(selector);
        });

      function updateGallery(selector) {
        let $sel = selector;
        current_image = $sel.data('image-id');
        $('#image-gallery-title')
          .text($sel.data('title'));
        $('#image-gallery-image')
          .attr('src', $sel.data('image'));
        disableButtons(counter, $sel.data('image-id'));
      }

      if (setIDs == true) {
        $('[data-image-id]')
          .each(function () {
            counter++;
            $(this)
              .attr('data-image-id', counter);
          });
      }
      $(setClickAttr)
        .on('click', function () {
          updateGallery($(this));
        });
    }
  });

// build key actions
$(document)
  .keydown(function (e) {
    switch (e.which) {
      case 37: // left
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
          $('#show-previous-image')
            .click();
        }
        break;

      case 39: // right
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
          $('#show-next-image')
            .click();
        }
        break;

      default:
        return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
  });

//Filter Button

$(document).ready(function(){

  $(".filter-button").click(function(){
      var value = $(this).attr('data-filter');
      $(".filter-button.active").removeClass('active');
      $(this).addClass('active');
      if(value == "todo")
      {
          //$('.filter-button').removeClass('hidden');
          $('.filter').show('1000');
      }
      else
      {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
          $(".filter").not('.'+value).hide('3000');
          $('.filter').filter('.'+value).show('3000');
          
      }
	  
  });

});
/* $(document).ready(function() {
    $('#datatable').DataTable();
} ); */

</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w==" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/blackdollar.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/simcify.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.3/js/intlTelInput.min.js"></script>
<script src="{{ asset('assets/assets/tinymce/tinymce.min.js') }}"></script>
	<!--  parallax.js-1.4.2  -->
    <script type="text/javascript" src="{{ asset('assets/assets/parallax.js-1.4.2/parallax.js') }}"></script>
<script>    
@auth
var authenticated = true;
@else
var authenticated = false;
@endif
</script>
	<script>

// $(".course-toc").on("click",function() {
// 		if($('.data-toc').length){
// 			$(".toc-items").hide();
// 			$(".toc-items").removeClass('data-toc');
// 		}else{
// 			$(".toc-items").addClass('data-toc');
// 			$(".toc-items").show();
// 		}
//     });

    $(".chapter_rw").on("click",function() {
		$(this).siblings('.toc-items').slideToggle();
    $(this).find('i').toggleClass("fa fa-caret-down");
    $(this).find('i').toggleClass("fa fa-caret-right");
    });
	</script>
<script>
    $(".phone-input").intlTelInput({

          autoPlaceholder: "polite",

          placeholderNumberType: "FIXED_LINE",

           utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.3/js/utils.js"

    });
    $(".phone-input").blur(function() {
      if ($.trim($(this).val())) {
        if (!$(this).intlTelInput("isValidNumber")) {
            $(this).val('');
            toastr.error("Invalid phone number.", "Oops!", {timeOut: null, closeButton: true});
        }else{
            toastr.clear();
        }
      }
    })
     $(".phone-input").change(function(){
        $(this).closest(".intl-tel-input").siblings(".hidden-phone").val($(this).intlTelInput("getNumber"));
    });
</script>
</body>

</html>