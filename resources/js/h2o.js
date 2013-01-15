// JavaScript Document

function manageNotifications(item_ID) {
	THIS = document.getElementById(item_ID);
	var totalElements = THIS.parentNode.children;
	var parentElement = THIS.parentNode.id;
	for(i = 0, mLength = totalElements.length; i < totalElements.length; i++) {
		if(totalElements[i].style.height == '0px'){
			mLength--;
		}
		if(mLength <= 1) {
			$('#'+parentElement).animate({height: 0, opacity: 0}, 250, function(){$('#'+parentElement).hide()});
		} else {
			$('#'+THIS.id).animate({height: 0, opacity: 0}, 250, function(){$('#'+THIS.id).hide()});
		}
	}
}

$(document).ready(function () {

	// Animate the menu items on mouseenter and mouseleave
	$(".cPanel ul li:not(.currentPage)").mouseenter(function(){
		$animElement = $(this).children('a')[0];
		$($animElement).queue('fx', []).animate({
			left: '7px'
		}, 150);
	}).mouseleave(function(){
		$animElement = $(this).children('a')[0];
		$($animElement).queue('fx', []).animate({
			left: 0
		}, 150);
	});

	$(".barHeader").click(function() {
		/*
		 * jQuerys slideToggle hides the element after animation, which messes up our layout
		 * SO, we're using a custom function ^_^
		 * It needs an array, but w.e. it works. :P
		 */
		animateBars(this);
	});

	$(".barHeader.collapsed").each(function(){
		animateBars(this.parentNode.children[1].id, this.children[0].id, 0);
	});

	$(".notification .closeNotification").click(function(){manageNotifications(this.parentNode.id);});
	
	$(".dateInput").datepicker();
});