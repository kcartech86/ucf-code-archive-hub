// Arup Guha
// 9/23/04
// Based on the date you turned in your taxes, this program tells you 
// whether you turned them in late or not. This is an example to 
// illustrate the nearest else matching problem.

#include <stdio.h>

int main() {
  
  int month, day;

  // Read in the number of items bought.
  printf("Enter the month and day you submitted your taxes.\n");
  scanf("%d%d", &month, &day);

  // Month is too late.
  if (month > 4)
      printf("Your taxes are late!\n");

  // This code works correctly and only prints something out if the month
  // is April. This is because of how the matching else problem is 
  // resolved.
  if (month == 4)
    if (day > 15)
      printf("Your taxes are late!\n");
    else
      printf("Your taxes were on time.\n");

  // Early!
  if (month < 4)
    printf("Your taxes were on time.\n");

  return 0;
}
