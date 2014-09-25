// Arup Guha
// 2/2/2010
// Solution to Spring 2010 COP 3223 Program #2A: Land Enclosure
#include <stdio.h>

int main() {
    
    double area;
    int Lratio, Wratio;
    
    // Get all the user information.
    printf("What area do you need for your enclosure in square feet?\n");
    scanf("%lf", &area);
    
    printf("What is the ratio of the length to the width of your enclosure?\n");
    scanf("%d%d", &Lratio, &Wratio);
    
    double length, width, scale_factor;
    
    /* First, let's solve this problem:
              
       Let the length of the rectangle be Lx.
       Then, the width of the rectangle is Wx, so that the ratio of
       the two can be L:W.
       
       The area of the rectangle is LxWx, but it is also area.
       
       We have LxWx = area
               x^2 = area/(L*W)
               x = sqrt(area/(L*W))
               
       This allows us to solve for x, the scale factor necessary to multiply
       the original values entered by the user to obtain the real side lengths.
    */
    scale_factor = sqrt(area/(Lratio*Wratio));
    
    // Get both the length and width now.
    length = Lratio*scale_factor;
    width = Wratio*scale_factor;
    
    // We can output all the values required by the assignment now.
    printf("Your enclosure has dimensions %.2lf feet by %.2lf feet.\n", length, width);
    
    // Perimeter is just 2*(L+W).
    printf("You will need %.2lf feet of total fence.\n", 2*(length+width));
    
    system("PAUSE");
    return 0;    
}
