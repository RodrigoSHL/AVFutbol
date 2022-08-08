// JavaScript Document

function ready(){
	var anchoWeb = $(window).width();
	var altoWeb = $(window).height();
	
	//TAMAÑOS
	$('section').css({'min-height': altoWeb}); //alto de contenedores
	
	//HEADER 
	var miniHeaderActivo = false;
	$(window).scroll(function(){
		var scrollPos = window.pageYOffset;
		
		//CUANDO HACES SCROLL
		if(!miniHeaderActivo){
			if(scrollPos>altoWeb-10){
				miniHeaderActivo = true;
				$('.header-min').css({
					'top':'0px'
					
				});
			}			
		}
		
		//CUANDO ESTAS AL INICIO
		if(miniHeaderActivo){
			if(scrollPos<altoWeb){
				miniHeaderActivo = false;
				$('.header-min').css({
					'top':'-70px'
				});
			}
		}
	});
	
	
	//var altoclub = $('.club-left').height();
//	$('.club-right').css({'min-height': altoclub + 100});
	
	
	//BLOCK SERVICIOS
	var altoTit = $('#section-3 .content .tit').height();
	$('#section-3 .content .serv').css({'height': altoWeb - (altoTit + 135)});
	
}



$(document).ready(function() {
	ready();

	$(window).resize(function() {
		ready();
	});
	
//	/* Page Scroll to id fn call */
//	$("#navigation-menu a,a[href='#top'],a[rel='m_PageScroll2id']").mPageScroll2id({
//		highlightSelector:'#navigation-menu a'
//	});
//	
//	$("a[rel='next']").click(function(e){
//		e.preventDefault();
//		var to=$(this).parent().parent("section").next().attr("id");
//		$.mPageScroll2id("scrollTo",to);
//	});
	
	// Slides
	$('#slides').superslides();
	
	$(function() {
		var $menu = $('nav#menu'),
			$html = $('html, body');

		$menu.mmenu({
			dragOpen: true
		});

		var $anchor = false;
		$menu.find( 'li > a' ).on(
			'click',
			function( e )
			{
				$anchor = $(this);
			}
		);

		var api = $menu.data( 'mmenu' );
		api.bind( 'closed',
			function()
			{
				if ( $anchor )
				{
					var href = $anchor.attr( 'href' );
					$anchor = false;

					//	if the clicked link is linked to an anchor, scroll the page to that anchor 
					if ( href.slice( 0, 1 ) == '#' )
					{
						$html.animate({
							scrollTop: $( href ).offset().top
						});	
					}
				}
			}
		);
	});

});