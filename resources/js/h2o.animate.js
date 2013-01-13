/* 
 * JS Animation Library file for RAPTR
 * Contains various custom animation functions animation functions
 */


/* Animation function for expanding and collapsing a BAR element.
 * The elementary BAR structure include a header and a content DIV.
 * This function should be triggered by an event on the header
 * and a trigger will either collapse or restore the content DIV.
 * jQuery's default slideToggle() ends up setting a display:none on the
 * body once it's done, which is undesirable in our case. This function 
 * basically takes the content DIV height and stores it in an array
 * called eleHeights, with the object itself as the index. The function 
 * then calls jQuery.animate() to collapse the content DIV.
 *
 * If called on a collapsed element (jQuery.height() == 0), then the function
 * checks the array for a height associated with the element and calls
 * jQuery.animate(), animating the element to it's stored height
 *
 * The function takes two arguments: the header element upon which the
 * event is acting, and a speed which determines the animation speed.
 * if speed isn't set, then it skips the animation and just switches
 * between the collapsed and expanded states. Height is still stored in this
 * case....obviously.
 */

// Array used when collapsing/expanding BARs, stores the object reference and height
var eleHeights = [];


function animateBars(item, speed) {
	var contentObject = item.parentNode.children[1];
	var indicator = item.children[0];

	if($(contentObject).height()) {
		eleHeights.push([contentObject, $(contentObject).height()]);
		$(contentObject).queue('fx', []).animate({height: 0}, speed);
		$(indicator).html('+');
	} else {
		var oldHeight = 0;
		for(thisElement in eleHeights) {
			element = eleHeights[thisElement];
			if(element[0] == contentObject) {
				oldHeight = element[1];
			}
		}

		if(oldHeight) {
			$(contentObject).queue('fx', []).animate({height: oldHeight + 'px'}, speed);
			$(indicator).html('-');
		}
	}
}