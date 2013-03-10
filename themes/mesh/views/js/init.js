// PIXELOVE V.1 //
// Copyright 2012, Mandar Shirke //
// www.quadcodes.com
// DATE : 18/07/2012 //

// --------- INIT JS ---------  //

// -- 1. CLOCK --  //
// -- 2. SUPERFISH-MENU --  //
// -- 3. TOGGLE TOP --  //
// -- 4. TOGGLE SOCIAL --  //
// -- 5. SEARCHBOX --  //
// -- 6. TOGGLE DROPDOWN  --  //
// -- 7. TOGGLE MORE NAV --  //
// -- 8. FADE-IN FILTERABLE IMAGES --  //
// -- 9. MASONRY / FILTERABLE PORTFOLIO --  //
// -- 10. RESPONSIVE VIDEO [ FITVIDS ] --  //
// -- 11. RESPONSIVE SLIDER --  //
// -- 12. JPLAYER VIDEO --  //
// -- 13. JPLAYER AUDIO --  //
// -- 14. SCROLL TO TOP --  //
// -- 15. MOBILE DROP DOWN MENU --  //
// -- 16. JSOCIAL --  //
// -- 17. TWITTER / FACEBOOK FOLLOWER COUNT --  //
// -- 18. TIPSY --  //
// -- 19. PRETTYPHOTO --  //
// -- 20. SHORTCODES --  //
// -- 21. CONTACT FORM --  //
// -- 22. MISCELLANIOUS --  //

// --------------------------  //

