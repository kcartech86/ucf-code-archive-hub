// Arup Guha
// 8/25/05
// A program to show the use of a couple math library functions.
// Note: To compile anything using the math library in olympus, do
// gcc -lm -o quadratic quadratic.c

// Suggested Enhancements: 1) If one root appears twice, only print it out
//                            once.
//                         2) For complex roots, print those out, for
//                            example 3 - isqrt(5) would stand for
//                            "Three minus the square root of 5 times i."

#include <stdio.h>
#include <math.h>

int main(void) {

  int a, b, c;
  double disc, root1, root2;

  // Read in the coefficients for the quadratic.
  printf("Enter in a, b and c from your quadratic equation.\n");
  scanf("%d%d%d", &a, &b, &c);

  // Calculate the discriminant.
  disc = pow(b,2) - 4*a*c;

  // Take care of the complex number case.
  if (disc < 0)
    printf("Sorry your quadratic has complex roots.\n");

  // Go ahead and calculate both roots.
  else {
   
    root1 = (-b + sqrt(b*b-4*a*c))/(2*a);
    root2 = (-b - sqrt(disc))/(2*a);
    printf("The roots are %.2lf and %.2lf.\n", root1, root2);
  }

  return 0;
}
