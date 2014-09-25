// Arup Guha
// 1/18/06
// Small program that calculates the volume of a sphere both correctly and
// incorrectly. It's a more practical example of the difference between
// integer and real number division.

#include <stdio.h>

#define PI 3.1415926

int main() {

  double radius = 2.5;
  double volume1, volume2, volume3, volume4;

  // Four volume calculations.  
  volume1 = 4/3*PI*radius*radius*radius;
  volume2 = 4*PI*radius*radius*radius/3;
  volume3 = PI*radius*radius*radius*4/3;
  volume4 = PI*radius*radius*radius*(4/3);

  // Each of the outputs.
  printf("volume1 = %.2lf\n", volume1);
  printf("volume2 = %.2lf\n", volume2);
  printf("volume3 = %.2lf\n", volume3);
  printf("volume4 = %.2lf\n", volume4);

  return 0;
}
