// Arup Guha
// 9/11/09
// Solution to Fall 2009 COP 3223 Program 1C: Meal Plan
// Based on the user's budget, this program calculates the most number of times
// the user can eat at Lazy Moon.

int main() {
    
    int subCost, pizzaCost, numMeals, money; 
    
    // Get all of the user input.
    printf("How much do you spend on a meal at Subway?\n");
    scanf("%d", &subCost);
    
    printf("How much do you spend on a meal at Lazy Moon?\n");
    scanf("%d", &pizzaCost);
    
    printf("How many meals will you eat this semester?\n");
    scanf("%d", &numMeals);
    
    printf("How much money did your parents put on your meal card?\n");
    scanf("%d", &money);
    
    // Calculate how much extra money you'd have left over if you ate every
    // meal at Subway. Based on the specifications, this is guaranteed to be
    // non-negative.
    int extraMoney = money - subCost*numMeals;
    
    // Calculate the amount of extra money needed to have one meal at Lazy
    // Moon (instead of Subway).
    int extraMoneyPerMeal = pizzaCost - subCost;
    
    // The number of meals we can have at Lazy Moon is simply based on how
    // much extra money we have. Just divide this by the amount each Lazy
    // Moon meal costs (extra). The integer division naturally takes care
    // of the situation that we want the maximum number of Lazy Moon meals.
    int numLazyMoonMeals = extraMoney/extraMoneyPerMeal;
    
    // This logic is straight-forward, since all meals are eaten at one of the
    // two places.
    int numSubwayMeals = numMeals - numLazyMoonMeals;
    
    // Formula for amount spent. Very similar to the football problem #1A.
    int totalCost = subCost*numSubwayMeals + pizzaCost*numLazyMoonMeals;
    
    // Now we are ready to calculate the leftover money!
    int leftoverMoney = money - totalCost;
    
    // Output the results for the user.
    printf("You will eat %d meals at Subway and %d meals at Lazy Moon.\n",
                                            numSubwayMeals, numLazyMoonMeals);
    printf("You will have $%d left on your card.\n", leftoverMoney);
    
    system("PAUSE");
    return 0;
}
    
