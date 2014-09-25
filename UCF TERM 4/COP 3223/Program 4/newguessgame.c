// Arup Guha
// 3/16/2010
// Solution for COP 3223 Function Class Exercise

#include <stdio.h>
#include <time.h>

#define SIZE 5
#define NUMDIGITS 4

int numCorrect(int guess[], int key[], int length);
void printNumCorrect(int guess[], int key[], int length);
void fillKey(int key[], int length);
void getGuess(int guess[], int length);
void printKey(int key[], int length);

int main() {
    
    int key[SIZE];
    int guess[SIZE];
    
    srand(time(0));
    
    // Set up the game.
    fillKey(key, SIZE);    
    int correct = 0, newCorrect;
    
    while (1) {
    
        getGuess(guess, SIZE);
        newCorrect = numCorrect(guess, key, SIZE);
        
        // No new correct digits were discovered, you lose.
        if (newCorrect <= correct) {
        
            printf("Sorry, you did not improve the number of correct digits.\n");
            printf("You lose.\n");
            printKey(key, SIZE);
            break;              
                       
        }
        
        // Print out which digits were correct.
        else {
             
            printNumCorrect(guess, key, SIZE);   
            correct = newCorrect;  
        }
        
        // Winning case!
        if (correct == SIZE) {
            printf("Congratulations, you won the car!\n");
            break;
        }
    
    }
    
    system("PAUSE");
    return 0;
}

// Pre-conditions: guess and key store exactly length elements.
// Post-conditions: returns the number of corresponding elements that are
//                  equal. Thus, if index 3 of both arrays stores a 7, this
//                  item would be counted.
int numCorrect(int guess[], int key[], int length) {
    
    int i, num = 0;
    
    // Go through each separate index of both arrays.
    for (i=0; i<length; i++) 
        if (guess[i] == key[i])
            num++;
            
    return num;
}

// Pre-condition: guess and key store exactly length elements and have at least
//                one corresponding element that is equal.
// Post-condition: prints a list of positions (1 through length, from left to
//                 right), that have equal elements in both arrays.
void printNumCorrect(int guess[], int key[], int length) {
  
    int i;
    
    printf("You have the following digit locations correct: ");
    for (i=0; i<length; i++)
        if (guess[i] == key[i])
            printf("%d ", i+1);     
            
    printf("\n");
}

// Pre-conditions: key is of the given length.
// Post-conditions: Each element of key is filled with a random number in between
//                  0 and NUMDIGTS-1. The element in index 0 can NOT be 0.
void fillKey(int key[], int length) {
     
    int i;
    key[0] = 1 + rand()%(NUMDIGITS-1);
    for (i=1; i<length; i++)
        key[i] = rand()%NUMDIGITS;
}

// Pre-conditions: guess is of the given length.
// Post-conditions: Prompts the user to enter their guess of the car price,
//                  with each digit separated and reads in their guess into
//                  the array guess.
void getGuess(int guess[], int length) {
     
    printf("Please enter your guess for the price.\n");
    printf("Separate each digit with a space.\n");
    
    int i;
    for (i=0; i<length; i++)
        scanf("%d", &guess[i]);
}

// Pre-conditions: key is of the given length.
// Post-conditions: Prints out length elements in the key, in order.
void printKey(int key[], int length) {
     
    int i;
    printf("Here is the correct key: ");
    for (i=0; i<length; i++)
        printf("%d ", key[i]);
    printf("\n");
}

