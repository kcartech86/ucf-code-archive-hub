//Kyle Cartechine
//COP 3223 Section 3
//Program 3
//Problem A: Inheritance

/* This program calculates the amount of inheritance you will have left 
each year based on how much interest it gains within an account and how 
much you spend each year.*/

#include <stdio.h>

int main()
{
    int inheritance, yrly_spending, interest, year = 0;
    double real_interest, payment, money_left, money_left_alt;
        
    //Ask for inheritance
    printf("How much did you inherit, in dollars? \n");
    scanf("%d", &inheritance);
    
    //Error check to make sure input is between 10000 and 1000000
    while ( (inheritance<10000) || (inheritance>1000000) )
    {
          printf("Invalid. Please enter an amount between 10000 and 1000000.\n");
          scanf("%d", &inheritance);
    }
    money_left = (double) inheritance ;
    
    //Ask for the amount that will be spent each year
    printf("How much on average will you spend each year, in dollars? \n");
    scanf("%d", &yrly_spending);
    
    //Error check to make sure input is between 1000 and Inheritance
    while( (yrly_spending<1000 || yrly_spending> inheritance) )
    {
          printf("Invalid. Please enter an amount higher than 1000 and less than %d  \n", inheritance);
          scanf("%d", &yrly_spending);
    }
    payment = (double) yrly_spending ;
    
    //Ask for the interest rate
    printf("What is the interest rate of the inheritance account? \n");
    scanf("%d", &interest);
    
    //Error check to make sure interest is between 1 and 10
    while( (interest < 1) || (interest > 10) )
    {
           printf("Invalid. Please enter a percent between 1 and 10. \n");
           scanf("%d", &interest);
    }
    real_interest =  (double) interest / 100 ;
    
    //Print the beginning of the Inheritance chart
    printf("\nYear\tPayment  \tMoney Left \n");
    printf("----\t-------  \t---------- \n");  
     
    if (payment < money_left)
    {
          while (money_left > 0)
          {
                money_left = money_left + (money_left*real_interest) - payment;
                money_left_alt = money_left;
                year ++;
                if (money_left_alt < 0)
                {
                     payment = money_left_alt + payment;
                     money_left = 0.00;
                     
                }
                
                printf("%d\t%.2lf  \t%6.2lf \n", year, payment, money_left);
          }
          
    }
    
    system("PAUSE");
    return 0;
    
}
