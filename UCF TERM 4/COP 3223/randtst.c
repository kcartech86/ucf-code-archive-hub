//Kyle Cartechine
//COP 3223 Guha
//1-26-10

#include <stdio.h>
#include <time.h>

int main()
{
    
    srand(time(0));
    
    int x = 1 + rand()%100;
    int y = 1 + rand()%100;
    printf("X is : %d\n", x);
    printf("Y is : %d\n", y);
    
    double answer = sqrt(x);
    printf("the sqrt of %d is %lf\n", x, answer);
    
    answer = pow(x,2);
    printf("the pow of %d is %lf\n", x, answer);
    
    
    
    
    system("PAUSE");
    return 0;
}
