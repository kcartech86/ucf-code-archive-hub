//Kyle Cartechine
//COP 3223 Section 3
//Program 1
//Problem B: Distance Traveled (distance.c)

//This program calculates distance a car travels based on user inputs of
//tire radius and tire revolutions in one trip.

#include <stdio.h>
#define PI 3.14159

int main ()

{
     double tire_radius, circumf, miles_traveled;
     int tire_revs;
     
     printf("What is the radius of your vehicle's tire, in inches? \n");
     scanf ("%lf", &tire_radius);
     
     //Circumference formula: C = 2*pi*radius
     
     circumf = 2*PI*tire_radius;
     
     printf ("How many revolutions did your vehicle tire make? \n");
     scanf ("%d", &tire_revs);
     
     //There are 5280 feet in a mile * 12 = 63360 inches in a mile
     //Divide by 63360 to convert to miles
     
     miles_traveled = (circumf*tire_revs)/63360;
     
     printf ("Your vehicle traveled %1.2lf miles. \n", miles_traveled);
     
     system("PAUSE");
     return 0;
     
}
