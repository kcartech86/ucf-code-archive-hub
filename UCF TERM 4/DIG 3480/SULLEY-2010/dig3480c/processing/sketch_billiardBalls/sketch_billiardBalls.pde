void setup(){
  size(300,300);
  fill(0,0,0);
  quad(0,0, 300,0, 300,300, 0,300 );
  
}

void drawBallFunc(int r, int g, int b, int x, int y, boolean stripe, int ballNum){
  fill(r,g,b);
  noStroke();
  ellipse(x,y,48,48);

  fill(255,255,255);
  stroke(255,255,255);
  ellipse(x,y,26,26);

  
  
}
void draw(){
  drawBallFunc(255,255,60,150,45,true,0);
  drawBallFunc(255,255,60,126,88,true,0);
  drawBallFunc(0,200,255,174,88,true,0);
  drawBallFunc(0,200,255,102,130,true,0);
  drawBallFunc(30,30,30,150,130,true,0);
  drawBallFunc(220,0,0,198,130,true,0);
  drawBallFunc(220,0,0,78,170,true,0);
  drawBallFunc(255,40,255,126,170,true,0);
  drawBallFunc(255,40,255,174,170,true,0);
  drawBallFunc(255,150,50,222,170,true,0);
  drawBallFunc(0,220,0,54,214,true,0);
  drawBallFunc(255,150,50,102,214,true,0);
  drawBallFunc(220,0,0,150,214,true,0);
  drawBallFunc(0,220,0,198,214,true,0);
  drawBallFunc(220,0,0,246,214,true,0);

}  
