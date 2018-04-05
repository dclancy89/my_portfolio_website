// JavaScript Document
// Color Shape Game v1.1.0
// Aug 4th 2016
var colorBox = document.getElementById("color_box");
var counterBox = document.getElementById("counter_box");
var counter = 0;

var randomAttribute = function(min, max) {
	return Math.floor(Math.random() * (max - min)) + min;
	};

$(".color_box").click(function(){
	counter++;
    $(".color_box").animate({
        left: randomAttribute(0,75) + "%",
		top: randomAttribute(0,75) + "%",
        height: randomAttribute(50,300) + "px",
        width: randomAttribute(50,300) + "px"
		
    });
	
	var newColor = "rgb(" + randomAttribute(0,256) + "," + randomAttribute(0,256) + "," + randomAttribute(0,256) + ")";
		colorBox.style.backgroundColor = newColor;
		
		var newBorderRadius = randomAttribute(0,101) + "%";
		colorBox.style.borderRadius = newBorderRadius;
	
	counterBox.innerHTML = 'Score: <span class="counter">' + counter + '</span>';
	
	
});