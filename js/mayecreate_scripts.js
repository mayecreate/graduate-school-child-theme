//var $j = jQuery.noConflict();
jQuery(document).ready(function($) {  // Opening jQuery this way allows for the use of the '$' vs having to change it to the word 'jQuery'
  
  
  // This is the javascript to stops the default click beahvior and replaces it with a tap funtionality on ipad and other small touch devices 
  if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $(".menu li a").each(function() {
          if ($(this).next().length > 0) {
            $(this).addClass("parent");
        };
      });
    
    $(".parent").click(function(event) {
      event.preventDefault();
      $(this).unbind('click');
    });
  }
  

  // This is the javascript to control the drawer menu behavior
  $(function() {
    $("#drawer-menu").mmenu({
      extensions: ['pageshadow'],
      offCanvas: {
               position  : "right",
            },
      configuration: {
          menuNodetype: "div",
          pageNodetype: '<footer>'
        }
    });
  });


$(document.links).filter(function() {
  return this.hostname != window.location.hostname;
}).attr('target', '_blank');
  

  // Functions adds the collapsing archive behavior to archive list in sidebar
  $('#blogArchiveList > ul > li:has(ul)').addClass("has-sub");
  $('#blogArchiveList > ul > li a').click(function() {
    var checkElement = $(this).next();
    
    $('#blogArchiveList li').removeClass('active');
      $(this).closest('li').addClass('active');
    
    
    if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
      $(this).closest('li').removeClass('active');
      checkElement.slideUp('normal');
  }

  if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
    $('#blogArchiveList ul ul:visible').slideUp('normal');
    checkElement.slideDown('normal');
  }

  if (checkElement.is('ul')) {
    return false;
  } else {
    return true;  
  }
  });



  // Functions add class to allow for responsive videos
  $(function() {
   // Run code for each element
   $('.embed-responsive iframe').addClass('embed-responsive-item');
  });
  
// THIS SECTION MAKES THE PADDING AT THE TOP OF THE PAGE ADJUST TO THE NAV BAR HEIGHT

$("#navigation.fixed").addClass('affix-top');
$("#back_top_the_top").addClass('affix-top');
		
