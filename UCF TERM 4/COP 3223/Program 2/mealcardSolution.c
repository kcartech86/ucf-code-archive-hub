// Arup Guha
// 2/2/2010
// Solution to Spring 2010 COP 3223 Program #2C: Best Deal

#include <stdio.h>

int main() {

    int money_left, priceA, priceB, priceC;
    
    // Get all of the user input.
    printf("How much money is left on your meal card (in dollars)?\n");
    scanf("%d", &money_left);
    
    printf("What is the cost in dollars of the three items you may buy?\n");
    scanf("%d%d%d", &priceA, &priceB, &priceC);
    
    // This variable will store the most value we can purchase without
    // going over on our card limit.
    int best = 0;
    
    /* The following statements are going to be very repetitive. There are
       seven options that might be better than buying nothing:
       A, B, C, A+B, A+C, B+C, or A+B+C.
       We check for each of these options, if it's better than best, but also
       not over our spending limit. If it is, we update best. By the end, best
       will have the most we can spend without going over stored.
       
       Note: We must have separate if statements to allow best to update
       multiple times.
    */
    if (priceA > best && priceA <= money_left)
        best = priceA;
    if (priceB > best && priceB <= money_left)
        best = priceB;
    if (priceC > best && priceC <= money_left)
        best = priceC;
    if (priceA+priceB > best && priceA+priceB <= money_left)
        best = priceA+priceB;
    if (priceA+priceC > best && priceA+priceC <= money_left)
        best = priceA+priceC;
    if (priceB+priceC > best && priceB+priceC <= money_left)
        best = priceB+priceC;
    if (priceA+priceB+priceC > best && priceA+priceB+priceC <= money_left)
        best = priceA+priceB+priceC;
        
    // Now that we know the best, we subtract this from our limit to 
    // calculate the least we could have left.
    printf("The least amount of money you can leave on your card is $%d.\n", money_left-best);
    
    system("PAUSE");
    return 0;
}
    
