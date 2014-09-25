// Arup Guha
// 1/18/06
// A short example to illustrate the use of parentheses to force order of
// operations.

#include <stdio.h>

int main() {

  double taxrate = .065;
  double itemvalue = 10;

  // Correct calculation.
  printf("The total cost is $%.2lf.\n", itemvalue*(1+taxrate));

  // Incorrect calculation.
  printf("The incorrect total cost is $%.2lf.\n", itemvalue*1+taxrate);
  system("PAUSE");

  return 0;
}
