// Arup Guha
// 3/30/04
// An example that finds the first name alphabetically in a list of names.
// This is used to illustrate the use of the string functions strcpy and
// strcmp.

#include <stdio.h>

int main() {

  char curname[30], firstname[30];
  int numstuds, i;

  // Get the number of names.
  printf("How many students are there?\n");
  scanf("%d", &numstuds);
  printf("Enter the last names of each student, one per line.\n");

  // Loop through each student entered.
  for (i=0; i<numstuds; i++) {
  
    scanf("%s", curname);

    // Update the first name seen.
    if (i == 0)
      strcpy(firstname, curname);

    // Update if we find a new first name.
    else if (strcmp(curname, firstname) < 0)
      strcpy(firstname, curname);
  }

  printf("The first person in line is %s.\n", firstname);

  system ("pause");
  return 0;

}
