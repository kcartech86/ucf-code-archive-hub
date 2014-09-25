/*Kyle Cartechine
  DIG 3480c
  Assignment 2-Gallery */
  
void setup() {
  size(500,500);
  background(150);
  fill(150);
  stroke(200,0,0);
  strokeWeight(2);
  line(0,375,500,375);
  line(125,375,125,500);
  line(250,375,250,500);
  line(375,375,375,500);
}

void draw() {
  PImage gun, gun2, nes, nes2;
  
  gun = loadImage("handgun.jpg");
  gun2 = loadImage("GUN_proce1.jpg");
  nes = loadImage("NES_control.jpg" );
  nes2 = loadImage("NES_Processed.jpg");
  
  image(gun,12,388,100,100);
  image(gun2,138,388,100,100);
  image(nes,262,388,100,75);
  image(nes2,388,388,100,75);
  
  if((mousePressed==true) && ((mouseX > 0) && (mouseX < 125)) && ((mouseY > 375) && (mouseY < 500))) {
    noStroke();
    rect(0,0,500,375);
    image(gun,65,0,370,370);
  }
  else if((mousePressed==true) && ((mouseX > 125) && (mouseX < 250)) && ((mouseY > 375) && (mouseY < 500))) {
    noStroke();
    rect(0,0,500,375); 
    image(gun2,65,0,370,370);
  }
  else if((mousePressed==true) && ((mouseX > 250) && (mouseX < 375)) && ((mouseY > 375) && (mouseY < 500))) {
    image(nes,0,0);
  }
  else if((mousePressed==true) && ((mouseX > 375) && (mouseX < 500)) && ((mouseY > 375) && (mouseY < 500))) {
    image(nes2,0,0);
  }
  
  
  
}
  
