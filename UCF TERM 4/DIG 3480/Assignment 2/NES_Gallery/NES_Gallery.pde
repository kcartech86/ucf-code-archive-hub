void setup() {
  size(500, 500);
  background(80,64,100);
  noStroke();
}

void draw(){
  //Cord
  fill(30);
  smooth();
  quad(160,165, 178,165, 208,0, 190,0); 
  
  //Controller base
  fill(220,220,214);
  rect(55,165,410,170);
   
  //Controller Surface
  fill(30);
  rect(70,195,380,125);
  
  fill(153);
  rect(185,195,130,125);
  
  fill(30);
  rect(185,214,130,6);
  rect(185,238,130,6);
  rect(185,264,130,6);
  
  fill(220,220,214);
  rect(185,270,130,34);
  
  fill(30);
  rect(185,304,130,6);
  
  //D-pad--------------------------------------------------------
  fill(220,220,214);
  rect(114,225,26,78);
  rect(88,251,78,26);
  
  fill(15,15,15);
  rect(116,227,22,74);
  rect(90,253,74,22);
  
  //Arrows on D-pad
  fill(22);
  ellipse(127,264,18,18);
  //UP
  rect(121,238,12,10);
  triangle(117,238, 136,238,  127,228);
  //Down
  rect(121,280,12,10);
  triangle(117,290,136,290,127,300);
  //Right
  rect(144,258,10,12);
  triangle(154,254,162,264,154,274);
  //Left
  rect(100,258,10,12);
  triangle(100,254,90,264,100,274);
//---------------------------------------------------------------
//Start and Select
  smooth();
  ellipse(216,288,38,12);
  ellipse(284,288,38,12);
//---------------------------------------------------------------
//A and B Button
  fill(220,220,214);
  rect(334,270,38,38);
  rect(380,270,38,38);
  
  fill(230,60,34);
  smooth();
  ellipse(353,289,34,34);
  ellipse(400,289,34,34);
//---------------------------------------------------------------
//Words
  PFont NESfont;
  NESfont = loadFont("Verdana-Bold-48.vlw");
  textFont(NESfont, 14);
  text("Nintendo",342,232);
  textSize(12);
  text("START      SELECT",190,260);
  textSize(20);
  text("Know your roots...",250, 50);
}
