// JavaScript Document

var calendarDays = document.getElementsByTagName("td");
var dayModal = document.getElementById("modal_container");
var modalAlreadyActive = true;


for( var i=0; i < calendarDays.length; i++) {
	var calDate = calendarDays[i].innerHTML;
	calendarDays[i].innerHTML = '<div class="day_number">' + calDate + '</div>';
	
}

var dayClick = function(){
		
		if(this.classList.contains("active") && modalAlreadyActive){
			
			modalAlreadyActive = true;
			dayModal.classList.add("hidden");
		} else {
			modalAlreadyActive = false;
		}
		
		for( var j = 0; j < calendarDays.length; j++){
			if(calendarDays[j].classList.contains("active")){
				calendarDays[j].classList.toggle("active");
				
			}
		}
	
		var box = this.getBoundingClientRect();
		
		var top = box.top;
		var left = box.left;
		var width = box.width;
		var height = box.height;
	
		
		
		console.log("Top: " + top + ", Left: " + left);
		console.log("Width: " + width + ", Height: " + height);
		
	if(!this.classList.contains("not_a_day")){
			this.classList.toggle("active");
			if(!modalAlreadyActive){
				
				dayModal.classList.remove("hidden");
				modalAlreadyActive = true;
				
			} else {
				
				dayModal.classList.add("hidden");
				modalAlreadyActive = false;
			}
		
			var dayModalNewTop = top + (height / 2);
			var dayModalNewLeft = left - ( (dayModal.getBoundingClientRect().width - width) / 2);
			dayModal.style.top = dayModalNewTop + "px";
			dayModal.style.left = dayModalNewLeft + "px";
	} else {
		if(!dayModal.classList.contains("hidden")){
			dayModal.classList.toggle("hidden");
		}
		
	}	
	
};

/*var modalClick = function(){
	
	this.classList.toggle("hidden");
	modalAlreadyActive = false;
};

dayModal.addEventListener("click", modalClick);*/


for (var i = 0; i< calendarDays.length; i++) {
	
	calendarDays[i].addEventListener("click", dayClick);
}



