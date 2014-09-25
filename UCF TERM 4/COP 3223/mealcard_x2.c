//Kyle Cartechine
//COP 3223 Section 3
//Program 2
//Problem C: Best Deal

#include <stdio.h>

int main()
{
    int card_money, spare_money, item1, item2, item3;
    int combo1, combo2, combo3, combo4;
        
    printf("How much money remains on your meal card (in dollars)?\n");
    scanf("%d", &card_money);
    
    printf("What is the cost of the three items you want to buy?\n");
    scanf("%d%d%d", &item1, &item2, &item3);
    
    
    if ( (item1 && item2 && item3) <= card_money )
       {
         combo1 = item1 + item2 + item3;
         combo2 = item1 + item2;
         combo3 = item1 + item3;
         combo4 = item2 + item3;
        
         if (combo1 <= card_money)
            {
             spare_money = card_money - combo1;
             
             if (spare_money == 0)
                 printf("No funds will remain on your card.\n");
             else 
                  {
                   printf("The least amount you can have left on ");
                   printf("your card is $%d. \n", spare_money);
                   }
            }
                        
         else if(combo2 <= card_money)
            {
             spare_money = card_money - combo2;
             printf("The least amount you can have left on ");
             printf("your card is $%d. \n", spare_money);
            }
           
         else if(combo3 <= card_money)
            {
             spare_money = card_money - combo3;
             printf("The least amount you can have left on ");
             printf("your card is $%d. \n", spare_money);
             }
             
         else if(combo4 <= card_money)
            {
             spare_money = card_money - combo4;
             printf("The least amount you can have left on ");
             printf("your card is $%d. \n", spare_money);
            }                 
        }
        else if ( (item1 && item2 && item3) > card_money )
        printf("All funds will remain on your card! \n");
        
    system ("pause");
    return 0;
    
}
    
