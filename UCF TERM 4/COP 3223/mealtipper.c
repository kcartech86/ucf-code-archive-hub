#include <stdio.h>
#define TIP_RATE 0.15

int main()
{
    int start = 1;
    int end = 20;
    int meal_val = 1;
    int tip_percent;
    
    printf("What is your start value?\n");
    scanf("%d", &start);
    printf("What is your end value?\n");
    scanf("%d", &end);
    printf("What percernt tip do you want to leave?\n");
    scanf("%d", &tip_percent);
    
    while(meal_val <= 20) 
    {
         printf("Meal value =$%d \t Tip = $%.2lf\n", meal_val, meal_val*tip_percent/100);
         
         meal_val ++;
         
    }
    
    system("pause");
    return 0;
}
                   
    
    
