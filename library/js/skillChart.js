(function($){
    $("#skillChart").waypoint(function(){

        var dataset = [100,100,40,50,70,30];
        var labels = ["Html5","CSS3/Sass","javaScript","wordpress","UI-UX","Ruby-on-Rails"];

        var h = 400;
        var w;
        var barPadding = 1;

        var svg = d3.select("#skillChart")
        				.append("svg")
        				.attr("height", h);

        svg.selectAll("rect")
        	.data(dataset)
        	.enter()
        	.append("rect")
        	.attr("x", 10)
            .attr("y", function(d,i){
            	return i * (h / dataset.length - barPadding);
            })
            .attr("width", 0)
            .attr("height", 50)
            .transition("ease-in")
            .delay(function(d,i){
                return i * 1000;
            })
            .attr("fill", function(d){
            	return "hsl(194, 78%,"+ (d / 2) +"%)"
           	})
            .attr("width", function(d){
            	return d * 5;
            });

         svg.selectAll("text")
         	.data(labels)
         	.enter()
         	.append("text")
         	.transition("ease-in")
            .delay(function(d,i){
                return i * 1000;
            })
            .text(function(d){
                return d;
            })
         	.attr("x", 30)
         	.attr("y", function(d, i){
         		return i * (h / dataset.length) + (h / dataset.length - barPadding) /2.3;
         	})
         	.attr("fill", "white");

    },{

        offset: 300,
        triggerOnce: true

    });
}(jQuery));


