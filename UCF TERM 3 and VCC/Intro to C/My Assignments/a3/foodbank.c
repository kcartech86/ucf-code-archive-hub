/*Kyle Cartechine
  COP 3223: Intro To C
  Assignment #3, Food Bank Program
  DUE 10-22-2009
*/

//Program that keeps track of a food bank. It has multiple uses such
//as keeping track of stock and requests for items, keeping track of specific
//amounts of an item, and printing a status report of the bank.

#include <stdio.h>
#include <string.h>

int main()
 
{
    char donations_table[100][26], requests_table[100][26], word[26];
    int don_amount[100], req_amount[100], don_count=0, req_count=0;
    int i, menu_choice, found_here, found_both, amount;
    
    
    while (menu_choice!= 5)
 {
    
    printf("Welcome to the Food Bank Program\n\n1. Add a donation\n2. Add a");
    printf("request\n3. Fulfill a request\n4. Print status report\n");
    printf("5. Exit\n\n");
    
    
    printf("Enter your choice: ");
    scanf("%d", &menu_choice);
    
    if (menu_choice == 1)
    
     { 
       printf("\nEnter inventory type: ");
       scanf("%s", &word );
       printf("Enter the amount: ");
       
           for (i=0; i <= don_count; i++)
            {
             strcmp(donations_table[i], word);
                     
             //if user input matches an item in the type table add 
             // the amount to the array storing the item quantity       
             if (strcmp(donations_table[i], word) != 0)      
                  { 
                   scanf("%d", &don_amount[i]);
                   strcpy ( donations_table[don_count], word );
                  }
                  
             else if ( strcmp(donations_table[i], word) == 0)
                  { 
                   found_here = i ;
                   scanf("%d", &amount); 
                   don_amount[i]+= amount;
                  }
                          
             
             if (strcmp(donations_table[i], word) != 0)
                 don_count+=1;
                         
            }
       
       printf("\nDonation added!\n\n");
     } 
   
   
    else if (menu_choice == 2)
    
     { 
       printf("\nEnter inventory type: ");
       scanf("%s", &word);
       
       printf("Enter the amount: ");
       
       for (i=0; i <= req_count; i++)
       {
        scanf("%d", &req_amount[i] );
        strcpy (requests_table[req_count], word);
       }
       
       printf("\nRequest added!\n\n");
       
       req_count+=1;
     }
   
   
    else if (menu_choice == 3)
    
       { 
         printf("\n---------- Fulfilling Request ----------\n");
         
         for (i=0; i<=don_count; i++)
            {
             if ( strcmp(donations_table[i], requests_table[0]) == 0)
                  {
                   if (don_amount[i] == 0)
                    printf("Cannot be fulfilled\n");
                   
                   else if ( 0< don_amount[i] < req_amount[i])
                   {
                     req_amount[i] - don_amount [i];
                     don_amount[i] = 0;
                     don_amount[i-1]= don_amount[i];
                     strcpy(donations_table[i-1], donations_table[i]);
                     printf("Partially fulfilled\n");
                   }
                    
                   else if (don_amount[i] == req_amount[i])
                    {
                        
                        req_amount[i-1]= req_amount[i];
                        strcpy( requests_table[i-1], requests_table[i]);
                        don_amount[i-1]= don_amount[i];
                        strcpy( donations_table[i-1], donations_table[i]);
                        printf("\nRequest fulfilled\n");
                    }    
                  }
             else
                 printf("Cannot be fulfilled\n");
                    
            }           
            
         
         
         
       } 
   
   
    else if (menu_choice == 4)
    
       { 
         printf("\nPrinting the donations table.\n");
          
         for (i=0; i <= don_count; i++)
          {  
            printf("%s          ", donations_table[i]);
            printf("%d", don_amount[i]); 
            printf("\n");     
          }
          
         don_count+=1;
          
         printf("\nPrinting the requests table.\n");
          
         for (i=0; i<= req_count; i++)
          {   
            printf("%s          ", requests_table[i]);
            printf("%d", req_amount[i]); 
            printf("\n");     
          }
          
       }
       
 }   
   
    if (menu_choice == 5)
         
         printf("\nThank you for using the Food bank program. Goodbye!\n\n");
       
system("PAUSE");
return 0;

}
     
