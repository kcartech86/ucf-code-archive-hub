/*
 Diego Velasquez
 Rodrigo Groppa
 3/16/2010
 Examples about arrays for COP 3223 
*/

#include <stdio.h>
#define LENGTH 5


void add_one(int array[], int length);
void SquareArray(int array[], int length);
void printArray(int array[], int length);
int findMax(int array[], int length);

int main()
{ 
    int SampleArray[5] = {13,2,1,3,4};
    int max;
    
    printf("Original: ");
    printArray(SampleArray,LENGTH);//prints the original array
    add_one(SampleArray,LENGTH);
    printf("\nModification #1: ");
    printArray(SampleArray,LENGTH);//prints the original array + 1;
    SquareArray(SampleArray,LENGTH);
    printf("\nModification #2: ");// prints the array modified, then square the numbers
    printf("Here is your array squared!: ");
    printArray(SampleArray,LENGTH);
    printf("\n");
    max = findMax(SampleArray,LENGTH);
    printf("The max number of the array is %d \n",max);//print the max number of the array after the last modification.
    system("pause");
    return 0;
    
}

//It will take as a parameter an array of numbers, and it will add 1.
// to all its elements.
void add_one(int array[], int length)
{
   int i;
   for (i=0; i<length; i++)
       array[i]+=1;//the same as array[i] = array[i] + 1;     
}
//Print all the elements that are store in the array
void printArray(int array[], int length)
{
     int i;
     for (i=0; i<length; i++)
         printf(" %d",array[i]);
}
////It will take as a parameter an array of numbers, and it will
//square all its elements
void SquareArray(int array[], int length)
{
     
     int i;
     for(i=0; i< length; i++)
        array[i]*=array[i];//the same as array[i] = array[i] * array[i]; 
}
//It will take as a parameter an array of numbers, and it will 
// find the max number stored in the array.
int findMax(int array[], int length)
{
   int i, max=0;
   for(i=0; i<length;i++)
       if(array[i] > max)//Check to see if is max of the previous max
          max = array[i];
          
  return max;      
}
