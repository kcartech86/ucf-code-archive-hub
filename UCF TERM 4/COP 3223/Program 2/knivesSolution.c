// Arup Guha
// 2/2/2010
// Solution to Spring 2010 COP 3223 Program #2B: Pay Calculator
#include <stdio.h>

// All of these are constants in reference to this problem
#define LOW 100
#define HIGH 200

#define LOWPAY 5
#define MIDPAY 10
#define HIGHPAY 15

int main() {
    
    int num_knives;
    
    // Get the user input.
    printf("How many knives did you sell this month?\n");
    scanf("%d", &num_knives);
    
    int pay;
 
    // This is the easiest formula.   
    if (num_knives <= LOW)
        pay = num_knives*LOWPAY;
        
    // Here we know exactly LOW number of knives were sold at LOWPAY.
    // The rest were sold at the MIDPAY profit.
    else if (num_knives <= HIGH)
        pay = LOW*LOWPAY + (num_knives-LOW)*MIDPAY;
        
    // Just extend the logic here.
    else
        pay = LOW*LOWPAY + (HIGH-LOW)*MIDPAY + (num_knives-HIGH)*HIGHPAY;
        
    // Print out this final answer.
    printf("You made $%d selling knives this month.\n", pay);
    
    system("PAUSE");
    return 0;
}
