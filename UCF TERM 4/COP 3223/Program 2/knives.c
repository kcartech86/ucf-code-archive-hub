//Kyle Cartechine
//COP 3223 Section 3
//Program 2
//Problem B: Pay Calculator

//Program calculates a knife salesman's pay, based on how many knives they sell
//in a month. 

#include <stdio.h>

int main()
{
//declare all necessary variables, there are three possible 
//ways to be paid and the total amount of each way
    int knives, knives2, knives3, total_pay;
    
    printf("How many knives did you sell this month?\n");
    scanf("%d", &knives);
//if knives go up to 100: $5 per knife    
    if (knives <= 100)
       {
        total_pay = knives*5;
        printf("You made $%d selling knives this month.\n", total_pay);
        }
//if knives go up to 200: $5 per first hundred knives 
//which is $500 total and $10 per additional knives    
    else if ( (101 < knives) && (knives < 200) )
       {
        knives2 = (knives - 100)*10 ;
        total_pay = knives2 + 500;
        printf("You made $%d selling knives this month.\n", total_pay);
        }
//if knives go over 200: $5 per first hundred knives, $10 per knives 
//up to 200, which is $1500 total, and $15 per any knives over 200        
    else if (knives >= 200)
       {
        knives2 = (knives - 200)*15 ;
        total_pay = knives2 + 1500 ;
        printf("You made $%d selling knives this month.\n", total_pay);
        }
        
    system("pause");
    return 0;
}
