// JavaScript Document
var thisElement;
var eleHeights = new Array();

function animateBars(item_ID, feedBack, speed) {
	if(!speed) {
		speed = 300;
	}

	if($('#'+item_ID).height()) {
		eleHeights.push(new Array(item_ID, $('#'+item_ID).height()));
		$('#'+item_ID).queue('fx',[]).animate({height: 0}, speed);
		$('#'+feedBack).html('+');
	} else {
		var oldHeight;
		for(oldHeight = 0, i = 0; i < eleHeights.length; i++)
			if(eleHeights[i][0] == item_ID) {
				oldHeight = eleHeights[i][1];
			}
		if(oldHeight) {
			$('#'+item_ID).queue('fx',[]).animate({height: oldHeight}, speed);
			$('#'+feedBack).html('-');
		} else {
			return null;	
		}
	}
}
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
		// jQuerys slideToggle hides the element after animation, which messes up our layout
		// SO, we're using a custom function ^_^
		// It needs an array, but w.e. it works. :P
		animateBars(this.parentNode.children[1].id, this.children[0].id);
	});

	$(".barHeader.collapsed").each(function(){
		animateBars(this.parentNode.children[1].id, this.children[0].id, 0.01);
	});

	$(".notification .closeNotification").click(function(){manageNotifications(this.parentNode.id);});
	
	//$("#pt_1").draggable({ axis: "x", containment: ".progBar", drag: function(){ $("#pf_1").width($("#pt_1").position().left + 1);}});	
	$(".progTab").draggable({ axis: "x", containment: ".progBar", drag: function(){
		var TabIndex = this.id.split('_')[1];
		$("#pf_"+TabIndex).width($("#pt_"+TabIndex).position().left + 1);}
	});	
	
	$(".dateInput").datepicker();
	//$("#pt_3").draggable({ axis: "x", containment: ".progBar", drag: function(){ $("#pf_1").width($("#pt_1").position().left + 1);}});	
});