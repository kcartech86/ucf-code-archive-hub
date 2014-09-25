import processing.core.*; 
import processing.xml.*; 

import java.applet.*; 
import java.awt.Dimension; 
import java.awt.Frame; 
import java.awt.event.MouseEvent; 
import java.awt.event.KeyEvent; 
import java.awt.event.FocusEvent; 
import java.awt.Image; 
import java.io.*; 
import java.net.*; 
import java.text.*; 
import java.util.*; 
import java.util.zip.*; 
import java.util.regex.*; 

public class assignment2_gallery extends PApplet {

/*Kyle Cartechine
  DIG 3480c
  Assignment 2-Gallery */
  
public void setup() {
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

public void drawThumb(String filename, int x, int y, int w, int h ) {
  PImage thumbnail;
  thumbnail = loadImage(filename);
  image(thumbnail,x,y,w,h);
  
}

public void clickThumb(String filename, int xbound1, int xbound2, int ybound1, int ybound2, int img_x, int img_y, int img_w, int img_h ) {
  if((mousePressed==true) && ((mouseX > xbound1) && (mouseX < xbound2)) && ((mouseY > ybound1) && (mouseY < ybound2))) {
    noStroke();
    rect(0,0,500,375);
    PImage fullpic = loadImage(filename);
    image(fullpic,img_x,img_y,img_w,img_h);
  }
}

public void draw() {
  //Original handgun
  drawThumb("handgun.jpg",12,388,100,100);
  clickThumb("handgun.jpg",0,125,375,500,65,0,370,370);
  
  //Processed handgun  
  drawThumb("gun_proce1.jpg",138,388,100,100);
  clickThumb("gun_proce1.jpg",125,250,375,500,65,0,370,370);
  
  //Original nes controller
  drawThumb("nes_control.jpg",262,388,100,75);
  clickThumb("nes_control.jpg",250,375,375,500,0,0,500,375);
  
  //Processed nes controller
  drawThumb("nes_proce1.jpg",388,388,100,75);
  clickThumb("nes_proce1.jpg",375,500,375,500,0,0,500,375);

}  

  static public void main(String args[]) {
    PApplet.main(new String[] { "--bgcolor=#F0F0F0", "assignment2_gallery" });
  }
}