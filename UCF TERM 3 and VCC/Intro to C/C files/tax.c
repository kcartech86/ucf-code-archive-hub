// Arup Guha
// edited 9/23/04 for COP 3223
// Solves the following problem: Based on the number of items the user 
// buys, the tax rate is either 10%, 8% or 6%. In particular, it's 10%
// if 10 or less items are bought, 8% if in between 11 and 20 items are
// bought, and 6% otherwise. The price of an item w/o tax is $10.00.

#include <stdio.h>

#define ITEM_PRICE 10.00

int main() {
  
  int num_items;
  double tax_rate, total;

  // Read in the number of items bought.
  printf("Enter the number of items bought.\n");
  scanf("%d", &num_items);

  // Set the tax rate based on the number of items bought.
  if (num_items <= 10)
    tax_rate = .1;
  else if (num_items <=20)
    tax_rate = .08;
  else
    tax_rate = .06;

  // Calculate and print out the total price with tax.
  total = num_items*ITEM_PRICE*(1+tax_rate);
  printf("The total price with tax is $%.2lf.\n",total);

  return 0;
}
