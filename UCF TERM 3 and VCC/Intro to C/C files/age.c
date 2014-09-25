// Arup Guha
// 9/23/04
// Example to illustrate an if statement with a compound boolean 
// condition. The program asks the user for their birthdate and determines
// the user's age.

#include <stdio.h>

#define CUR_YEAR 	2004
#define CUR_MONTH 	9
#define CUR_DAY 	23

int main() {

  int age, month, day, year;
  char ans, dummy;

  // Get user's information.
  printf("Enter your birthdate; month, day and year.\n");
  scanf("%d%d%d", &month, &day, &year);

  // Default guess for the age. It's correct if the user's birthday has
  // already happened in the current year.
  age = CUR_YEAR - year;

  // Check for the case that the user's birthday hasn't happened this year,
  // and edit age accordingly.
  if (month > CUR_MONTH)
    age--;
  else if ((month == CUR_MONTH) && (day > CUR_DAY))
    age--;

  // Display the user's age.
  printf("You are %d years old, currently.\n", age);

  return 0;
}
