// Dusten Peterson | Web Development 3610 | jQuery Practice
//Global variables
var gapX = 300;
var gapY = 300;
var moveX;
var moveY;
var tempX;
var tempY;

//Create the puzzle area with aligning the divs
$(function() {
  $("#puzzlearea div").addClass("tile");
  $("#puzzlearea").children().each(function() {
    var tile = parseInt($(this).text());
    $(this).css("top", parseInt((tile - 1)/4) * (100), "px");
    $(this).css("left", ((tile - 1)%4) * (100), "px");
    $(this).css("background-position-y", parseInt((tile - 1)/4) * (-100), "px");
    $(this).css("background-position-x", ((tile - 1)%4) * (-100), "px");
    $(this).click(move);
    $(this).hover(outline);
  });
  $("#shufflebutton").click(shuffle);
});

//Create a function that assigns the class outline to puzzle area divs if a move is legal. If not remove the class
function outline() {
  moveY = parseInt($(this).css("top").slice(0, -2));
  moveX = parseInt($(this).css("left").slice(0, -2));
  if(
    (moveX == gapX) && (moveY == (gapY - 100)) ||
    (moveX == (gapX - 100)) && (moveY == gapY) ||
    (moveX == (gapX + 100)) && (moveY == gapY) ||
    (moveX == gapX) && (moveY == (gapY + 100))
    ){
    $(this).addClass("outline");
  }
  else {
    $(this).removeClass("outline");
  }
}

//Shuffle the puzzle
function shuffle() {
  alert("Press OK to shuffle the puzzle.");
  for(var i = 0; i < 100; i++){
    $("#puzzlearea").children().each(function() {
      var temp = parseInt($(this).text());
      var ranNum = Math.floor(Math.random() * 16);
      if(temp == ranNum){
      moveY = parseInt($(this).css("top").slice(0, -2));
      moveX = parseInt($(this).css("left").slice(0, -2));
      tempX = moveX;
      tempY = moveY;
      moveY = $(this).css("top", gapY, "px");
      moveX = $(this).css("left", gapX, "px");
      gapY = tempY;
      gapX = tempX;
      }
    });
  }
}

function move() {
    //Get the tile clicked values
    moveY = parseInt($(this).css("top").slice(0, -2));
    moveX = parseInt($(this).css("left").slice(0, -2));

    //Move tile down
    if((moveX == gapX) && (moveY == (gapY - 100))){
      tempX = moveX;
      tempY = moveY;
      moveY = $(this).css("top", gapY, "px");
      moveX = $(this).css("left", gapX, "px");
      gapY = tempY;
      gapX = tempX;
    }

    //Move tile right
    if((moveX == (gapX - 100)) && (moveY == gapY)){
      tempX = moveX;
      tempY = moveY;
      moveY = $(this).css("top", gapY, "px");
      moveX = $(this).css("left", gapX, "px");
      gapY = tempY;
      gapX = tempX;
    }

    //Move tile left
    if((moveX == (gapX + 100)) && (moveY == gapY)){
      tempX = moveX;
      tempY = moveY;
      moveY = $(this).css("top", gapY, "px");
      moveX = $(this).css("left", gapX, "px");
      gapY = tempY;
      gapX = tempX;
    }


    //Move tile up
    if((moveX == gapX) && (moveY == (gapY + 100))){
      tempX = moveX;
      tempY = moveY;
      moveY = $(this).css("top", gapY, "px");
      moveX = $(this).css("left", gapX, "px");
      gapY = tempY;
      gapX = tempX;
    }
  }
