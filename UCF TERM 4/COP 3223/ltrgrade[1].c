// Arup Guha
// 9/7/05
// A small program to illustrate an if-else if statement.

#include <stdio.h>

int main() {

  int perc;
  char grade;

  // Read in the percentage grade.
  printf("Enter your percentage grade.\n");
  scanf("%d", &perc);

  // Determine the appropriate letter and set it.
  if (perc >= 90)
    grade = 'A';
  else if (perc >= 80)
    grade = 'B';
  else if (perc >= 70)
    grade = 'C';
  else if (perc >= 60)
    grade = 'D';
  else
    grade = 'F';

  // Note: What happens if we simply remove each occurence of else above?

  // Output this grade.
  printf("Your letter grade is %c.\n", grade);

  return 0;
}
