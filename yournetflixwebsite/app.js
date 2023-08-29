const navbar = document.querySelector('.navbar');
const timeStamp = document.querySelectorAll('.stamp');
const scrolltotop = document.querySelector('#btnScrolltoTop');

window.addEventListener("scroll", () => {
    navbar.classList.toggle("sticky", window.scrollY > 0);
})

onscroll = () => {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrolltotop.style.display = "block";
    } else{
        scrolltotop.style.display = "none";
    }
}
scrolltotop.addEventListener('click', function() {
    scrollTo({
        top:0,
        left:0,
        behavior: 'smooth'
    })
})
const reqmovie = document.querySelector('.reqmovie');
const request = document.querySelector('.requestmov');

reqmovie.addEventListener('click',() => {
	request.style.display = "block";
	request.classList.add("movierequest")
})
request.addEventListener('click',(e) => {
	if (e.target.classList.contains("movierequest")) {
		e.target.style.display = "none";
	}
})

const disable = document.querySelector('.disable');
const error = document.querySelector('.error');
disable.addEventListener('click',() => {
	if (error.classList.contains('animate')) {
		error.classList.remove('animate');
	}
	error.style.animationTimingFunction = "linear";
	error.innerHTML = `<span class="spanerror text-underline"><h5><a href="pricing"style="color:#fdf000">Subscribe</a> to Send Movie request</h5><span>`
})
error.addEventListener('click', () => {
	error.classList.add('animate');
	error.style.animationFillMode = "forwards";
})

