#include <stdio.h>

int main()
{
    int i=1; 
    int sum=0;
    while (i<=10)
    {
          printf("adding %d\n", i);
          sum = sum + i;
          i++;
    } 
     printf("the sum is %d. \n", sum);  
 system ("pause");
 return 0;   
}
