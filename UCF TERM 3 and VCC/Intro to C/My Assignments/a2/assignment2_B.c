//Kyle Cartechine
//COP 3223: Intro To C
//Assignment #2, Part B Dinner Schedule
//DUE 10-6-2009

//This program will provide the user with which days they will eat meals
// at either Lazy Moon or Subway, based on the day they input.

/*
  Rules for budget:
  1) On all even days, you eat at Subway.
  2) On all odd days that are also divisible by 5 
     but NOT 25 (5, 15, 35, 45, 55, 65, 85, etc.) you also eat at Subway.
  3) On all other days, you eat at Lazy Moon.
*/

#include <stdio.h>

int main()

{
    int day;
    
    //Ask for user input and store to a variable
   
    printf("Which day's dinner schedule do you want?\n");   
    
    scanf("%d", &day);
    
    if (day%2 == 0)
    //If you eat Subway on all even days and the number entered is even 
    //it will be divisible by two or mod(%)2 with no remainder
          printf ("On day %d, you will eat at Subway.\n", day);
    
          else if (day%2 == 1)
          //If the number entered is odd --
         {
             if (day%5 == 0 && day%25 != 0)             
             //and divisible by five but not 
             //25 then you will still eat at Subway
             
             printf ("On day %d, you will eat at Subway.\n", day);
          
             else    
             printf ("On day %d, you will eat at Lazy Moon.\n", day);
          
         }
            
   system ("PAUSE"); 
}
