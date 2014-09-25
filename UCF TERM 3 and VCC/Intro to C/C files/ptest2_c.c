//Kyle Cartechine
//9-22-2009
//Practice test 2
//***On the test you can leave out the system pause & return 0,
//but you can include it 

#include <stdio.h>

 int main(void)
 {
   int i, num, sum;
   sum = 0;
 
 for (i = 0, i<9, i++ )
   {         
     scanf ( "%d",&num )
      if (num > 20)
       sum += num ;     
   }
  
 printf ("Sum = %d", &sum );
 
 system ("PAUSE");
 return 0;
}
