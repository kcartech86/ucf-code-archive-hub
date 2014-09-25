#include <stdio.h>

int main()
{
    double total= 0, donation;
    int choice;
    
    printf("Does anyone have a donation to make (y=1, n=0)?\n");
    scanf("%d", &choice);
    
    while (choice == 1)
    {
          printf("Great! How much do you want to give?\n");
          scanf("%lf", &donation);
          
          total =total + donation;
          
          printf("Does anyone have a donation to make (y=1, n=0)?\n");
          scanf("%d", &choice);
    }
    
    printf("We have collected $%1.2lf for beer!\n", total);
    
    system ("pause");
    return 0;
    
}
    
          
          
