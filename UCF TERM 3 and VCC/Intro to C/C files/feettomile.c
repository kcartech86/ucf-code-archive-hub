/* Arup Guha
   My Second C Program
   8/25/05
   Computes the number of feet in a mile. */

#include <stdio.h>

int main(void) {

  // Declare variables.
  int feet_in_mile, yards_in_mile;
  int feet_in_yard;

  // Initialize known values.
  yards_in_mile = 1760;
  feet_in_yard = 3;

  // Calculate the number of feet in a mile.
  feet_in_mile = yards_in_mile*feet_in_yard;

  // Output the result.
  printf("Yrds in Ml=%d\n\n\nfeet in MI=%d.\n", yards_in_mile, feet_in_mile);
  printf("Goodbye!");
  return 0;
}
