// Arup Guha
// 9/11/09
// Solution to Fall 2009 COP 3223 Program 1A: Football Tickets
// This program calculates the total cost of football tickets with tax.

#include <stdio.h>

// Constants given in the assignment.
#define LOWER_BOWL_TIX_PRICE 50.00
#define UPPER_BOWL_TIX_PRICE 25.00

int main() {
    
    int numTixLower, numTixUpper, numGames;
    double taxPerc;
    
    // Read in all the user input.
    printf("How many lower bowl seats do you want?\n");
    scanf("%d", &numTixLower);
    
    printf("How many upper bowl seats do you want?\n");
    scanf("%d", &numTixUpper);
    
    printf("For many games do you want to buy these tickets?\n");
    scanf("%d", &numGames);
    
    printf("What is the sales tax percentage in your locale?\n");
    scanf("%lf", &taxPerc);
    
    // First calculate the cost of all the tickets, without tax.
    // Note: The parentheses have the formula for the cost of one game.
    double totalCost = (numTixLower*LOWER_BOWL_TIX_PRICE +
                        numTixUpper*UPPER_BOWL_TIX_PRICE)*numGames;
                        
    // Make the adjustment in cost for tax, noting that the tax was entered
    // as a percentage.
    totalCost = totalCost*(1 + taxPerc/100);
    
    // Output the final cost to the user.
    printf("The total cost of your football tickets is $%.2lf.\n", totalCost);
    
    system("PAUSE");
    return 0;
}
