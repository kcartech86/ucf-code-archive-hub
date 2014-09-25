// Arup Guha
// Originally written 9/8/03
// Program Description: This program asks the user for the constants A,
// B, and C in the equation Ax+By = C for a line. Based on this 
// information, the program will output if the slope is positive, 
// negative, zero or undefined (as is the case with a vertical line.)

int main(void) {

  double a, b, c;

  // Read in the input points.
  printf("Enter in a, b and c.\n");
  scanf("%lf%lf%lf", &a, &b, &c);

  if ((a == 0) && (b == 0))
    printf("Invalid equation.\n");
  else {

    // Handle each case (vertical, horizontal, positive slope and
    // negative slope) separately.
    if (b == 0)
      printf("Vertical line.\n");
    else if (a == 0)
      printf("Slope = 0.\n");
    else if (-a/b > 0)
      printf("Slope is positive.\n");
    else
      printf("Slope is negative.\n");
  }

}
