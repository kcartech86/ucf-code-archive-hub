//Kyle Cartechine
//COP 3223 Section 3
//Program 1
//Problem A: Fuel Economy (mpg.c)

//This program is meant to calculate fuel economy on a vehicle
//based on user inputs of time traveled, speed, and gas used.

#include <stdio.h>

int main ()

{
    int min_traveled;
    double speed, gas_used, mpg;
    
    //Prompt for user input data
    
    printf ("In minutes, what length of time did you travel? \n");
    scanf ("%d", &min_traveled);
    
    printf ("What was your average speed during travel? \n");
    scanf ("%lf", &speed);
    
    printf ("How many gallons of gas were used during travel? \n");
    scanf ("%lf", &gas_used);
    
    //Because time is in minutes mph must be converted to mpm (miles per min.)
    //Speed must be divided by sixty within equation to get mpm
    
    mpg = ((speed*min_traveled)/60)/gas_used;
     
    printf ("Your vehicle averaged %1.2lf miles per gallon. \n", mpg);
    
    system ("PAUSE");
    return 0;
    
}
    
