//Kyle Cartechine
// 8-29-2009
// My 3rd Program
// Arithmatic Calculations

#include <stdio.h>

#define YARDS_IN_MILE	1760
#define FEET_IN_YARD	3

int main(void) {

  int feet_in_mile, num_miles;
  feet_in_mile = YARDS_IN_MILE*FEET_IN_YARD;
  printf("How many miles did you run?\n");
  scanf("%d", &num_miles);
  printf("You ran %d feet.\n", feet_in_mile*num_miles);

system("PAUSE");

  return 0;
}
