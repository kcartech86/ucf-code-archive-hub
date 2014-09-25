// Arup Guha
// 1/15/04
// Example Program for COP 3223 with a plan.
// The program computes the cost of a circular plot of land, given the
// radius of the plot and the cost of the land per square unit.
#include <stdio.h>

#define PI 3.14159

int main() {

  float fence_len ;
  float radius, area;
  
  printf("How long is your fence? \n");
  
  scanf("%f", &fence_len);
  
  radius = (fence_len/2)/PI;
  
  area = PI*radius*radius;
  
  printf("Enclosure area is: %.2f\n", area);
  
  system("Pause");
  return 0;
}
