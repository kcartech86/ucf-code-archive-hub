// Arup Guha
// 9/23/04
// This is a second example of the matching-else problem. The user enters
// their hourly pay rate and number of hours a week they work and a
// message will be printed out based on this information.

#include <stdio.h>

int main() {
  
  double wage;
  int hours;

  // Read in the the worker's information.
  printf("Enter your hourly wage.\n");
  scanf("%lf", &wage);

  printf("Enter the number of hours you work a week.\n");
  scanf("%d", &hours);

  // This code is incorrect, we only want to print the second printf if
  // the wage is below 5.15, we may not want to print it if the hours are
  // less than 30.
  if (wage >= 5.15)
    if (hours >= 30)
      printf("You make over $150 a week.\n");
    else
      printf("You get below minimum wage.\n");

  /***** Corrected Code:

  if (wage >= 5.15) {
    if (hours >= 30)
      printf("You make over $150 a week.\n");
  }
  else
    printf("You get below minimum wage.\n");
 
  *****/

  return 0;
}