if($(window).width() >= 974){
	
	$("#page .pagebreak_left:first-child .pagebreak_left_img").css({'height':($("#page .pagebreak_left:first-child .pagebreak_left_content").outerHeight()+'px')});
	$("#page .pagebreak_left:nth-child(2) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(2) .pagebreak_left_content").outerHeight()+'px')});
	$("#page .pagebreak_left:nth-child(3) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(3) .pagebreak_left_content").outerHeight()+'px')});
	$("#page .pagebreak_left:nth-child(4) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(4) .pagebreak_left_content").outerHeight()+'px')});
	$("#page .pagebreak_left:nth-child(5) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(5) .pagebreak_left_content").outerHeight()+'px')});
	$("#page .pagebreak_left:nth-child(6) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(6) .pagebreak_left_content").outerHeight()+'px')});
	$("#page .pagebreak_left:nth-child(7) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(7) .pagebreak_left_content").outerHeight()+'px')});
	$("#page .pagebreak_left:nth-child(8) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(8) .pagebreak_left_content").outerHeight()+'px')});
	$("#page .pagebreak_left:nth-child(9) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(9) .pagebreak_left_content").outerHeight()+'px')});
	$("#page .pagebreak_left:nth-child(10) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(10) .pagebreak_left_content").outerHeight()+'px')});
				
	$("#page .pagebreak_right:first-child .pagebreak_right_img").css({'height':($("#page .pagebreak_right:first-child .pagebreak_right_content").outerHeight()+'px')});
	$("#page .pagebreak_right:nth-child(2) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(2) .pagebreak_right_content").outerHeight()+'px')});
	$("#page .pagebreak_right:nth-child(3) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(3) .pagebreak_right_content").outerHeight()+'px')});
	$("#page .pagebreak_right:nth-child(4) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(4) .pagebreak_right_content").outerHeight()+'px')});
	$("#page .pagebreak_right:nth-child(5) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(5) .pagebreak_right_content").outerHeight()+'px')});
	$("#page .pagebreak_right:nth-child(6) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(6) .pagebreak_right_content").outerHeight()+'px')});
	$("#page .pagebreak_right:nth-child(7) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(7) .pagebreak_right_content").outerHeight()+'px')});
	$("#page .pagebreak_right:nth-child(8) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(8) .pagebreak_right_content").outerHeight()+'px')});
	$("#page .pagebreak_right:nth-child(9) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(9) .pagebreak_right_content").outerHeight()+'px')});
	$("#page .pagebreak_right:nth-child(10) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(10) .pagebreak_right_content").outerHeight()+'px')});	
	
	$("#page .pagebreak_left.overlap:first-child .pagebreak_left_img").css({'height':($("#page .pagebreak_left:first-child .pagebreak_left_content").outerHeight()+ 200 +'px')});
	$("#page .pagebreak_left.overlap:nth-child(2) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(2) .pagebreak_left_content").outerHeight()+ 200 +'px')});
	$("#page .pagebreak_left.overlap:nth-child(3) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(3) .pagebreak_left_content").outerHeight()+ 200 +'px')});
	$("#page .pagebreak_left.overlap:nth-child(4) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(4) .pagebreak_left_content").outerHeight()+ 200 +'px')});
	$("#page .pagebreak_left.overlap:nth-child(5) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(5) .pagebreak_left_content").outerHeight()+ 200 +'px')});
	$("#page .pagebreak_left.overlap:nth-child(6) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(6) .pagebreak_left_content").outerHeight()+ 200 +'px')});
	$("#page .pagebreak_left.overlap:nth-child(7) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(7) .pagebreak_left_content").outerHeight()+ 200 +'px')});
	$("#page .pagebreak_left.overlap:nth-child(8) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(8) .pagebreak_left_content").outerHeight()+ 200 +'px')});
	$("#page .pagebreak_left.overlap:nth-child(9) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(9) .pagebreak_left_content").outerHeight()+ 200 +'px')});
	$("#page .pagebreak_left.overlap:nth-child(10) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(10) .pagebreak_left_content").outerHeight()+ 200 +'px')});
				
	$("#page .pagebreak_right.overlap:first-child .pagebreak_right_img").css({'height':($("#page .pagebreak_right:first-child .pagebreak_right_content").outerHeight()+ 200 +'px')});
	$("#page .pagebreak_right.overlap:nth-child(2) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(2) .pagebreak_right_content").outerHeight()+ 200 +'px')});
	$("#page .pagebreak_right.overlap:nth-child(3) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(3) .pagebreak_right_content").outerHeight()+ 200 +'px')});
	$("#page .pagebreak_right.overlap:nth-child(4) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(4) .pagebreak_right_content").outerHeight()+ 200 +'px')});
	$("#page .pagebreak_right.overlap:nth-child(5) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(5) .pagebreak_right_content").outerHeight()+ 200 +'px')});
	$("#page .pagebreak_right.overlap:nth-child(6) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(6) .pagebreak_right_content").outerHeight()+ 200 +'px')});
	$("#page .pagebreak_right.overlap:nth-child(7) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(7) .pagebreak_right_content").outerHeight()+ 200 +'px')});
	$("#page .pagebreak_right.overlap:nth-child(8) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(8) .pagebreak_right_content").outerHeight()+ 200 +'px')});
	$("#page .pagebreak_right.overlap:nth-child(9) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(9) .pagebreak_right_content").outerHeight()+ 200 +'px')});
	$("#page .pagebreak_right.overlap:nth-child(10) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(10) .pagebreak_right_content").outerHeight()+ 200 +'px')});	
	
}	

