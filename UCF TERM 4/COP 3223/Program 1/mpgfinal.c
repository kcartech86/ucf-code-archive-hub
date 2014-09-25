//Kyle Cartechine
//COP 3223 Section 3
//Program 1
//Problem C: Revised Fuel Econonmy (mpgfinal.c)

//This program calculates miles per gallon based on user inputs of
//tire radius, tire revolutions, and gas used in one trip.

#include <stdio.h>
#define PI 3.14159

int main ()

{
     double tire_radius, circumf, gas_used, mpg, miles_traveled;
     int tire_revs;
     
     printf("What is the radius of your vehicle's tire, in inches? \n");
     scanf ("%lf", &tire_radius);
     
     //Circumference formula: C = 2*pi*radius --answer is unit inches
     
     circumf = 2*PI*tire_radius;
     
     printf ("How many revolutions did your vehicle tire make? \n");
     scanf ("%d", &tire_revs);
     
     //There are 5280 feet in a mile * 12 = 63360 inches in a mile
     //Divide by 63360 to convert to miles
     
     miles_traveled = (circumf*tire_revs)/63360;
     
     printf ("How many gallons of gas gas were used during travel? \n");
     scanf ("%lf", &gas_used);
     
     //Simply divided miles traveled by gas used to get mpg
     
     mpg = miles_traveled/gas_used;
     
     printf ("Your vehicle averaged %1.2lf miles per gallon. \n", mpg);
    
     system ("PAUSE");
     return 0;
    
}
 
