var slideIndex = 0;
var slides, dots;
var slideInterval;

function initSlides() {
    slides = document.getElementsByClassName("mySlides");
    dots = document.getElementsByClassName("dot");
    showSlides(slideIndex);
}

function showSlides(n) {
    var i;
    if (n >= slides.length) {slideIndex = 0}    
    if (n < 0) {slideIndex = slides.length-1}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex].style.display = "block";  
    dots[slideIndex].className += " active";
}

function plusSlides(n) {
  clearInterval(slideInterval);
  showSlides(slideIndex += n);
  slideInterval = setInterval(function(){showSlides(slideIndex += 1)}, 8000);
}

function currentSlide(n) {
  clearInterval(slideInterval);
  showSlides(slideIndex = n-1);
  slideInterval = setInterval(function(){showSlides(slideIndex += 1)}, 8000);
}

window.onload = function() {
  initSlides();
  slideInterval = setInterval(function(){showSlides(slideIndex += 1)}, 8000);
}