$( "#myCarousel .active .slideDesc" ).each(function() {
	var newHeight = 0, $this = $( this );
	$.each( $this.children(), function() {
		newHeight += $( this ).height();
	});
	$this.height( newHeight );
});		

var maxHeight = 0;

$(".equal_height").each(function(){
	if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
});

$(".equal_height").height(maxHeight);
	


$(window).scroll(function() {
	if($(this).scrollTop() < 175){} else {
		$("#navigation.fixed").addClass('affix');
		$("#navigation.fixed").removeClass('affix-top');
	} 
	if($(this).scrollTop() >= 175){} else {
		$("#navigation.fixed").addClass('affix-top');
		$("#navigation.fixed").removeClass('affix');
	}    
	if($(this).scrollTop() < 1500){} else {
		$("#back_top_the_top").addClass('affix');
		$("#back_top_the_top").removeClass('affix-top');
	} 
	if($(this).scrollTop() >= 1500){} else {
		$("#back_top_the_top").addClass('affix-top');
		$("#back_top_the_top").removeClass('affix');
	}        
});

$(window).resize(function() {	
	if($(window).width() >= 974){
		
		$("#page .pagebreak_left:first-child .pagebreak_left_img").css({'height':($("#page .pagebreak_left:first-child .pagebreak_left_content").outerHeight()+'px')});
		$("#page .pagebreak_left:nth-child(2) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(2) .pagebreak_left_content").outerHeight()+'px')});
		$("#page .pagebreak_left:nth-child(3) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(3) .pagebreak_left_content").outerHeight()+'px')});
		$("#page .pagebreak_left:nth-child(4) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(4) .pagebreak_left_content").outerHeight()+'px')});
		$("#page .pagebreak_left:nth-child(5) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(5) .pagebreak_left_content").outerHeight()+'px')});
		$("#page .pagebreak_left:nth-child(6) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(6) .pagebreak_left_content").outerHeight()+'px')});
		$("#page .pagebreak_left:nth-child(7) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(7) .pagebreak_left_content").outerHeight()+'px')});
		$("#page .pagebreak_left:nth-child(8) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(8) .pagebreak_left_content").outerHeight()+'px')});
		$("#page .pagebreak_left:nth-child(9) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(9) .pagebreak_left_content").outerHeight()+'px')});
		$("#page .pagebreak_left:nth-child(10) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(10) .pagebreak_left_content").outerHeight()+'px')});		
		
		$("#page .pagebreak_right:first-child .pagebreak_right_img").css({'height':($("#page .pagebreak_right:first-child .pagebreak_right_content").outerHeight()+'px')});
		$("#page .pagebreak_right:nth-child(2) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(2) .pagebreak_right_content").outerHeight()+'px')});
		$("#page .pagebreak_right:nth-child(3) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(3) .pagebreak_right_content").outerHeight()+'px')});
		$("#page .pagebreak_right:nth-child(4) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(4) .pagebreak_right_content").outerHeight()+'px')});
		$("#page .pagebreak_right:nth-child(5) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(5) .pagebreak_right_content").outerHeight()+'px')});
		$("#page .pagebreak_right:nth-child(6) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(6) .pagebreak_right_content").outerHeight()+'px')});
		$("#page .pagebreak_right:nth-child(7) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(7) .pagebreak_right_content").outerHeight()+'px')});
		$("#page .pagebreak_right:nth-child(8) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(8) .pagebreak_right_content").outerHeight()+'px')});
		$("#page .pagebreak_right:nth-child(9) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(9) .pagebreak_right_content").outerHeight()+'px')});
		$("#page .pagebreak_right:nth-child(10) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(10) .pagebreak_right_content").outerHeight()+'px')});	
		
		$("#page .pagebreak_left.overlap:first-child .pagebreak_left_img").css({'height':($("#page .pagebreak_left:first-child .pagebreak_left_content").outerHeight()+ 200 +'px')});
		$("#page .pagebreak_left.overlap:nth-child(2) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(2) .pagebreak_left_content").outerHeight()+ 200 +'px')});
		$("#page .pagebreak_left.overlap:nth-child(3) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(3) .pagebreak_left_content").outerHeight()+ 200 +'px')});
		$("#page .pagebreak_left.overlap:nth-child(4) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(4) .pagebreak_left_content").outerHeight()+ 200 +'px')});
		$("#page .pagebreak_left.overlap:nth-child(5) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(5) .pagebreak_left_content").outerHeight()+ 200 +'px')});
		$("#page .pagebreak_left.overlap:nth-child(6) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(6) .pagebreak_left_content").outerHeight()+ 200 +'px')});
		$("#page .pagebreak_left.overlap:nth-child(7) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(7) .pagebreak_left_content").outerHeight()+ 200 +'px')});
		$("#page .pagebreak_left.overlap:nth-child(8) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(8) .pagebreak_left_content").outerHeight()+ 200 +'px')});
		$("#page .pagebreak_left.overlap:nth-child(9) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(9) .pagebreak_left_content").outerHeight()+ 200 +'px')});
		$("#page .pagebreak_left.overlap:nth-child(10) .pagebreak_left_img").css({'height':($("#page .pagebreak_left:nth-child(10) .pagebreak_left_content").outerHeight()+ 200 +'px')});
					
		$("#page .pagebreak_right.overlap:first-child .pagebreak_right_img").css({'height':($("#page .pagebreak_right:first-child .pagebreak_right_content").outerHeight()+ 200 +'px')});
		$("#page .pagebreak_right.overlap:nth-child(2) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(2) .pagebreak_right_content").outerHeight()+ 200 +'px')});
		$("#page .pagebreak_right.overlap:nth-child(3) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(3) .pagebreak_right_content").outerHeight()+ 200 +'px')});
		$("#page .pagebreak_right.overlap:nth-child(4) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(4) .pagebreak_right_content").outerHeight()+ 200 +'px')});
		$("#page .pagebreak_right.overlap:nth-child(5) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(5) .pagebreak_right_content").outerHeight()+ 200 +'px')});
		$("#page .pagebreak_right.overlap:nth-child(6) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(6) .pagebreak_right_content").outerHeight()+ 200 +'px')});
		$("#page .pagebreak_right.overlap:nth-child(7) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(7) .pagebreak_right_content").outerHeight()+ 200 +'px')});
		$("#page .pagebreak_right.overlap:nth-child(8) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(8) .pagebreak_right_content").outerHeight()+ 200 +'px')});
		$("#page .pagebreak_right.overlap:nth-child(9) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(9) .pagebreak_right_content").outerHeight()+ 200 +'px')});
		$("#page .pagebreak_right.overlap:nth-child(10) .pagebreak_right_img").css({'height':($("#page .pagebreak_right:nth-child(10) .pagebreak_right_content").outerHeight()+ 200 +'px')});	
		
	}
	
	if($(window).width() <= 974){
		
		$(".pagebreak_left_img").height('auto');
		$(".pagebreak_right_img").height('auto');
		
	}
	
	$( "#myCarousel .active .slideDesc" ).each(function() {
		var newHeight = 0, $this = $( this );
		$.each( $this.children(), function() {
			newHeight += $( this ).height();
		});
		$this.height( newHeight );
	});	
	
	var maxHeight = 0;

	$(".equal_height").each(function(){
		if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
	});

	$(".equal_height").height(maxHeight);
	
}).resize();

