// Arup Guha
// 1/27/09
// Another way to implement the solution in rum2.c

// Note: I completely discourage the use of fake ids.
//       They are illegal. I have used them in this 
//       example because, logically, it is an idea 
//       that many understand easily.

#include <stdio.h>

int main() {
    
    int age, fakeid;

    // Get user input.    
    printf("How old are you?\n");
    scanf("%d", &age);
    
    printf("Do you have a fake id?(yes=1,no=0)\n");
    scanf("%d", &fakeid);
    
    // You can drink.
    if (age >= 21)
        printf("Time for happy hour!\n");
    
    // For all you lawless people out there.
    else if (fakeid > 0)
        printf("You can still enjoy happy hour!\n");
        
    // Here are our goody two-shoes.
    else
        printf("It's happy hour...minus the rum for you!!!\n");   
    
    
    system("PAUSE");
    return 0;
}
