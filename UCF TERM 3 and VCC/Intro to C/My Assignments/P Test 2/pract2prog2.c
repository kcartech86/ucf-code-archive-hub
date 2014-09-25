   #include <stdio.h>
   
   int main()

   {
           int a[6] = {0, 3, 5, 7, 4, -1};
           int b[6] = {1, 10, 20, 40, 100, 2000};
           int i,x,temp;
   
           for(i = 0; i < 6; i++)
                  printf("%d ", a[i]);
          printf("\n");
  
          for(i = 1; i < 6; i++)
          {
                  a[i] += a[i-1];
          }
  
          for(i = 0; i < 6; i++)
                  printf("%d ", a[i]);
          printf("\n");
  
          printf("Result is: %f\n", a[5] / 6.);
  
          x = 5;
  
          for(i = 0; i < x; i++)
          {
                  temp = b[x];
                  b[x] = b[i];
                  b[i] = temp; 
                  x--;
          }
  
          for(i = 0; i < 6; i++)
                  printf("%d ", b[i]);
          printf("\n");
  
          return 0;
  }
