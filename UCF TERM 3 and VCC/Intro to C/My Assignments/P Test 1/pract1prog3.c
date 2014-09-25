 #include <stdio.h>                
                                  
                                 
 int main(void)                 
 {                             
       int a=1 , b=4, c=3;    
       a += 2;               
       if (a <= b)          
         {                 
         if (b <= c)     
           printf ("c= %d\n", c);   
         else                      
           printf ("c= %d\n",a+c);
        }                        
      else                      
        printf ("b= %d\n", b); 
      b -= 1;                 
      if (a <= b)            
         printf ("a= %d\n", a);   
      else                       
         printf ("b= %d\n", b); 
      system("pause");                         
                              
      return 0;              
 }                          
