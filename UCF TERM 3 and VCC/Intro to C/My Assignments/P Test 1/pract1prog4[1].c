 #include <stdio.h>                  
                                    
                                   
 int main(void)                   
 {                               
       int a, i, n;             
       a = 1; i = 1;           
       scanf("%d",&n);        
       while (i <= n)        
        {                  
          a = a * a + i * i ;     
          i++;                   
          if (i <=n)            
             printf ("b= %d\n", a);
        }                         
      for (i=5; i>3; i--)        
        {                       
           printf ("c= %d\n",a+i); 
        }                         
      system("pause");
      return 0;                  
 }                                   
