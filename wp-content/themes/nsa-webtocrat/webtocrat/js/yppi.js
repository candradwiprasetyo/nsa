/*
 * GLOBALLY USED SCRIPT FOR "YPPI"
 * Coder : SAM-DESIGN
 */
 
//GLOBAL VARIABLE

var window_width=jQuery(window).width();
 
//BAGIAN INI HARUS DI INIT DI SEMUA HALAMAN
jQuery(document).ready(function(){

	create_fix();
	gallery_home();
	mainsubmenu();
	api_gallery();
	// bannerHome();
	quarter();
	
}) 

//CEK IPAD
function check_ipad(){
	is_ipad = /ipad/i.test(navigator.userAgent.toLowerCase());
}

//TUNGGU PERUBAHAN PADA UKURAN WINDOW
var view_updater;
jQuery(window).resize(function(){
	clearTimeout(view_updater);
	view_updater=setTimeout("view_changed()",150)
})


//TRIGGER EVENT KETIKA UKURAN WINDOW BERUBAH
function view_changed(){
	updateCarousel();
}
 
 
//CREATE FIX UNTUK BROWSER YANG TIDAK SUPPORT CSS GENERATED CONTENT
function create_fix(){
	if(!Modernizr.generatedcontent){
		jQuery(".add_fix").append('<span class="clearfix">&nbsp;</span>')
	}
}

/* Submenu */
function mainsubmenu(){
	
	jQuery(document).ready(function(){
		   /* HOVER EFECT */
		   jQuery(".navigasi > li").hover(
			   function(){
					jQuery(this).find("ul.submenu").slideDown(200);
					jQuery(this).children("a").addClass("active_temp");
					console.log("mudun");
			   },
			   // function(){
				   // jQuery(this).find(".submenu").slideUp(300);
				   // jQuery(this).children("a").removeClass("active_temp");
			   // },
			   function(){
				   var xh=jQuery(this).find("ul.submenu").attr("rel");
				   jQuery(this).find("ul.submenu").stop(true,false).slideUp(300,function(){
						   jQuery(this).height("auto");
				   });
				   jQuery(this).children("a").removeClass("active_temp");
			   }
		   );
	});
   
}

//PRETTY PHOTO EDIT
function api_gallery(){
jQuery('a.gall').click(function(){
		$.fn.prettyPhoto({
		animation_speed: 'fast',
		slideshow: 5000,
		autoplay_slideshow: false,
		theme: 'facebook', 
		counter_separator_label: ' of ',
		markup: '<div class="pp_pic_holder"> \
			<div class="ppt">&nbsp;</div> \
			<div class="pp_content_container"> \
				<div class="pp_content"> \
					<div class="pp_loaderIcon"></div> \
					<div class="pp_fade"> \
							<div class="pp_nav"> \
								<p class="currentTextHolder">0 of 0</p><p>images</p>\
							</div> \
							<a class="pp_close" href="#">Close</a> \
						<div class="pp_hoverContainer"> \
							<a class="pp_next" href="#">next</a> \
							<a class="pp_previous" href="#">previous</a> \
						</div> \
						<div id="pp_full_res"></div> \
						<div class="pp_details"> \
							<p class="pp_description"></p> \
							{pp_social} \
						</div> \
					</div> \
				</div> \
			</div> \
		</div> \
		<div class="pp_overlay"></div>',
		social_tools:''
		});
		
		var api_gallery=jQuery(this).data().gallery;
		var api_gallery_ar=api_gallery.split("$");
		var api_titles=jQuery(this).data().title;
		var api_titles_ar=api_titles.split("$");
		$.prettyPhoto.open(api_gallery_ar,api_titles_ar);

	});	
};

/* Banner Home */
// function bannerHome(){
	
	// jQuery('.wrapin_banner').cycle({
		// //fx:         'scrollHorz',
		// fx:         'fade',
        // timeout:     6000,
        // pager:      '#nav_lt',
		// next: '#next2',
		// prev: '#prev2',
        // pagerEvent: 'click',
        // fastOnEvent: false
    // });
	
// }

/*Language*/
function quarter(){
	var status=0;
	jQuery('#chooseQuarter').ready(function() {
		jQuery("a.btn_drop").click(function(e){
			e.preventDefault();	
			if(status==0){
				jQuery(".choose").slideDown(200);
				status=1;
			}
			else if(status==1){
				jQuery(".choose").slideUp(100);
				status=0;
			}
		});
	});
}

/* International Affiliates*/
function gallery_home(){
	
	jQuery(document).ready(function(){
	  jQuery('.wrapGH').bxSlider({
		auto: true,
		controls: true,
		pager: false,
		slideWidth: 310,
		minSlides: 2,
		maxSlides: 5
	  });
	});
	
}

jQuery('.wrapin_banner').cycle({
	//fx:         'scrollHorz',
	fx:         'fade',
	timeout:     6000,
	pager:      '#nav_lt',
	next: '#next2',
	prev: '#prev2',
	pagerEvent: 'click',
	fastOnEvent: false
});

/*---------------------------------- end of file ----------------------------------*/