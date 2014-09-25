//Kyle Cartechine
// 8-29-2009
// My 2nd Program
// Arithmatic Calculations

#include <stdio.h>

int main(void)  {
    int bobby=9,james=11, cindy=14;
    int expr1, expr2, expr3;
    
    expr1 = james-bobby+cindy;
    printf("Expr1 = %d\n", expr1);
    system("PAUSE");
    
    expr2 = cindy-james-bobby;
    printf("Expr2 = %d\n", expr2);
    system("PAUSE");
    
    expr3 = expr1-expr2;
    printf("Expr3 = %d\n", expr3);
    system("PAUSE");
    
    int x, y, z;
    
    x = 3+7-12;
    printf("X is equal to: %d\n", x);
    system("PAUSE");
    
    y = 6*4/8;
    printf("Y is: %d\n", y);
    system("PAUSE");
    
    z = 10*(12-4);
    printf("Z is: %d\n", z);
    system("PAUSE");
    
    int arith1, arith2, arith3;
    
    arith1 = 3+10*(16%7)+2/4;
    printf("Arith1 is equal to: %d\n", arith1);
    system("PAUSE");
    
    arith2 = 3.0/6+18/(15%4+2);
    printf("Arith2 is: %d\n", arith2);
    system("PAUSE");
    
    arith3 = 24/(1+2%3+4/5+6+31%8);
    printf("Arith3 is: %d\n", arith3);
    system("PAUSE");
    
    char first = 'K' ;
    printf ("%c%6c%3c\n",first, 'L', 'M');
    system ("PAUSE");
    
    printf ("%c%8c%6c%4c%2c\n",first, 'L', 'M', 'N', 'O');
    system ("PAUSE");
    
    float derp= 3.1415967800, frap=3334.4333;
    printf("derp = %1.10f\n", derp);
    printf("derp is now + %1.4f\n", derp);
    printf("frap = %4.4f\n", frap);
    printf("frap is now = %6.2f\n", frap);
    system("pause");
    
    return 0;
}
     