$('#myCarousel').on('slid.bs.carousel', function() {
	$( "#myCarousel .active .slideDesc" ).each(function() {
		var newHeight = 0, $this = $( this );
		$.each( $this.children(), function() {
			newHeight += $( this ).height();
		});
		$this.height( newHeight );
	});	
});

function loadMore(paged) {
	$.ajax({
	type: 'POST',
	url: '/wp-admin/admin-ajax.php',
	dataType: 'json',
	data: {
		action: 'mc_load_more',
		paged,
	},
	success: function (res) {
		if (paged >= res.max) { 
			$('#load-more').addClass('hidden');
			$('#load-more').removeClass('not-hidden');
		} else {
			$('#load-more').addClass('not-hidden');
			$('#load-more').removeClass('hidden');
		}
		$('.publication-list').append(res.html); 
	}
	});
}
let newPage = 1;
$('#load-more').on('click', function(){
  loadMore(newPage + 1);
  newPage++;
});

function loadMoreProject(paged) {
	$.ajax({
	type: 'POST',
	url: '/wp-admin/admin-ajax.php',
	dataType: 'json',
	data: {
		action: 'mc_load_more_project',
		paged,
	},
	success: function (res) {
		if (paged >= res.max) { 
			$('#load-more-project').addClass('hidden');
			$('#load-more-project').removeClass('not-hidden');
		} else {
			$('#load-more-project').addClass('not-hidden');
			$('#load-more-project').removeClass('hidden');
		}
		$('.project-list').append(res.html); 
	}
	});
}
let newPageProject = 1;
$('#load-more-project').on('click', function(){
	loadMoreProject(newPageProject + 1);
	newPageProject++;
});

