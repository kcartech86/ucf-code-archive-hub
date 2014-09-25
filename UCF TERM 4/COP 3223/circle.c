// Arup Guha
// 1/15/04
// Example Program for COP 3223 with a plan.
// The program computes the cost of a circular plot of land, given the
// radius of the plot and the cost of the land per square unit.
#include <stdio.h>

#define PI 3.14159

int main() {

  float radius, area;
  float cost, totalcost;

  // Prompt the user to enter the radius.
  printf("Please enter the radius and cost of your circle.\n");

  // Read the radius in.
  scanf("%f%f", &radius, &cost);

  // Calculate the area of the circle.
  area = PI*radius*radius;
  totalcost = cost*area;

  // Print out the total cost of the circle.
  printf("The circle will cost $%.2f.\n", totalcost);

  return 0;
}
