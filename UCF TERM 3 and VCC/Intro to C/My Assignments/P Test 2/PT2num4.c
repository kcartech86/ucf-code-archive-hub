//Kyle Cartechine
//Practice Test 2
//Part 4
// 9-23-2009

/*Use a for loop to read in 9 numbers. If a number is >20 add into
a sum. After the loop print out the sum.*/

#include <stdio.h>

int main (void)

{
    int i, num, sum;
    sum = 0;
 
    for (i = 0; i<9; i++)
    {         
     scanf ( "%d",&num );
     if (num > 20)
     sum += num ;
    }
         
    
  
 printf ("Total = %d\n", sum );
 
 system ("PAUSE");
 
 return 0;
}
