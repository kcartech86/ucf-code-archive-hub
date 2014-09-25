//Kyle Cartechine
//COP 3223 Section 3
//Program 3
//Problem A: Inheritance

/* This program calculates the amount of inheritance you will have left 
each year based on how much interest it gains within an account and how 
much you spend each year.*/

#include <stdio.h>

int main(){
    int inheritance, yrly_spending, interest, year = 0;
    double real_interest, payment, money_left, money_left_alt;
        
    //Ask for inheritance, between 10000 and 1000000
    printf("How much did you inherit, in dollars? \n");
    scanf("%d", &inheritance);
    money_left = (double) inheritance ;
    
    //Ask for yearly spending, between 1000 and inheritance
    printf("How much on average will you spend each year, in dollars? \n");
    scanf("%d", &yrly_spending);
    payment = (double) yrly_spending ;
    
    //Ask for the interest rate, between 1 and 10
    printf("What is the interest rate of the inheritance account? \n");
    scanf("%d", &interest);
    real_interest =  (double) interest / 100 ;
    
    //Print the beginning of the Inheritance chart
    printf("\nYear\tPayment  \tMoney Left \n");
    printf("----\t-------  \t---------- \n");  
    
    /*While the payment can be subtracted each year loop through calculation 
      for money_left */
    if (payment < money_left){
          while (money_left > 0){
                money_left = money_left + (money_left*real_interest) - payment;
                money_left_alt = money_left;
                year ++;
    /*If the money left becomes negative it means you can no longer subtract a
    payment from the inheritance. Money left from the previous year plus 
    interest becomes the final payment, and money_left = 0 */            
                if (money_left_alt < 0){
                     payment = money_left_alt + payment;
                     money_left = 0.00;
                }
     //Print the results            
                printf("%d\t%.2lf  \t%6.2lf \n", year, payment, money_left);
          }
    }
    
    system("PAUSE");
    return 0;
    
}
