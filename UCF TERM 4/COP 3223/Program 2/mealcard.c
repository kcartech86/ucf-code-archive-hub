//Kyle Cartechine
//COP 3223 Section 3
//Program 2
//Problem C: Best Deal

/*Program calculates the least amount a person will have left on their mealcard 
  by determining out of three item prices the person enters, which combination 
  of items is most beneficial in leaving the least amount on their card.   */
  
#include <stdio.h>

int main()
{
    int card_money, spare_money, item1, item2, item3;
    int combo, combo1, combo2, combo3, temp, temp2;
        
    printf("How much money remains on your meal card (in dollars)?\n");
    scanf("%d", &card_money);
    
    printf("What is the cost of the three items you want to buy?\n");
    scanf("%d%d%d", &item1, &item2, &item3);
    
/*Based on problem c's example, the assumption is that the three items
  you want to buy will each have a unique price, or rather, no
  one item's price will be equivalent to another item's price.   */
    
    /*if statement for when input is least to greatest: 1, 2, 3     */
    if( (item1<item2)&&(item2<item3) )
    {
     combo = item1+item2+item3;
     if( (combo)<= (card_money) )
     {
      spare_money = card_money - combo;
      printf("The least amount you can have left on ");
      printf("your card is $%d. \n", spare_money);
     }
     else
     {
      combo1 = item1+item2;
      combo2 = item1+item3;
      combo3 = item2+item3;
/*---------One combo<card_money & the other two >card_money-------------------*/
      if ( (combo1<card_money)&&(combo2>card_money)&&(combo3>card_money) )
      {
       spare_money = card_money - combo1;
       printf("The least amount you can have left on ");
       printf("your card is $%d. \n", spare_money);
      }
/*---------One combo>card_money & the other two <card_money-------------------*/
      else if( (combo3>card_money)&&(card_money>combo2)&&(combo2>combo1) )
      {
       spare_money = card_money - combo2;
       printf("The least amount you can have left on ");
       printf("your card is $%d. \n", spare_money);
      }
/*----------------------All the combos < card_money---------------------------*/
      else if( (card_money>combo3)&&(combo3>combo2)&&(combo2>combo1) )
      {
       spare_money = card_money - combo3;
       printf("The least amount you can have left on ");
       printf("your card is $%d. \n", spare_money);
      } 
            
     }
       
    }
/*if statement for when input is greatest to least: 3, 2, 1   */    
    if( (item1>item2)&&(item2>item3) )
    {
      /*reorder inputs least to greatest   */
      temp = item1;
      item1 = item3;
      item3 = temp;
      combo1 = item1+item2;
      combo2 = item1+item3;
      combo3 = item2+item3;
/*---------One combo<card_money & the other two >card_money-------------------*/
      if ( (combo1<card_money)&&(combo2>card_money)&&(combo3>card_money) )
      {
       spare_money = card_money - combo1;
       printf("The least amount you can have left on ");
       printf("your card is $%d. \n", spare_money);
      }
/*---------One combo>card_money & the other two <card_money-------------------*/
      else if( (combo3>card_money)&&(card_money>combo2)&&(combo2>combo1) )
      {
       spare_money = card_money - combo2;
       printf("The least amount you can have left on ");
       printf("your card is $%d. \n", spare_money);
      }
/*----------------------All the combos < card_money---------------------------*/
      else if( (card_money>combo3)&&(combo3>combo2)&&(combo2>combo1) )
      {
       spare_money = card_money - combo3;
       printf("The least amount you can have left on ");
       printf("your card is $%d. \n", spare_money);
      }
    }
    
/*if statement for when inputs are mixed:  2, 1, 3   */  
    if( (item3>item1)&&(item1>item2) )
    {
      /*reorder inputs least to greatest   */
      temp = item2;
      item2 = item1;
      item1 = temp;
      combo1 = item1+item2;
      combo2 = item1+item3;
      combo3 = item2+item3;
/*---------One combo<card_money & the other two >card_money-------------------*/
      if ( (combo1<card_money)&&(combo2>card_money)&&(combo3>card_money) )
      {
       spare_money = card_money - combo1;
       printf("The least amount you can have left on ");
       printf("your card is $%d. \n", spare_money);
      }
/*---------One combo>card_money & the other two <card_money-------------------*/
      else if( (combo3>card_money)&&(card_money>combo2)&&(combo2>combo1) )
      {
       spare_money = card_money - combo2;
       printf("The least amount you can have left on ");
       printf("your card is $%d. \n", spare_money);
      }
/*----------------------All the combos < card_money---------------------------*/
      else if( (card_money>combo3)&&(combo3>combo2)&&(combo2>combo1) )
      {
       spare_money = card_money - combo3;
       printf("The least amount you can have left on ");
       printf("your card is $%d. \n", spare_money);
      }
    }
    
/*if statement for when inputs are mixed: 2, 3, 1   */    
    if( (item2>item1)&&(item1>item3) )
    {
      /*reorder inputs least to greatest   */
      temp = item3;
      temp2 = item2;
      item3 = temp2;
      item2 = item1;
      item1 = temp;
      combo1 = item1+item2;
      combo2 = item1+item3;
      combo3 = item2+item3;
/*---------One combo<card_money & the other two >card_money-------------------*/
      if ( (combo1<card_money)&&(combo2>card_money)&&(combo3>card_money) )
      {
       spare_money = card_money - combo1;
       printf("The least amount you can have left on ");
       printf("your card is $%d. \n", spare_money);
      }
/*---------One combo>card_money & the other two <card_money-------------------*/
      else if( (combo3>card_money)&&(card_money>combo2)&&(combo2>combo1) )
      {
       spare_money = card_money - combo2;
       printf("The least amount you can have left on ");
       printf("your card is $%d. \n", spare_money);
      }
/*----------------------All the combos < card_money---------------------------*/
      else if( (card_money>combo3)&&(combo3>combo2)&&(combo2>combo1) )
      {
       spare_money = card_money - combo3;
       printf("The least amount you can have left on ");
       printf("your card is $%d. \n", spare_money);
      }
    } 
    
/*if statement for when inputs are mixed: 1, 3, 2   */   
    if( (item2>item3)&&(item3>item1) )
    {
      /*reorder inputs least to greatest   */
      temp = item3;
      item3 = item2;
      item2 = temp;
      combo1 = item1+item2;
      combo2 = item1+item3;
      combo3 = item2+item3;
/*---------One combo<card_money & the other two >card_money-------------------*/
      if ( (combo1<card_money)&&(combo2>card_money)&&(combo3>card_money) )
      {
       spare_money = card_money - combo1;
       printf("The least amount you can have left on ");
       printf("your card is $%d. \n", spare_money);
      }
/*---------One combo>card_money & the other two <card_money-------------------*/
      else if( (combo3>card_money)&&(card_money>combo2)&&(combo2>combo1) )
      {
       spare_money = card_money - combo2;
       printf("The least amount you can have left on ");
       printf("your card is $%d. \n", spare_money);
      }
/*----------------------All the combos < card_money---------------------------*/
      else if( (card_money>combo3)&&(combo3>combo2)&&(combo2>combo1) )
      {
       spare_money = card_money - combo3;
       printf("The least amount you can have left on ");
       printf("your card is $%d. \n", spare_money);
      }
    } 
    
/*if statement for when inputs are mixed: 3, 1, 2   */    
    if( (item1>item3)&&(item3>item2) )
    {
      /*reorder inputs least to greatest   */
      temp = item1;
      temp2 = item2;
      item1 = item2;
      item2 = item3;
      item3 = temp;
      combo1 = item1+item2;
      combo2 = item1+item3;
      combo3 = item2+item3;
/*---------One combo<card_money & the other two >card_money-------------------*/
      if ( (combo1<card_money)&&(combo2>card_money)&&(combo3>card_money) )
      {
       spare_money = card_money - combo1;
       printf("The least amount you can have left on ");
       printf("your card is $%d. \n", spare_money);
      }
/*---------One combo>card_money & the other two <card_money-------------------*/
      else if( (combo3>card_money)&&(card_money>combo2)&&(combo2>combo1) )
      {
       spare_money = card_money - combo2;
       printf("The least amount you can have left on ");
       printf("your card is $%d. \n", spare_money);
      }
/*----------------------All the combos < card_money---------------------------*/
      else if( (card_money>combo3)&&(combo3>combo2)&&(combo2>combo1) )
      {
       spare_money = card_money - combo3;
       printf("The least amount you can have left on ");
       printf("your card is $%d. \n", spare_money);
      }
    }
    
    system ("pause");
    return 0;
    
}
