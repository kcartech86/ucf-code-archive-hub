#include <stdio.h>

int main()
{
    double temp_fahr, temp_cels;
    
    int choice;
    
    printf("Make a choice:\n");
    printf("1. Fahrenheit to Celcius\n");
    printf("2. Celsius to Fahrenheit\n");
    scanf("%d", &choice);
    
    if(choice == 1)
    {
              printf("Enter a temp in F\n");
              scanf("%lf", &temp_fahr);
              
              temp_cels = (temp_fahr - 32)*(5.00/9.00);
              printf("Temp in C is: %lf\n", temp_cels);
    }
    else if(choice == 2)
    {
         printf("Enter a temp in C\n");
         scanf("%lf", &temp_cels);
              
         temp_fahr = temp_cels*1.8 + 32;
         printf("Temp in F is: %lf\n", temp_fahr);
          
     
    }
    else
    {
        printf("Invalid choice\n");
    }
system("pause");
return 0;
}
