//Kyle Cartechine
//Practice Test 2
//Part 3
// 9-23-2009

/*Read in two integers, add them, multiply by 40
then print out the answer*/


#include <stdio.h>

int main()

{
    int num_uno, num_two, sum, total;
    
    scanf ("%d\n", &num_uno);
    
    scanf ("%d", &num_two);
    
    sum = num_uno + num_two ;
    
    total = sum * 40;
    
    printf ("Final answer is %d.\n", total);
    
    system ("PAUSE");
    
    return 0;

}
