// Daniel Shiffman
// https://thecodingtrain.com/CodingChallenges/147-chrome-dinosaur.html
// https://youtu.be/l0HoJHc-63Q

// Google Chrome Dinosaur Game (Unicorn, run!)
// https://editor.p5js.org/codingtrain/sketches/v3thq2uhk

let BOY;
let BImg;
let shImg;
let bImg;
let Sharks = [];
let soundClassifier;

function preload() {
  const options = {
    probabilityThreshold: 0.95
  };
  soundClassifier = ml5.soundClassifier('SpeechCommands18w', options);
  BImg = loadImage('BOY.png');
  shImg = loadImage('Shark.png');
  bImg = loadImage('background.png');
}

function mousePressed() {
  Sharks.push(new Shark());
}

function setup() {
  createCanvas(800, 450);
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
  if (random(1) < 0.005) {
    Sharks.push(new Shark());
  }

  background(bImg);
  for (let sh of Sharks) {
    sh.move();
    sh.show();
    if (BOY.hits(sh)) {
      console.log('game over');
      noLoop();
    }
  }

  BOY.show();
  BOY.move();
}
