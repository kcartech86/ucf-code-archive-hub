//Kyle Cartechine
//COP 3223: Intro To C
//Assignment #2, Part C Biology Department
//DUE 10-6-2009

/* 
  A program that determines if a bacteria culture is growing or dying out
  based on user inputs
  ***Formula: f(n+1) = bf(n) - d
 */

#include <stdio.h>
#include <math.h>

int main()

{
    //Declare variables for bacteria formula
    double start_bact, dead_bact; 
   
    int numDays, bact_change, begin_bact, i;
    
    float growRate; 
    //A float is required because the rate may be inlude a decimal value
    
    //Prompt user for all inputs for formula
    printf("How many bacteria are there on day one?\n");
    
    scanf("%lf", &start_bact);
    
    start_bact == begin_bact;
    //Store starting bacteria for later comparison
    
    printf("What is their growth rate?\n");
    
    scanf("%f", &growRate);
    
    printf("How many bacteria die each day?\n");
   
   scanf("%lf", &dead_bact);
    
    printf("How many days will you grow the bacteria?\n");
    
    scanf("%d", &numDays);
    
    //Begin printing the chart based on user inputs
    printf("Day    Number of Bacteria\n");
    
    printf ("1      %.0lf\n", start_bact);
    
    //Utilize a loop to increment the amount of days 
    //the bacteria will be studied and print the
    // change in growth of bacteria.
    for (i = 2; i <= numDays; i++)
    {
       for (bact_change = 0; bact_change < numDays; bact_change)
           {
            bact_change = (growRate * start_bact) - dead_bact;
           }
                  
       printf("%d      %d\n", i, (int)bact_change);
       
       start_bact=bact_change;
       
    }
      
       if (bact_change < begin_bact)
       
            printf("The bacteria will eventually die out. \n"); 
       
       if (bact_change == begin_bact)
      
            printf("The bacteria will live in a steady state forever. \n");
             
       if (bact_change > begin_bact)
       
            printf("The bacteria will grow without bound. \n");      
       
       
       
            
       
       
           
                          
system("pause");

return 0;

}
