
//Slideshow Main
var imgIndex=0;
var imgElements=document.getElementsByClassName('slideshowParts');
playSlideShow();

function playSlideShow() {
	for (var i = 0; i < imgElements.length; i++) {
		imgElements[i].style.display="none";
	}
	imgElements[imgIndex].style.display="block";
	this.imgIndex++;
	if(this.imgIndex>=imgElements.length){
		this.imgIndex=0;
	}
	setTimeout(playSlideShow,4000);
}


//People Thoughts Slideshow
let sliderImages = document.querySelectorAll(".slide"),
  arrowLeft = document.querySelector("#arrow-left"),
  arrowRight = document.querySelector("#arrow-right"),
  current = 0;

// Clear all images
function reset() {
  for (let i=0; i< sliderImages.length ;i++){
    sliderImages[i].style.display = "none";
  }
}
  var a=0;
// Init slider
function startSlide() {
  reset();
sliderImages[a].style.display = "block";
a++;
if(a >=sliderImages.length){
  a=0;
}
setTimeout(startSlide,10000);
}

// Show prev
function slideLeft() {
  reset();
  sliderImages[current - 1].style.display = "block";
  current--;
}

// Show next
function slideRight() {
  reset();
  sliderImages[current + 1].style.display = "block";
  current++;
}

// Left arrow click
arrowLeft.addEventListener("click", function() {
  if (current === 0) {
    current = sliderImages.length;
  }
  slideLeft();
});

// Right arrow click
arrowRight.addEventListener("click", function() {
  if (current === sliderImages.length - 1) {
    current = -1;
  }
  slideRight();
});


document.onkeyup = function(e) {

    if (event.keyCode == 37) {
       if (current === 0) {
    current = sliderImages.length;
  }
      slideLeft();
      
    } 
    else if (event.keyCode == 39) {
      if (current === sliderImages.length - 1) {
    current = -1;
  }
  slideRight();
    }

};

startSlide();
