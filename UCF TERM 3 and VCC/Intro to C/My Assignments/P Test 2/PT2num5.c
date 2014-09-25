//Kyle Cartechine

//Write a program that will read ints until -99 is entered.
//For each other int compute its square then print int and its square with s
//spaces.Assume other ints are positive and don't print for -99. 

#include <stdio.h>

int main ()

{
 int a;
 while (a!= - 99)
            {
             scanf("%d", &a);
             if (a!= -99)
             printf("%d  %d\n", a, a*a);
         
            } 
 system ("PAUSE");
 return 0;        
}        
        
      
