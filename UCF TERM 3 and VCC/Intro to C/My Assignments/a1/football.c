//Kyle Cartechine
//COP 3223: Intro To C
//Assignment #1, Part A
//9-5-2009
// Program calculates the total cost of some UCF football tickets

#include <stdio.h>

#define LOWER_BOWL_TIX_PRICE 50.00
#define UPPER_BOWL_TIX_PRICE 25.00

int main()
{
//define variables for calculation
int lowbowl_amt, uprbowl_amt, game_amt, total_notax;
float local_tx, total_cst;
//line 13 - 39 prompt user for input values and 
//store those values for calculation of total cost 
      printf ("Welcome to the ticket cost "); 
      printf ("calculator for UCF ball games.\n\n\n");
      
      printf ("How many lower bowl tickets do you plan to ");
      printf ("purchase? (enter up to 100)\n");
      
      scanf ("%d", &lowbowl_amt);
      
      printf ("How many upper bowl tickets do you plan to ");
      printf ("purchase? (enter up to 100)\n");
      
      scanf ("%d", &uprbowl_amt); 
      
      printf ("How many games do you plan to purchase ");
      printf ("tickets for? (enter up to 7)\n");
      
      scanf ("%d", &game_amt);
      
      printf ("What is the sales tax percentage in your ");
      printf ("area? (up to 20 percent)\n");
      
      scanf ("%f", &local_tx);       
      
//Calculate the total cost of tickets
      total_notax = ((lowbowl_amt*LOWER_BOWL_TIX_PRICE)+
                   (uprbowl_amt*UPPER_BOWL_TIX_PRICE))*game_amt;

//    printf ("%d \n\n\n", total_notax);             
                   
      total_cst = total_notax*((local_tx/100)+1);
      
//Ouput the users total cost

      printf ("The total cost of your football tickets is: %1.2f\n", 
                   total_cst);
          
      system ("PAUSE");
      
      return 0;
      
}     

