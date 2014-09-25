// Arup Guha
// 1/25/06
// A program to show the use of a couple math library functions.
// Note: To compile anything using the math library in olympus, do
// gcc -lm -o quadratic quadratic.c

#include <stdio.h>
#include <math.h>

int main(void) {

  int a, b, c;
  double disc, root1, root2;

  // Read in the coefficients for the quadratic.
  printf("Enter in a, b and c from your quadratic equation.\n");
  printf("Please enter values so the equation has real roots.\n");
  scanf("%d%d%d", &a, &b, &c);

  // Calculate the discriminant.
  disc = pow(b,2) - 4*a*c;
   
  root1 = (-b + sqrt(b*b-4*a*c))/(2*a);
  root2 = (-b - sqrt(disc))/(2*a);
  printf("The roots are %.2lf and %.2lf.\n", root1, root2);
  

  return 0;
}
