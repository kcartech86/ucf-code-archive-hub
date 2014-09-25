// Arup Guha
// 8/29/05
// Program shown in lecture 8/30 or 9/1.

#include <stdio.h>

// Constants.
const int YARDS_IN_MILE  = 1760;

#define FEET_IN_YARD 3

int main() {


  // Declare and initialize variables.
  int feet_in_mile, num_miles;

  // Calculate the number of feet in a mile.
  feet_in_mile = YARDS_IN_MILE*FEET_IN_YARD;

  // Prompt and read in the number of miles run on the current day.
  printf("How many miles did you run?\n");
  scanf("%d", &num_miles);

  // Print out the final answer.
  printf("You ran a total of %d feet.\n", feet_in_mile*num_miles);

  return 0;
}
