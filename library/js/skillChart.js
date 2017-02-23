(function($){

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
        }];

        var h = 300;
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
}(jQuery));


