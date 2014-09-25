// Arup Guha
// 10/3/08
// Code from Array lecture for COP 3223 - generates random numbers, then
//      asks the user for a value for which to search, then does a linear
//      search on the array and says if the value was found or not.

#include <stdio.h>
#include <time.h>

#define SIZE 10

int main() {
    
    int index, temp, numbers[SIZE];
    srand(time(0));

    // Fill array with random values from 0 to 99.
    for (index=0; index<SIZE; index++)
        numbers[index] = rand()%100;
        
    // Print original array values.
    printf("Original Array Vals: ");
    for (index=0; index<SIZE; index++)
        printf("%d ", numbers[index]);
    printf("\n");

    // Find the number the user wants to search for.
    int val;
    printf("What is the number to search for?\n");
    scanf("%d", &val);

    // Look through the array for it, if you find it, change found to 1.
    int found = 0;
    for (index=0; index < SIZE; index++) {
        if (numbers[index] == val)
            found = 1;
    }

    // Just print the result.
    if (found == 1)
        printf("%d was in the array.\n", val);
    else
        printf("%d was NOT in the array.\n", val);
    
    system("PAUSE");
    return 0;
}




