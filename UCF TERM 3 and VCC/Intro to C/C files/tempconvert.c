// Arup Guha
// 1/25/06
// Short program that converts a temperature in Fahrenheit entered by the
// user into Celsius.

#include <stdio.h>

int main() {

  double fahr, cel;

  // Read in the temperature in Fahrenheit.
  printf("Please enter the temperature in Fahrenheit.\n");
  scanf("%lf", &fahr);

  // Make the conversion and print the result.
  cel = (fahr-32)*5/9;
  printf("%.2lf Fahrenheit = %.2lf Celsius.\n", fahr, cel);

  return 0;
}
