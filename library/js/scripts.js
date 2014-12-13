/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,
      d=document,
      e=d.documentElement,
      g=d.getElementsByTagName('body')[0],
      x=w.innerWidth||e.clientWidth||g.clientWidth,
      y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y }
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/


/*
 * Put all your regular jQuery in here. */

jQuery(document).ready(function($) {

	/* Mobile Nav Menu */
  $(window).on( 'load resize', function(){
  
      var $navContainer = $('#navigation');

      if(window.width > 768){
          $navContainer.waypoint('unsticky');
          console.log('unsticky!');
      }else{
          $navContainer.waypoint('sticky', {
            offset: 50
          });
          console.log('sticky!');
      };
  });
   
  

  $('.menu-toggle').click( function(){
      $('.nav-menu').slideToggle(500);
      $(this).toggleClass('toggled');
  });
  
  
  

	/* Init Portfolio Isotope Gallery */
	var $container = $('#gallery-container');


	$container.imagesLoaded( function(){
		$container.isotope({
			columnWidth: '.gallery-item',
			containerStyle: null,
			masonry: {
				itemSelector: '.item',
				isFitWidth: true
			}
		});

		$('#filters').on('click', 'button', function(){
			var filterValue = $(this).attr('data-filter');
			$container.isotope({
				filter: filterValue
			});
		});
	}); 


	/* Masonry Gallery for Posts */

	var postGallery = $('.gallery');

	postGallery.imagesLoaded( function(){
		postGallery.masonry({
			columnWidth: '.gallery-item',
			isFitWidth: true
		});
	});
	
	/* Contact Form Validation */

	$("#contactForm").validate({
		rules: {
    		"form_name": {
     			required: true,
      			minlength: 5
    		},
    		"email": {
    			required: true,
    			email: true
    		}
  		},
  		messages: {
  			"form_name": {
  				minlength: "Name must be 5 characters long."
  			},
  			"email": {
  				email: "You must use a real email address."
  			}
  		}
	});

	// D3 Bar Chart

	var skillChart = $("#skillChart");

    skillChart.waypoint(function(){

        var dataset = [{
            label: "Html5",
            rank: 100,
            tick: "Advanced"
        },{
            label: "CSS3/Sass",
            rank: 95,
            tick: "Advanced"
        },{
            label: "UI-UX",
            rank: 90,
            tick: "Advanced"
        },{
            label: "Wordpress",
            rank: 60,
            tick: "Intermediate"
        },{
            label: "javaScript",
            rank: 35,
            tick: "Beginner"
        },{
            label: "Ruby on Rails",
            rank: 20,
            tick: "Beginner"
        }];

        var h = 400;
        var w = skillChart.width();

        var barPadding = 2;

        var xScale = d3.scale.linear()
                        .domain([0, d3.max(dataset, function(d){
                            return d.rank;
                        })])
                        .range([0, w]);

        var dy = h / dataset.length;

        var svg = d3.select("#skillChart")
        				.append("svg")
        				.attr("height", h);

        svg.selectAll("rect")
        	.data(dataset)
        	.enter()
        	.append("rect")
        	.attr("x", 10)
            .attr("y", function(d,i){
            	return dy * i + barPadding;
            })
            .attr("width", 0)
            .attr("height", function(d){
                return h / dataset.length - barPadding;
            })
            .attr("opacity", 0)
            .transition("ease-in")
            .delay(function(d,i){
                return i * 1000;
            })
            .duration(2000)
            .attr("opacity", 1)
            .attr("width", function(d){
                return xScale(d.rank);
            })
            .attr("fill", function(d){
            	return "hsl(23, 94%, "+ (d.rank / 2) +"%)"
           	});

         svg.selectAll("text")
         	.data(dataset)
         	.enter()
         	.append("text")
            .text(function(d){
                return d.label + " " + "(" + d.tick + ")";
            })
            .attr("opacity", 0)
         	.transition("ease-in")
            .delay(function(d,i){
                return i * 1000;
            })
         	.attr("x", 30)
         	.attr("y", function(d, i){
         		return i * (h / dataset.length) + (h / dataset.length - barPadding) / 1.6;
         	})
            .duration(2000)
            .attr("opacity", 1)
         	.attr("fill", "white");

    },{

        offset: 300,
        triggerOnce: true

    });
}); 


/* end of as page load scripts */
