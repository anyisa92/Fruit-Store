var i = 0;
var images = [];
var time = 3000;
images[0] = 'apple.png';
images[1] = 'avocado.png';
images[2] = 'cherry.png';
images[3] = 'lemon.png';
images[4] = 'lime.jpg';
images[5] = 'orange.png';
images[6] = 'pear.jpg';
images[7] = 'pears.png';
images[8] = 'pineapple.png';
images[9] = 'strawberry.png';
function slideImg(){
  document.fruitSlide.src = images[i];
  if(i < images.length - 1){
    i++;
  } else {
    i = 0;
  }
  setTimeout("slideImg()", time);
}
window.onload = slideImg;
