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
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
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
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
*/



/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {
/*
 *  Project: jquery.responsiveTabs.js
 *  Description: A plugin that creates responsive tabs, optimized for all devices
 *  Author: Jelle Kralt (jelle@jellekralt.nl)
 *  License: MIT */
  function(e,t,n){function i(t,n){this.element=t;this.$element=e(t);this.tabs=[];this.state="";this.rotateInterval=0;this.$queue=e({});this.options=e.extend({},r,n);this.init()}var r={collapsible:"accordion",startCollapsed:!1,rotate:!1,setHash:!1,animation:"default",duration:500,activate:function(){},deactivate:function(){},load:function(){},activateState:function(){},classes:{stateDefault:"r-tabs-state-default",stateActive:"r-tabs-state-active",tab:"r-tabs-tab",anchor:"r-tabs-anchor",panel:"r-tabs-panel",accordionTitle:"r-tabs-accordion-title"}};i.prototype.init=function(){var n=this;this.tabs=this.loadElements();this.loadClasses();this.loadEvents();e(t).on("resize",function(e){n.setState(e)});e(t).on("hashchange",function(e){var r=n.getTabRefBySelector(t.location.hash);r>=0&&!n.getTab(r)._ignoreHashChange&&n.openTab(e,n.getTab(r),!0)});this.options.rotate!==!1&&this.startRotation();this.$element.bind("tabs-activate",function(e){n.options.activate.call(this,e)});this.$element.bind("tabs-deactivate",function(e){n.options.deactivate.call(this,e)});this.$element.bind("tabs-load",function(e){var r=n.getTabRefBySelector(t.location.hash),i;n.setState(e);if(n.options.startCollapsed!==!0&&(n.options.startCollapsed!=="accordion"||n.state!=="accordion")){r>=0?i=n.getTab(r):i=n.getTab(0);n.openTab(e,i);n.options.load.call(this,e,i)}});this.$element.trigger("tabs-load")};i.prototype.loadElements=function(){var t=this.$element.children("ul"),n=[];this.$element.addClass("r-tabs");t.addClass("r-tabs-nav");e("li",t).each(function(){var t=e(this),r=e("a",t),i=r.attr("href"),s=e(i),o=e("<div></div>").insertBefore(s),u=e("<a></a>").attr("href",i).html(r.html()).appendTo(o),a={_ignoreHashChange:!1,tab:e(this),anchor:e("a",t),panel:s,selector:i,accordionTab:o,accordionAnchor:u,active:!1};n.push(a)});return n};i.prototype.loadClasses=function(){for(var e=0;e<this.tabs.length;e++){this.tabs[e].tab.addClass(this.options.classes.stateDefault).addClass(this.options.classes.tab);this.tabs[e].anchor.addClass(this.options.classes.anchor);this.tabs[e].panel.addClass(this.options.classes.stateDefault).addClass(this.options.classes.panel);this.tabs[e].accordionTab.addClass(this.options.classes.accordionTitle);this.tabs[e].accordionAnchor.addClass(this.options.classes.anchor)}};i.prototype.loadEvents=function(){var e=this,n=function(n){var r=e.getCurrentTab(),i=n.data.tab;n.preventDefault();e.options.setHash&&(t.location.hash=i.selector);n.data.tab._ignoreHashChange=!0;if(r!==i||e.isCollapisble()){e.closeTab(n,r);(r!==i||!e.isCollapisble())&&e.openTab(n,i,!1,!0)}};for(var r=0;r<this.tabs.length;r++){this.tabs[r].anchor.on("click",{tab:e.tabs[r]},n);this.tabs[r].accordionAnchor.on("click",{tab:e.tabs[r]},n)}};i.prototype.setState=function(t){var n=e("ul",this.$element),r=this.state;n.is(":visible")?this.state="tabs":this.state="accordion";this.state!==r&&this.$element.trigger("tabs-activate-state",t,{oldState:r,newState:this.state})};i.prototype.getState=function(){return this.state};i.prototype.openTab=function(e,t,n,r){var i=this;n&&this.closeTab(e,this.getCurrentTab());r&&this.rotateInterval>0&&this.stopRotation();t.active=!0;t.tab.removeClass(i.options.classes.stateDefault).addClass(i.options.classes.stateActive);t.accordionTab.removeClass(i.options.classes.stateDefault).addClass(i.options.classes.stateActive);i.doTransition(t.panel,i.options.animation,"open",function(){t.panel.removeClass(i.options.classes.stateDefault).addClass(i.options.classes.stateActive)});this.$element.trigger("tabs-activate",e,t)};i.prototype.closeTab=function(e,t){var r=this;if(t!==n){t.active=!1;t.tab.removeClass(r.options.classes.stateActive).addClass(r.options.classes.stateDefault);r.doTransition(t.panel,r.options.animation,"close",function(){t.accordionTab.removeClass(r.options.classes.stateActive).addClass(r.options.classes.stateDefault);t.panel.removeClass(r.options.classes.stateActive).addClass(r.options.classes.stateDefault)},!0);this.$element.trigger("tabs-deactivate",e,t)}};i.prototype.doTransition=function(e,t,n,r,i){var s,o=this;switch(t){case"slide":s=n==="open"?"slideDown":"slideUp";break;case"fade":s=n==="open"?"fadeIn":"fadeOut";break;default:s=n==="open"?"show":"hide";o.options.duration=0}this.$queue.queue("responsive-tabs",function(i){e[s]({duration:o.options.duration,done:function(){r.call(e,t,n);i()}})});(n==="open"||i)&&this.$queue.dequeue("responsive-tabs")};i.prototype.isCollapisble=function(){return typeof this.options.collapsible=="boolean"&&this.options.collapsible||typeof this.options.collapsible=="string"&&this.options.collapsible===this.getState()};i.prototype.getTab=function(e){return this.tabs[e]};i.prototype.getTabRefBySelector=function(e){for(var t=0;t<this.tabs.length;t++)if(this.tabs[t].selector===e)return t;return-1};i.prototype.getCurrentTab=function(){return this.getTab(this.getCurrentTabRef())};i.prototype.getNextTabRef=function(){return this.getCurrentTabRef()===this.tabs.length-1?0:this.getCurrentTabRef()+1};i.prototype.getPreviousTabRef=function(){return this.getCurrentTabRef()===0?this.tabs.length-1:this.getCurrentTabRef()-1};i.prototype.getCurrentTabRef=function(){for(var e=0;e<this.tabs.length;e++)if(this.tabs[e].active)return e;return-1};i.prototype.startRotation=function(){var t=this;this.rotateInterval=setInterval(function(){var e=jQuery.Event("rotate");t.openTab(e,t.getTab(t.getNextTabRef()),!0)},e.isNumeric(t.options.rotate)?t.options.rotate:4e3)};i.prototype.stopRotation=function(){t.clearInterval(this.rotateInterval);this.rotateInterval=0};e.fn.responsiveTabs=function(t){var r=arguments;if(t===n||typeof t=="object")return this.each(function(){e.data(this,"responsivetabs")||e.data(this,"responsivetabs",new i(this,t))});if(typeof t=="string"&&t[0]!=="_"&&t!=="init")return this.each(function(){var n=e.data(this,"responsivetabs");n instanceof i&&typeof n[t]=="function"&&n[t].apply(n,Array.prototype.slice.call(r,1));t==="destroy"&&e.data(this,"responsivetabs",null)})}};

}); /* end of as page load scripts */
