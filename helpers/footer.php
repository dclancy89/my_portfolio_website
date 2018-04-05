
<footer id="footer">
	<div>&copy; 2018 Daniel T Clancy. Designed and developed with love by <a href="http://www.danieltclancy.com">Daniel T Clancy</a>.</div>
</footer>



<script>
$(document).ready(function(){

    //Mobile Menu
    	$("#hamburger").click(function(){
            $("#mobile-nav").toggle('blind', 500);
        });
	
	
		$(".main-nav li a").click(function(){
			
			if($(window).width() < 768) {
            	$("#mobile-nav").toggle('blind', 500);
			}
        });
	
	$(window).resize(function(){
		if($(window).width() >= 768) {
			$("#mobile-nav").css("display", "block");
		} else {
			$("#mobile-nav").css("display", "none");
		}
	})
	
		
    
});
	
</script>

<script>
	 //Submit button actions
$('button[type="submit"]').click(function(event) {
	event.preventDefault();	

			var url = $('#contactform').attr("action");
			
			var name = $("#name").val();
			var company = $("#company").val();
			var email = $("#email").val();
			var phone = $("#phone").val();
			var icecream = $("#icecream").val();
			var submit = $("#submit").val();
	
			var captcha_response = grecaptcha.getResponse();
	
			$("#name").css("border-color", "transparent");
			$("#company").css("border-color", "transparent");
			$("#email").css("border-color", "transparent");
			$("#phone").css("border-color", "transparent");
			$("#icecream").css("border-color", "transparent");
			$("#submit").css("border-color", "transparent");
	
	
	
	
	
	if(!name) {
		console.log("name is empty");
		$("#name").css("border-color", "red");
	}
	
	if(!company) {
		console.log("company is empty");
		$("#company").css("border-color", "red");
	}
	
	if(!email) {
		console.log("email is empty");
		$("#email").css("border-color", "red");
	}
	
	if(!phone) {
		console.log("phone is empty");
		$("#phone").css("border-color", "red");
	}
	
	if(!icecream) {
		console.log("iceream flavor is empty");
		$("#icecream").css("border-color", "red");
	}
	
	if(captcha_response.length == 0) {
		$(".g-recaptcha > div").css("border-color", "red");
	}
	
	if(name && company && email && phone && icecream && (captcha_response.length != 0)) {
	
			$.ajax(url, {
				data: {
					name: name,
					company: company,
					email: email,
					phone: phone,
					icecream: icecream,
					captcha: captcha_response,
					submit: submit
				},
				type  : "POST",
				success : function(response) {
					$('#contactform').html("<p class=\"ajax\">Thank you for telling my your favorite icecream flavor. I will probably not sell that information.</p>");

					},
				error : function(response) {
					alert("Error. Try again later.");	
					}
				}
			
			);	
	}
	
		
	
});
</script>
</body>
</html>
