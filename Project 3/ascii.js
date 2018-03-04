// Dusten Peterson | Web Development 3610 | JS Practice | JSLint error with for loop - talked in class
"use strict";

var speed = 250;
var turboSpeed = 10;
var int;
var framesArray;

//Disable the stop button when page is loaded
window.onload = function (){
  document.getElementById("stop").disabled = true;
};

//Start the animation when start is clicked
function startAnimation(){
  document.getElementById("start").disabled = true;
  document.getElementById("stop").disabled = false;
  document.getElementById("animations").disabled = true;

  var textBox = document.getElementById("displayarea");
  var frames = textBox.value.split("=====\n");
  framesArray = frames;
  turbo();
}

//Stop animation when stop is pressed
function stopAnimation(){
  var stop = document.getElementById("stop");
  stop.value = clearInterval(int);
  selectAnimation();
  document.getElementById("start").disabled = false;
  document.getElementById("animations").disabled = false;
  document.getElementById("stop").disabled = true;
}

//Create the animation from the array
function Animate(animation) {
  var textBox = document.getElementById("displayarea");
  var frames = animation.shift();
  textBox.value = frames;
  animation.push(frames);
  frames = animation;
}

//Change the size of the animation in the displayarea
function selectSize(){
  var e = document.getElementById("size");
  var applyfontsize = e.options[e.selectedIndex].value;
  document.getElementById("displayarea").style.fontSize = applyfontsize;
}

//Select what animation to display in the displaybox
function selectAnimation(){
  var animation = "";
  var animations = document.getElementById("animations");
  var displayBox = document.getElementById("displayarea");
  for (var i = 0; i < animations.length; i++){ //JSLint error(talked in class)
    if(animations[i].selected == true){
      animation = animations[i].value;
      displayBox.value = ANIMATIONS[animation];
    }
  }
}

//Increase the speed of the animation when the box is checked
function turbo(){
  var turbo = document.getElementById("turbo");
  if(document.getElementById("stop").disabled == false){
    if(turbo.checked == true){
      clearInterval(int);
      int = setInterval(function() {Animate(framesArray);}, turboSpeed);
    }
    else{
      clearInterval(int);
      int = setInterval(function() {Animate(framesArray);}, speed);
    }
  }
}
