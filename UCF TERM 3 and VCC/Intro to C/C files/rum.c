// Arup Guha
// 1/27/09
// Simple if statement example

#include <stdio.h>

int main() {
    
    int age;

    // Get user input.    
    printf("How old are you?\n");
    scanf("%d", &age);
    
    // You can drink.
    if (age >= 21)
        printf("Time for happy hour!\n");
    
    // Not yet!
    else
        printf("It's happy hour...minus the rum for you!!!\n");   
    
    
    system("PAUSE");
    return 0;
}
