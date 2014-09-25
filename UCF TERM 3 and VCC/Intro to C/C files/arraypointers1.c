#include <stdio.h>          // Program to help explain relationship between 
#include <stdlib.h>         // array and pointer

#define SIZE 10


int main() {
    
int arr[SIZE], *a;

int i, sum1=0, sum2=0, sum3=0;;
 
                      // fill up array with integers from 0 to SIZE-1.
for (i=0;i<SIZE;i++)
 arr[i]=i;

                      // first sum
for (i=0;i<SIZE; i++)
   sum1 += arr[i];


                      // second sum
for (a= arr;  a < &arr[SIZE]; a++)
   sum2 += *a;


                      // third sum
for (i=0;i<SIZE; i++)
   sum3 += *(arr + i);

                      // The point is to understand that all three are same.
printf ("sum1= %d  , sum2= %d  , sum3= %d\n", sum1, sum2, sum3);



system("pause");
return 0;
}
