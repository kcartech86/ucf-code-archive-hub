#include <stdio.h>

int main(void)
{
    double pay_rate;
    int hours;
    
    printf("Enter your par rate\n");
    scanf("%lf", &pay_rate);
    
    printf("Enter the hours your work\n");
    scanf("%d", &hours);
    
    if(pay_rate >= 7.15)
    {
            if(hours >= 30)
                     printf("You make more than $215 a week\n");
    }
     else 
            printf("You make less than minimum wage.\n");
    
    system("pause");
    return 0;
}
