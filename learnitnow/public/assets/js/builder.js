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
  
  $(".add-chapters").on("click", function(event){
	 event.preventDefault();
	   //console.log(sections);
	  $(".collapse").collapse("hide");
	  $(".chapter-holder").append(sections.chapter);
	  $(".chapter-holder").find(".empty-section.empty-chapter").remove();
	  chapterCallback();
	  $("html, body").animate({ scrollTop: $(document).height() }, 1000);
   });
  /*
   *  Initialize sortable 
   */
   function initSortable() {
	$( ".chapter-holder, .chapter-lecture-holder" ).sortable({
	  stop: function( event, ui ) {
		indexing();
	  }
	});
   }
  
  
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
   *  delete a chapter or lecture
   */
  $(".chapter-holder").on("click", ".manage-class.delete-item", function (event) {
	
	event.preventDefault();
	var selectedItem = $(this).closest(".panel");
	var selectedChapter = $(this).closest(".chapter");
	itemType = $(this).attr("data-type");
	itemId = $(this).attr("data-id");
	csrf = $(this).attr("data-csrf");
	console.log(itemId);
	swal({
	  title: "Are you sure?",
	  text: "This item will be deleted and will not recovered.",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#ff1a1a",
	  confirmButtonText: "Yes, delete it!",
	  closeOnConfirm: true
	}, function() {
	  selectedItem.remove();
	  emptySection();
	  indexing();
	  if (itemType === "lecture") {
		if (!selectedChapter.find(".lecture").length) {
		  selectedChapter.find(".chapter-lecture-holder").html('<div class="empty-section"><i class="mdi mdi-clipboard-text"></i><h5>No lectures here, add a new one below!</h5></div>');
		}
		
	  }
	  if (itemId !== undefined) {
		 
		deleteSection(itemId, itemType, csrf);
	  }
	});
  });
  
  
  /*
   *  Check if section is empty
   */
   function emptySection(){
	if (!$(".chapter").length) {
	  $(".chapter-holder").html('<div class="empty-section empty-chapter"><i class="mdi mdi-clipboard-text"></i><h5>No chapters here, add a new one!</h5></div>');
	}
   }
  
  
  /*
   *  delete removed item from database
   */
   function deleteSection(itemId, itemType) {
	server({
		url: deleteSectionUrl,

		data: {
			"itemId": itemId,
			"itemType": itemType,
			"_token": csrf,
		},
		loader: false
	});
   }
  
  /*
   *  Load sections
   */
  
  var sections = {};
//   $.getJSON(sectionsUrl, function(json) {
	$.getJSON("/append", function(json) {
	  sections = json;
  });
  
  
  /*
   *  Add a new chapter
   */
   $(".online-classes-list").on("click", ".add-chapter", function (event) {
	 console.log(sections);
	   event.preventDefault();
	builderReady();
	$(".collapse").collapse("hide");
	$(".chapter-holder").append(sections.chapter);
	$(".chapter-holder").find(".empty-section.empty-chapter").remove();
	chapterCallback();
	$("html, body").animate({ scrollTop: $(document).height() }, 1000);
   })
  
  
  /*
   *  Add a new lecture
   */
	$(".chapter-holder").on("click", ".add-lecture", function (event) {
	builderReady();
	event.preventDefault();
	var chapter = $(this).closest(".panel");
	var lectureType = $(this).attr("data-type");
	var lectureHolder = chapter.find(".chapter-lecture-holder");
	lectureHolder.find(".empty-section").remove();
	$(".collapse.lecture").collapse("hide");
	if (lectureType === "text") {
	  lectureHolder.append(sections.lecture.text);
	}else if (lectureType === "link") {
	  lectureHolder.append(sections.lecture.link);
	}else if (lectureType === "downloads") {
	  lectureHolder.append(sections.lecture.downloads);
	}else if (lectureType === "video") {
	  lectureHolder.append(sections.lecture.video);
	}else if (lectureType === "pdf") {
	  lectureHolder.append(sections.lecture.pdf);
	}else if (lectureType === "aws_video") {
	  lectureHolder.append(sections.lecture.aws_video);
	}else if (lectureType === "aws_audio") {
	  lectureHolder.append(sections.lecture.aws_audio);
	}
	chapterCallback()
   })
  
  /*
   *  chapter call back
   */
  function chapterCallback() {
	var uniqueKey = random({
					  length: 16,     
					  type: "alphabel",     
					  case :"upper"     
				  });
	var newElement = $("body").find(".newly");
	newElement.find(".panel-title a").attr("href", "#div-"+uniqueKey);
	newElement.find(".panel-collapse").attr("id", "div-"+uniqueKey);
	newElement.find(".dropify").dropify();
	newElement.removeClass("newly");
	initSortable();
	indexing();
  }
  
  /*
   *  Send to database on checkbox change
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
		url = holder.attr("url"),
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
   *  chapter & lecture indexing
   */
  function indexing() {
		 $(".panel.chapter").each(function(index) { 
			$(this).find(".panel-title .indexing").text(index + 1 +".)");
			$(this).find("input.chapter-indexing").val(index + 1);
			$(this).find(".panel.lecture").each(function(i) {
			  $(this).find(".panel-title .indexing").text(i + 1 +".)");
			  $(this).find("input.lecture-indexing").val(i + 1);
			  $(this).find("input, textarea").each(function() {
				var newName = $(this).attr("original-name")+parseInt(index + 1)+"[]";
				$(this).attr("name", newName);
			  });
			  
			});
		});
  }
  
  /*
   *  when class name is updated
   */
   $(".class-name").keyup(function() {
	$(".page-header h3").text($(this).val());
   })
  
  /*
   *  when chapter title is updated
   */
	$(".chapter-holder").on("keyup", ".chapter-title", function (event) {
	  var title = $(this).val();
	  $(this).closest(".panel").find(".panel-label").first().text(title);
   })
  
  /*
   *  when chapter title is updated
   */
   //  $(".chapter-holder").on("change", ".dropify[type=file]", function (event) {
   //   log(event.target.files[0])
   //   toastr.warning(event.target.files[0].name, "Oops!");
   // })
  
  
	
	/*
   * submit content form
   */
  $(".landa-content-form").submit(function (event) {
	event.preventDefault();
	var loader = false;
	if ($(this).attr("loader") === "true") {
	  loader = true;
	}
   if( $("input[name='chaptertitle[]']").length == 0 ){
	toastr.warning("Please add a chapter", "Oops!");
	return false;
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