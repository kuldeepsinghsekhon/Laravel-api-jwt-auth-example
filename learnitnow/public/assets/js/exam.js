/*!
 * Builder.js
 * Version 1.0 - built Sat, Oct 6th 2018, 01:12 pm
 * https://simcycreative.com
 * Simcy Creative - <hello@simcycreative.com>
 * Private License
 */



$(document).ready(function() {
	initSortable();
});


/*
 *  Initialize sortable 
 */
 function initSortable() {
 	$( ".chapter-holder" ).sortable({
	  stop: function( event, ui ) {
	  	indexing();
	  }
	});
 }

/*
 *  when class name is updated
 */
 $(".class-name").keyup(function() {
 	$(".page-header h3").text($(this).val());
 })


/*
 *  Load sections
 */
var sections = {};
$.getJSON(sectionsUrl, function(json) {
    sections = json;
});



/*
 *  check if builder is ready
 */
function builderReady() {
	if ( !jQuery.isReady ) {  
		toastr.warning("Some assests are still loading.", "A moment please!");
	    return false;
	} 
}


/*
 *  Add a new lecture
 */
  $(".chapter-holder").on("click", ".add-choice", function (event) {
	builderReady();
	event.preventDefault();
	var chapter = $(this).closest(".panel");
	var choiceHolder = chapter.find(".choices-holder");
	choiceHolder.append(sections.choice);
	console.log('T'+sections.choice);
	indexing();
 });



/*
 *  chapter & lecture indexing
 */
function indexing() {
       $(".panel.chapter").each(function(index) { 
       		$(this).find(".panel-title .indexing").text(index + 1 +".)");
       		$(this).find("input.question-indexing").val(index + 1);
       		$(this).find(".single-answer").each(function(i) {
       			$(this).find(".indexing").text(i + 1);
       			$(this).find(".correct-answer-box").each(function() {
       				var uniqueKey = random();
       				$(this).find("label").attr("for", "choice"+uniqueKey);
       				$(this).find("input.correct-answer").attr("id", "choice"+uniqueKey);   	
       			});
       			$(this).find("input, select").each(function() {
       				var newName = $(this).attr("original-name")+parseInt(index + 1)+"[]";
       				$(this).attr("name", newName);       			
       			});
       		});
	    });
}

/*
 *  Add a new lecture
 */
  $(".chapter-holder").on("click", ".delete-choice", function (event) {
	event.preventDefault();
	if ($(this).closest(".choices-holder").find(".single-answer").length > 1) {
		$(this).closest(".single-answer").remove();
		indexing();
	}else{
		notify("Hmm!","A question must have atleast one choice","warning");
	}
 });


/*
 *  Add a new question
 */
 $(".add-question").click(function (event) {
	 event.preventDefault();
	 console.log(sectionsUrl);
	builderReady();
	$(".collapse").collapse("hide");
	$(".chapter-holder").append(sections.question);
	$(".empty-section").remove();
	questionCallback();
	$("html, body").animate({ scrollTop: $(document).height() }, 1000);
 });



/*
 *  chapter call back
 */
function questionCallback() {
	var uniqueKey = random({
								    length: 16,     
								    type: "alphabel",     
								    case :"upper"     
								});
	var newElement = $("body").find(".newly");
	newElement.find(".panel-title a").attr("href", "#div-"+uniqueKey);
	newElement.find(".panel-collapse").attr("id", "div-"+uniqueKey);
	newElement.removeClass("newly");
	initSortable();
	indexing();
}



/*
 *  delete a chapter or lecture
 */
$(".chapter-holder").on("click", ".manage-class.delete-item", function (event) {
	event.preventDefault();
	var selectedItem = $(this).closest(".chapter");
	itemId = $(this).attr("data-id");
	csrf_token = $(this).attr("data-csrf");
	swal({
		title: "Are you sure?",
		text: "This question will be deleted and will not recovered.",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#ff1a1a",
		confirmButtonText: "Yes, delete it!",
		closeOnConfirm: true
	}, function() {
		
		selectedItem.remove();
		indexing();
	 	if (!$(".chapter-holder").find(".chapter").length) {
	 		$(".chapter-holder").html('<div class="empty-section"><i class="mdi mdi-clipboard-text"></i><h5>No questions here, add a new one below!</h5></div>');
		 }
		 
		if (itemId !== undefined) {
			deleteSection(itemId, csrf_token);
		}
	});
});


/*
 *  when correct answer is updated/set
 */
  $(".chapter-holder").on("change", ".correct-answer", function (event) {
	
  	if ($(this).prop("checked")) {
		$(this).prev().attr("checked", false);
		  $(this).prev().prop("checked", false);
		  console.log('true');
  	}else{
		$(this).prev().attr("checked", true);
  		$(this).prev().prop("checked", true);
  	}
 });


/*
 *  when chapter title is updated
 */
  $(".chapter-holder").on("keyup", ".chapter-title", function (event) {
  	var title = $(this).val();
  	$(this).closest(".panel").find(".panel-label").text(title);
 });


/*
 *  when class name is updated
 */
$("body").on("change", ".send-to-server-change-checkbox", function (event) {
	event.preventDefault();
	var holder = $(this);
	if (holder.prop("checked")) {
		fieldValue = holder.val();
	}else{
		fieldValue = "";
	}
	var extradata = holder.attr("extradata"),
		  url = holder.attr("url"),
		  fieldName = holder.attr("name"),
		  
		  loader = true;

	var data = {};
	data[fieldName] = fieldValue;

	if (holder.attr("extradata") !== undefined) {
		// format data 
		var dataArray = extradata.split("|");
		dataArray.forEach(function (item) {
			var singleItem = item.split(":");
			data[singleItem[0]] = singleItem[1];
		});
	}
	if (holder.attr("loader") === "true") {
		loader = true;
	} else if (holder.attr("loader") === "false") {
		loader = false;
	}

	server({
		url: url,
		data: data,
		loader: loader
	});
})



  
  /*
 * submit content form
 */
$(".landa-content-form").submit(function (event) {
	event.preventDefault();
	var loader = false;
	if ($(this).attr("loader") === "true") {
		loader = true;
	}
	$(this).parsley().validate();
	if (($(this).parsley().isValid())) {
		if (loader) {
			showLoader();
		}
		$.ajax({
			url: $(this).attr("action"),
			type: $(this).attr("method"),
			data: new FormData(this),
			contentType: false,
			processData: false,
			success: function (response) {
				if (loader) {
					hideLoader();
				}
				serverResponse(response);
			},
			error: function (xhr, status, error) {
				if (loader) {
					hideLoader();
				}
				toastr.error(error, "Oops!");
			}
		});
	}else{
		$(".collapse").collapse("show");
		toastr.warning("Please fill all required fields before saving.", "Oops!");
	}
});




/*
 *  delete removed item from database
 */
 function deleteSection(itemId, csrf_token) {
 	server({
	    url: deletequestionUrl,
	    data: {
	        "itemId": itemId,
	        "_token": csrf_token
	    },
	    loader: false
	});
 }