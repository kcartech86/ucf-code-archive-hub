     #include <stdio.h>
   
     int f(int c, int b, int a);
   
     
   
     int main() {
   
     
   
       int a = 2, b = 3, c=5;
   
       printf("a=%d b=%d c=%d\n", a, b, c);
   
     
   
       a = f(b, a, b+c);
   
       printf("a=%d b=%d c=%d\n", a, b, c);
   
      
       system("PAUSE");
       return 0;
   
     }
   
      


     int f(int c, int b, int a) {
   
      
   
       int sum;
   
       sum = a + b + c;
   
       if (sum > a*c)
   
         return a*c;
   
       if (sum <= b*c)
   
         return b*c;
   
      
   
       return a*b;

      }

