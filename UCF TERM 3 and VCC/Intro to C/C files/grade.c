// Arup Guha
// 8/29/05
// Short program to illustrate the difference between integer and real
// arithmetic in C and how to do a real division with int variables.

#include <stdio.h>

int main(void) {

  int grade1 = 75;
  int grade2 = 80;

  // Calculate the average in 5 separate ways.
  int average1 = (grade1+grade2)/2;
  int average2 = grade1 + grade2/2;
  int average3 = grade2 + grade1/2;
  double average4 = (grade1+grade2)/2;
  double average5 = (double)(grade1+grade2)/2;
  double average6 = (grade1+grade2)/2.0;

  // Print out the result of each.
  printf("Ave #1 = %d\n", average1);
  printf("Ave #2 = %d\n", average2);
  printf("Ave #3 = %d\n", average3);
  printf("Ave #4 = %lf\n", average4);
  printf("Ave #5 = %lf\n", average5);
  printf("Ave #6 = %lf\n", average6);

  return 0;
}
