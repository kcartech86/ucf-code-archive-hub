// Arup Guha
// 1/25/06
// Short program that gives the user the choice to convert from Fahrenheit
// to Celsius or vice versa and then carries out the conversion.

#include <stdio.h>

int main() {

  double fahr, cel;
  int choice;

  // Print out the choices for the user and read in their selection.
  printf("Which of the following conversions would you like to make?\n");
  printf("1. Fahrenheit to Celsius.\n");
  printf("2. Celsius to Fahrenheit.\n");
  scanf("%d", &choice);

  // Execute Fahrenheit to Celsius.
  if (choice == 1) {

    // Read in the temperature in Fahrenheit.
    printf("Please enter the temperature in Fahrenheit.\n");
    scanf("%lf", &fahr);

    // Calculate and output the result in Celsius.
    cel = (fahr-32)*5/9;
    printf("%.2lf Fahrenheit = %.2lf Celsius.\n", fahr, cel);
  }

  // Execute Celsius to Fahrenheit.
  else {

    // Read in the temperature in Celsius.
    printf("Please enter the temperature in Celsius.\n");
    scanf("%lf", &cel);

    // Calculate and output the result in Fahrenheit.
    fahr = 1.8*cel + 32;
    printf("%.2lf Celsius = %.2lf Fahrenheit.\n", cel, fahr);
  }

  return 0;
}
