

class Shark {
  constructor() {
    this.r = 100; 
    // اصغر حجم القرش 
    this.x = width;
    this.y = height - this.r;
  }

  move() {
    this.x -= 10;
  }

  show() {
    image(shImg, this.x, this.y, this.r, this.r);
  }
}
