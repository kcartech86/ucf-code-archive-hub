#include <stdio.h>

int my_abs(int x);
int my_sqrt(double n);

int main() {
    
    srand(time(0));
    
    int x1, y1, x2, y2;
    
    printf("Enter point 1\n");
    scanf("%d%d", &x1, &y1);
    
    
    printf("Enter point 1\n");
    scanf("%d%d", &x2, &y2);
    
    double dist = my_sqrt((x2-x1)*(x2-x1)+(y2-y1)*(y2-y1));
    
    printf("The distance between the pts: %lf\n", dist);
    
    system("PAUSE");
    return 0;
}

int my_abs(int x)  {
    
 if (x < 0)
     return -x;
 else
     return x;   
}

int my_sqrt(double n) {
    
    double guess = (n+1)/2;
    
    while (my_abs(guess*guess - n) > .0000001) {
          guess = (guess + n/guess)/2;
    }
    return guess;
}
