// Arup Guha
// 9/12/06
// Developed in COP 3223 Lecture as a concrete example of a menu driven
// program. This program allows the user to maintain a bank account.
// It allows for deposits, withdrawals, printing of the balance, and
// accruing interest at 5%

#include <stdio.h>

#define RATE 0.05

int main() {
 
    double balance=0, money;
    int choice;

    // Print the menu and read in the user's choice.    
    printf("1.deposit,2.withdraw,3.print,4.interest,5.quit\n");
    scanf("%d", &choice);
    
    // Keep on going until the user quits.
    while (choice != 5) {
          
          // Execute a deposit. No error checking done here.
          if (choice == 1) {
             printf("How much to deposit?\n");
             scanf("%lf", &money);
             balance = balance + money;
          }
          
          // Execute a withdrawal. No error checking done here.
          else if (choice == 2) {
             printf("How much to withdraw?\n");
             scanf("%lf", &money);
             balance = balance - money;
          }
          
          // Prints out the value of balance.
          else if (choice == 3) {
             printf("Balance = $%.2lf\n", balance);
          }
          
          // Add to the balance according to the interest rate.
          else if (choice == 4) {
             balance = balance*(1+RATE);
          }
          
          // Print out an error message for an invalid choice.
          else if (choice != 5) {
             printf("Sorry that was invalid.\n");
          }
          
          // Reprompt the menu.
          printf("1.deposit,2.withdraw,3.print,4.interest,5.quit\n");
          scanf("%d", &choice);
    } // end while
          
    system("PAUSE");
    return 0;
} // end main
