
let BOY;
let BImg;
let shImg;
let bImg;
let Sharks = [];
let soundClassifier;
var Bscore=0;
var K = null;
var Gover = document.querySelector("#gameOver");
let Sgame = new Audio ("sea waves.mp3");
let SgameOver = new Audio ("game over.mp3");
var i = 0 ;


function preload() {
  const options = {
    probabilityThreshold: 0.95};
  soundClassifier = ml5.soundClassifier('SpeechCommands18w', options);
  BImg = loadImage('BOY.png');
  shImg = loadImage('Shark.png');
  bImg = loadImage('background.gif');

}

function mousePressed() {
  Sharks.push(new Shark());
}

function setup() {
  createCanvas(1255, 580);
  BOY = new boy();
  soundClassifier.classify(gotCommand);
}

function gotCommand(error, results) {
  if (error) {
    console.error(error);
  }
  console.log(results[0].label, results[0].confidence);
  if (results[0].label == 'up') {
    BOY.jump();
  }
}

function keyPressed() {
  if (key == ' ') {
    BOY.jump();
  }
}

function draw() {
   Sgame.play();
  if (random(1) < 0.005) {
    Sharks.push(new Shark());
  }

  background(bImg);
 
  Gover.style.display = "none";

  for (let sh of Sharks) {
  
    sh.move();
    sh.show();
    if(!BOY.hits(sh)){
       Bscore++;}
   if (BOY.hits(sh)) {
      
      Sgame.pause();
      SgameOver.play();
      Gover.style.display="block";
      //________________________-
      document.getElementById("Bscore").innerHTML= Bscore ;
      document.getElementById("p1").value = Bscore;
      var username = document.getElementById('username').value;
      document.getElementById("username").value = username ;
      document.getElementById("f1").submit();
      clearInterval(K);
      noLoop();
     
    }
text('YOUR SCORE: ' + Bscore, width - 800, height / 9);
BOY.show();
BOY.move();

}

}

