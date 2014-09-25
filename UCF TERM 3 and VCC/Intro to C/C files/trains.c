// Arup Guha
// 8/31/06
// Starting Spring 06 COP 3223 Program 1 Solution as a class
// example.

#include <stdio.h>

#define MINUTES_PER_HOUR 60

int main() {
    
    
    double distance, vel1, vel2;
    double min_to_meet;
    
    // Read in the input data.
    printf("Enter the distance separating the trains.\n");
    scanf("%lf", &distance);
    
    printf("What is the speed of train 1?\n");
    scanf("%lf", &vel1);
    
    printf("What is the speed of train 2?\n");
    scanf("%lf", &vel2);
    
    // The time to meet can be calculated by dividing the total
    // distance by the effective speed of the two trains together.
    // Since the output is to be in minutes, a multaplicative
    // factor must be attached.
    min_to_meet = distance / ( vel1 + vel2 ) * MINUTES_PER_HOUR;
    
    // Print out the result.
    printf("It will take %.3lf minutes to meet.\n", min_to_meet);

    // Print out distances both trains travel.
    // Note: Distance = rate*time, and we had to convert time to hours.
    printf("The first train will travel %.2lf miles.\n", vel1 * min_to_meet / 60);
    printf("The second train will travel %.2lf miles.\n", vel2 * min_to_meet / 60);
  
    system("PAUSE");
    return 0;
}   