function loadMoreResource(paged) {
	$.ajax({
	type: 'POST',
	url: '/wp-admin/admin-ajax.php',
	dataType: 'json',
	data: {
		action: 'mc_load_more_resource',
		paged,
	},
	success: function (res) {
		if (paged >= res.max) { 
			$('#load-more-resource').addClass('hidden');
			$('#load-more-resource').removeClass('not-hidden');
		} else {
			$('#load-more-resource').addClass('not-hidden');
			$('#load-more-resource').removeClass('hidden');
		}
		$('.resource-list').append(res.html); 
	}
	});
}
let newPageResource = 1;
$('#load-more-resource').on('click', function(){
	loadMoreResource(newPageResource + 1);
	newPageResource++;
});

function startCounter(){
	$('.counter').each(function (index) {
		var size = $(this).text().split(".")[1] ? $(this).text().split(".")[1].length : 0;
		$(this).prop('Counter',0).animate({
			Counter: $(this).text()
		}, {
			duration: 2000,
			easing: 'swing',
			step: function (now) {
				$(this).text(parseFloat(now).toFixed(size));
			}
		});
	});
}	

startCounter();

  /* 
  *  Function calls the javascript and establishes settings for the featured image slider.
  * 
  *  Credit to Sachin N. at http://sachinchoolur.github.io/lightslider/ for the cool slider for posts
  *  For documentation of all of the different settings that you can use visit http://sachinchoolur.github.io/lightslider/settings.html
  *
  */

if( /Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    var slider = $('#lightSlider').lightSlider({
        pause: 6000,
        autoWidth: false,
        pager: false,
        loop:true,
        auto: true,
        controls: false,
        enableDrag: false,
		item: 1
    });
} else if( /iPad/i.test(navigator.userAgent) ) {
    var slider = $('#lightSlider').lightSlider({
        pause: 6000,
        autoWidth: false,
        pager: false,
        loop:true,
        auto: true,
        controls: false,
        enableDrag: false,
		item: 2
    });
} else {
    var slider = $('#lightSlider').lightSlider({
        pause: 6000,
        autoWidth: false,
        pager: false,
        loop:true,
        auto: true,
        controls: false,
        enableDrag: false,
		item: 5
    });
}
	
    $('#goToPrevSlide').on('click', function () {
        slider.goToPrevSlide();
    });
    $('#goToNextSlide').on('click', function () {
        slider.goToNextSlide();
    });

    //Add/remove a class to labels with checkboxes and radio buttons and style them
	$('label input[type=radio], label input[type=checkbox]').click(function() {
	  $('label:has(input:checked)').addClass('active');
	  $('label:has(input:not(:checked))').removeClass('active');
	});   

});

