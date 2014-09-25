//Kyle Cartechine
//COP 3223: Intro To C
//Assignment #1, Part B
//9-5-2009
//Program determines the maximum amount of meals
//you can eat at your two favorite restaurants

#include <stdio.h>
#include <math.h>

int main ()

{
    int subway_cst, lazymoon_cst, meal_amt, card_money;
//Gather all user inputs
printf ("How much do you spend on a meal at Subway?\n");
scanf  ("%d", &subway_cst);

printf ("How much do you spend on a meal at Lazy Moon?\n");
scanf ("%d", &lazymoon_cst);

printf ("How many meals will you eat this semester?\n");
scanf ("%d", &meal_amt);

printf ("How much money did your parents put on your meal card?\n");
scanf ("%d", &card_money);

int sub_meals, moon_meals, add_meal, money_left;
//Calculate the amount of both meal choices the user can 
//purchase with money provided

sub_meals = (card_money-(lazymoon_cst*meal_amt))/(subway_cst-lazymoon_cst);

moon_meals = (card_money-(subway_cst*sub_meals))/(lazymoon_cst);

money_left = card_money - ((moon_meals*lazymoon_cst)+(sub_meals*subway_cst));

//Calculate the number of upgrades to a more expensive meal if possible
if (subway_cst<money_left<lazymoon_cst)
{  add_meal= money_left/subway_cst;
   money_left-= subway_cst;
   sub_meals+= add_meal;
}
else if (money_left>=lazymoon_cst)
{    add_meal= money_left/lazymoon_cst;
     money_left-= lazymoon_cst;
     moon_meals=+ add_meal;
}

printf ("You will eat %d meals at Subway and %d meals at Lazy Moon.\n",
        sub_meals, moon_meals); 
        
if (money_left > 0) 
      printf ("You will have $%d left on your card.\n", money_left);
      else   
      printf ("You will have no balance on your card.\n\n\n");
      
system ("PAUSE");

return 0;

}
