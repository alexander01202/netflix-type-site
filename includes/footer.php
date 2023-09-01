<footer>
        <div class="sec quickLinks">
           <div style="margin:auto;color:#c4c4c4;padding:15px;">2023 yournetflixwebsite</div>
        </div>

		<button id="btnScrolltoTop">
			<i class="material-icons">arrow_upward</i>
		</button>
</footer>
</body>
</html>
<script src="app.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script>
const navbtn = document.querySelector('.navbarul button')
const nav = document.querySelector('.navbar-light')
navbtn.addEventListener('click', () => {
    if(!nav.classList.contains('sticky')){
        nav.classList.toggle('sticky');   
    }
})
if(screen.width > 768){
    navbtn.parentElement.style.display = "none";
}
$(document).ready(() => {
$("#search").keyup(() => {
	var input = $('#search').val();
	$("#output").toggleClass("display");
// 	input.siblings("div").removeClass("d-none")
	$("#select").siblings("div").addClass("d-inline-block")
	$(this).siblings(".material-icons").addClass("d-none")
	if (input !== '') {
		$.ajax({
			type:'POST',
			url: 'includes/search.php',
			data: {name:input},
			dataType: "text",
			success: function(data){
				$("#output").html(data);
				$(this).siblings("div").removeClass("d-inline-block")
				$(this).siblings("div").addClass("d-none")
	            $(this).siblings(".material-icons").removeClass("d-none")
			}
		});
	}else{
		$("#output").removeClass("display");
		$("#output").html('');
	}
});
$("#searchbtn").click(() => {
	var input = $('#search').val().trim();
	if (input !== '') {
	    window.location = "https://www.yournetflixwebsite.com?search="+input					
	}
});
$("#search").focusout(() => {
	setTimeout(() => {
		$("#output").removeClass("display");
		$("#output").html("");
	}, 300)
})
});
</script>