$(document).ready(function($){

// ------------------------------------------  // 


// --------- 1. CLOCK ----------  // 

setInterval('updateClock()', 1000);


// --------- 2. SUPERFISH-MENU ----------  //

$('ul.sf-menu').superfish();
$('ul.sf-menu').hover(function() {
	$('.current').addClass('inactive');
}, function(){
	$('.current').removeClass('inactive');
}, 200);


// --------- 3. TOGGLE TOP ----------  // 

$(".qcContactBox").toggle(function(){
	$("#qcTopContent").slideDown('fast'); 
}, function () {
	$("#qcTopContent").slideUp('fast');
});


// --------- 4. TOGGLE SOCIAL ----------  // 

$("#qcSocialChannels").click(function() {
	$("#qcSocialChannels ul").toggle();
});

$("#qcSocialChannels ul").hover(function() {
}, function(){
	$(this).toggle();
}, 700);


// --------- 5. SEARCHBOX ----------  // 

$("#qcSearchButton").click(function() {
	if($(".qcSearch").val()) {
		$(this).parent('form').submit();
	} else {
		$("#qcSearchBox, #qcMoreNav").toggleClass('close');
		$(".qcSearch").focus();
	}
	return false;
});


// --------- 6. TOGGLE DROPDOWN ----------  // 

$("a.qcDDTrigger").click(function() {
	var handle = $(this);
	$(this).parent().parent().find("ul.qcDDList").slideToggle("fast", function () {
		$(handle).text(function (index, text) {
			return (text == '\u25BC' ? '\u25B2' : '\u25BC');
		});
	});
	return false;
});


// --------- 7. TOGGLE MORE NAV ----------  // 

$("#qcMoreNav").click(function() {
	$(this).toggleClass('current');
	$("#qcCFFList").slideToggle("fast", function () {
		$('#qcMoreNav a').text(function (index, text) {
			return (text == '+ MORE' ? '- MORE' : '+ MORE');
		});
	});
	return false;
});


// --------- 8. FADE-IN FILTERABLE IMAGES ----------  //

$(".qcFilterableItem img").animate({opacity:1},2000);


// --------- 9. MASONRY / FILTERABLE PORTFOLIO ----------  //

if($().masonry) {

	var speed = 800,   // animation speed
	$wall = $('#qcFilterablePortfolio').find('.qcFilterableWrapper');
	$wall.masonry({
		singleMode: true, 
		// only apply masonry layout to visible elements
		itemSelector: '.qcFilterableItem:not(.invis)',
		animate: true,
		animationOptions: {
			duration: speed,
			queue: false
		}
	});
	$('#qcFilterableNav a').click(function(){
		var colorClass = '.' + $(this).attr('class');
		if(colorClass=='.all') {
			// show all hidden boxes
			$wall.children('.invis')
			.toggleClass('invis').fadeIn(speed);
		} else {  
			// hide visible boxes 
			$wall.children().not(colorClass).not('.invis')
				.toggleClass('invis').fadeOut(speed);
				// show hidden boxes
			$wall.children(colorClass+'.invis')
				.toggleClass('invis').fadeIn(speed);
		}
		$wall.masonry();
		return false;
	});
	$('ul.qcFilter li a').click(function(){
		$("ul.qcFilter li").removeClass("active-tag");
		$(this).parent().addClass("active-tag");
	});	

	$(window).resize(function(){
		$("#qcFilterableNav .active-tag a").trigger('click');
	});
	
}

// --------- 10. RESPONSIVE VIDEO [ FITVIDS ] ----------  //

$(".qcAjaxPortfolioImageWrapper, .widget, .qcBlogEntry, .paper-box").fitVids();


// --------- 11. RESPONSIVE SLIDER ----------  //

$(".rslides").responsiveSlides({
	auto: false,
	pager: true,
	nav: true,
	speed: 500,
	maxwidth: 960,
	namespace: "centered-btns"
});

if($().wmuSlider) {

$('.slider-gallery').wmuSlider({
	animation: 'fade',
	animationDuration: 0,
	slideshow: false,
	slideshowSpeed: 7000,
	slideToStart: 0,
	navigationControl: true,
	paginationControl: true,
	previousText: 'Prev',
	nextText: 'Next',
	touch: true,
	slide: 'article',
	items: 1
});

}

// --------- 12. JPLAYER VIDEO ----------  //

if($().jPlayer) {

var jpWidth = $('.qcContent').width() - 2;
var jpHeight = Math.round((jpWidth/4)*2.25);

jQuery("#jquery_jplayer_1").jPlayer({
	ready: function () {
		jQuery(this).jPlayer("setMedia", {
			m4v: "http://www.jplayer.org/video/m4v/Big_Buck_Bunny_Trailer_480x270_h264aac.m4v",
			ogv: "http://www.jplayer.org/video/ogv/Big_Buck_Bunny_Trailer_480x270.ogv",
			poster: "http://www.jplayer.org/video/poster/Big_Buck_Bunny_Trailer_480x270.png"
	});
},
	swfPath: "js",
	cssSelectorAncestor: "#jp_interface_1",
	supplied: "m4v, ogv,  all",
	size: {
		width: jpWidth,
		height: jpHeight,
	}
});
					
}


// --------- 13. JPLAYER AUDIO ----------  //

if($().jPlayer) {

$("#jquery_jplayer_2").jPlayer({
	ready: function () {
		$(this).jPlayer("setMedia", {
			m4a: "http://www.jplayer.org/audio/m4a/Miaow-07-Bubble.m4a",
			oga: "http://www.jplayer.org/audio/ogg/Miaow-07-Bubble.ogg"
		});
	},
	ended: function (event) {
		$(this).jPlayer("play");
	},
	swfPath: "js",
	cssSelectorAncestor: "#jp_interface_2",
	supplied: "m4a, oga"
});

}

// --------- 14. SCROLL TO TOP ----------  //

$('#qcScrollTop').click(function(){
	$('html, body').animate({scrollTop:0}, 500);
	return false;
});


// --------- 15. MOBILE DROP DOWN MENU ----------  //

$('#dd-menu').change(function() {
  window.location = $(this).val();
});


// --------- 16. JSOCIAL ----------  //

// Flickr
$('#flickr').jflickrfeed({
	limit: 10,
	qstrings: {
	id: '52617155@N08' // Define Flickr ID //
	},
	itemTemplate: '<li><a href="{{image_b}}" rel="prettyPhoto[pp_gal]"><img class="flickr" src="{{image_s}}" alt="{{title}}"></a></li>'
	}, function(data) {
	$('#flickr a').prettyPhoto();
}); 
// Twitter
$(".tweet").tweet({
	join_text: "auto",
	username: "quadcodes", // Define Twitter Username //
	avatar_size: 0,
	count: 2,
	auto_join_text_default: "|", 
	auto_join_text_ed: "we",
	auto_join_text_ing: "we were",
	auto_join_text_reply: "we replied",
	auto_join_text_url: "we were checking out",
	loading_text: "Loading Tweets…"
}); 
// Dribbble
$.jribbble.getShotsByPlayerId('envato', function (playerShots) {  // Define Dribbble Username //
	var html = [];
	$.each(playerShots.shots, function (i, shot) {
		html.push('<li><a href="' + shot.url + '">');
		html.push('<img src="' + shot.image_teaser_url + '" ');
		html.push('title="' + shot.title + '"></a></li>');
	});
	$('#shotsByPlayerId').html(html.join(''));
}, {page: 1, per_page: 6});

$.jribbble.getPlayerById('envato', function (player) {  // Define Dribbble Username //
    var html = [];
    html.push('' + player.followers_count + '');
    $('#dribbble_count').html(html.join(''));
});

// SOCIALITE //
Socialite.load();

// --------- 17. TWITTER / FACEBOOK FOLLOWER COUNT ----------  //
//  https://gist.github.com/599243 //

var f_page = "wvumountaineers"; // the page name for your fan page, e.g. the 'wvumountaineers' part of http://facebook.com/wvumountaineers
var t_page = "westvirginiau"; // the account name for your main twitter account

function add_commas(number) {
if (number.length > 3) {
var mod = number.length % 3;
var output = (mod > 0 ? (number.substring(0,mod)) : '');
for (i=0 ; i < Math.floor(number.length / 3); i++) {
if ((mod == 0) && (i == 0)) {
output += number.substring(mod+ 3 * i, mod + 3 * i + 3);
} else {
output+= ',' + number.substring(mod + 3 * i, mod + 3 * i + 3);
}
}
return (output);
} else {
return number;
}
}

// when document is ready load the counts
$(document).ready(function(){

// grab from facebook
$.getJSON('https://graph.facebook.com/'+f_page+'?callback=?', function(data) {
var fb_count = data['likes'].toString();
fb_count = add_commas(fb_count);
$('#fb_count').html(fb_count);
});

// grab from twitter
$.getJSON('http://api.twitter.com/1/users/show.json?screen_name='+t_page+'&callback=?', function(data) {
twit_count = data['followers_count'].toString();
twit_count = add_commas(twit_count);
$('#twitter_count').html(twit_count);
});

});


// --------- 18. TIPSY ----------  //

$('.tips').tipsy({gravity: 's'});



// --------- 19. PRETTYPHOTO ----------  //

$("a[rel^='prettyPhoto']").prettyPhoto();



// --------- 20. SHORTCODES ----------  //

/*-- Tabs --*/

$('.tabs a').click(function(){
	switch_tabs($(this));
}); 
switch_tabs($('.defaulttab')); 
function switch_tabs(obj) {
	$('.tab-content').hide();
	$('.tabs a').removeClass("selected");
	var id = obj.attr("rel"); 
	$('#'+id).fadeIn(500);
	obj.addClass("selected");
}
	
/*-- Toggle --*/
	
if ( jQuery( '.shortcode-toggle').length ) {	
		
	jQuery( '.shortcode-toggle').each( function () {
			
		var toggleObj = jQuery(this);
			
		toggleObj.closedText = toggleObj.find( 'input[name="title_closed"]').attr( 'value' );
		toggleObj.openText = toggleObj.find( 'input[name="title_open"]').attr( 'value' );
			
		toggleObj.find( 'input[name="title_closed"]').remove();
		toggleObj.find( 'input[name="title_open"]').remove();
			
		toggleObj.find( 'h4.toggle-trigger a').click( function () {
			
			toggleObj.find( '.toggle-content').animate({ opacity: 'toggle', height: 'toggle' }, 300);
			toggleObj.toggleClass( 'open' ).toggleClass( 'closed' );
				
			if ( toggleObj.hasClass( 'open') ) {
				
				jQuery(this).text(toggleObj.openText);
				
			} // End IF Statement
				
			if ( toggleObj.hasClass( 'closed') ) {
				
				jQuery(this).text(toggleObj.closedText);
				
			} // End IF Statement
				
			return false;
			
		});
					
	});
	
} // End IF Statement
 
/*-- Alert Close --*/

$('.alert a.close').click(function(){
	$(this).parent().remove();
	return false;
});


// --------- 21. CONTACT FORM ----------  //


$('.qcForm').submit(function() {
		$(this).find('.error').remove();
		var hasError = false;
		$(this).find('.requiredField').each(function() {
			if($.trim($(this).val()) == '') {
				var labelText = $(this).prev( 'label').text();
				$(this).parent().append( '<span class="error">You forgot to enter your '+labelText+'</span>' );
				$(this).addClass( 'inputError' );
				hasError = true;
			} else if($(this).hasClass( 'email')) {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test($.trim($(this).val()))) {
					var labelText = $(this).prev( 'label').text();
					$(this).parent().append( '<span class="error">You have entered an invalid '+labelText+'</span>' );
					$(this).addClass( 'inputError' );
					hasError = true;
				}
			} else if($(this).hasClass( 'captcha')) {
				if($(this).val() != 'red' && $(this).val() != 'Red') {
					$(this).parent().append( '<span class="error">You have entered wrong Captcha Value</span>' );
					hasError = true;
				}
			}
		});
		if(!hasError) {
			var formInput = $(this).serialize();
			var hideForm = $(this);
			$.post($(this).attr('action'),formInput, function(data){
				$(hideForm).slideUp( "fast", function() {				   
					$(this).before( '<br/><p class="info">Thanks! Your email was successfully sent.</p>' );
				});
			});
		}
		return false;
});


// --------- 22. MISCELLANIOUS ----------  //  

// Hover Effects 
$(".qcFilterableItem").hover(function(){
	$(this).find('.qcProjectOverlay').css('display','block');
	$(this).find('.qcTitleGradient').addClass('hover');
}, function () {
	$(this).find('.qcProjectOverlay').css('display','none');
	$(this).find('.qcTitleGradient').removeClass('hover');
});

$(".qcRecent .four.columns").hover(function() {
	$(this).find(".qcOverlay").fadeIn('fast');
}, function(){
	$(this).find(".qcOverlay").fadeOut('fast');
});

$(".widget").hover(function(){
	$(this).find('.qcWidgetTitle').addClass('qcWidgetTitleactive');
}, function () {
	$(this).find('.qcWidgetTitle').removeClass('qcWidgetTitleactive');
});

// Appends
$('#qcWidgetBox .widget:nth-child(3n), #qcTopContentInset .widget:nth-child(3n)').css('border-right', '0');
			
			
// ------------------------------------------  // 			
							
}); // End jQuery()