// Arup Guha
// 3/30/04
// Short program to show the use of the strcat function. Notice how the
// function does not completely allocate new memory for the concatenated
// string, it simply adds on to the storage of the first string, which
// must be declared big enough to handle the larger concatenated string.

#include <stdio.h>

int main() {

  char first[30], last[30];
  char *wholename;

  // Read in the first and last name of the user.
  printf("Enter your first name.\n");
  scanf("%s", first);
  printf("Enter your last name.\n");
  scanf("%s", last);

  // Concatenate these and store the answer into wholename.
  wholename = (char *)strcat(first, last);

  // Print out the results.
  printf("first is now %s.\n", first);
  printf("last is now %s.\n", last);
  printf("wholename is now %s.\n", wholename);

  // Make a single change to wholename.
  wholename[0] = 'X';

  printf("\nHere are the changes made:\n");
  printf("first is now %s.\n", first);
  printf("last is now %s.\n", last);
  printf("wholename is now %s.\n", wholename);

  system ("PAUSE");
  return 0;
}
