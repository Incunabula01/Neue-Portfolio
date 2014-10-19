(function($){
				var data = {
					labels: ["HTML5","CSS","jQuery","UI-UX"],
					datasets: [{
						fillColor: "rgba(78, 197, 233, 0.5)",
						data: [90,80,20,60],
						title: "Numbers"
					}]
				};

				var options = {
					spaceRight: 30,
					responsive: true,
		            scaleOverlay: false,
		            scaleOverride: false,
		            scaleSteps: null,
		            scaleStepWidth: null,
		            scaleStartValue: null,
		            scaleLineColor: "rgba(78, 197, 233, 0.2)",
		            scaleLineWidth: 1,
		            scaleShowLabels: true,
		            scaleFontFamily: "Ostrich Regular",
            		scaleFontSize: 16,
            		scaleFontStyle: "normal",
            		scaleFontColor: "#052636",
		            scaleShowGridLines: false,
		            scaleXGridLinesStep : 1,
		            scaleYGridLinesStep : 1,
		            scaleGridLineColor: "rgba(78, 197, 233, 0.5)",
		            scaleGridLineWidth: 1,
		            scaleTickSizeLeft: 5,
		            scaleTickSizeRight: 5,
		            scaleTickSizeBottom: 5,
		            scaleTickSizeTop: 5,
		            showYAxisMin: true,      // Show the minimum value on Y axis (in original version, this minimum is not displayed - it can overlap the X labels)
		            rotateLabels: "smart",   // smart <=> 0 degre if space enough; otherwise 45 degres if space enough otherwise90 degre; 
		            barShowStroke: false,
		            barStrokeWidth: 2,
		            barValueSpacing: 5,
		            barDatasetSpacing: 1,
		            animation: true,
		            animationSteps: 60,
		            animationEasing: "easeOutQuart",
		            onAnimationComplete: null,
		            annotateLabel: "<%=(v1 == '' ? '' : v1) + (v1!='' && v2 !='' ? ' - ' : '')+(v2 == '' ? '' : v2)+(v1!='' || v2 !='' ? ':' : '') + v3 + ' (' + v6 + ' %)'%>",
					reverseOrder: false,
					graphMin : 0,
					fullWidthGraph : true,
					yAxisFontFamily: "Ostrich Black",
            		yAxisFontSize: 18,
            		yAxisFontStyle: "normal",
            		yAxisFontColor: "#052636",
				};

				var canvas = $('#skillChart');

				function graphDimensions(){
					canvas.height = window.innerHeight / 2;
					canvas.width = window.innerWidth > 960 ? 960 : window.innerWidth;
				};

				var graph = canvas.html(function(){
					graphDimensions();
				});
				var ctx = canvas.get(0).getContext('2d');

				new Chart(ctx).HorizontalBar(data,options);

				
})(jQuery);