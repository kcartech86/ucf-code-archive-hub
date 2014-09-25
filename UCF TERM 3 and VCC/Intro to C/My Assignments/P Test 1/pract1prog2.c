#include <stdio.h>               
                                
int main(void)                 
{     float f;                
      int a,i;               
      a = 0;                
      a = a + 1;           
      printf ("A= %4d\n", a);  
      a += 2;                   
      a = a % 2;
      a++;                    
      printf ("B= %5d\n", a);
      i=2;                  
      f=5.0;               
      printf ("F= %6.2f\n", f/i);  
      
      system("PAUSE");  
                                    
      return 0;                    
}

