#include <stdio.h>

int main()
{
    int percent_grade;
    char letter_grade;
    
    printf("Enter your percentsge in the class\n");
    scanf("%d", &percent_grade);
    
    if(percent_grade >= 90)
        letter_grade = 'A';   
    else if(percent_grade >= 80)
        letter_grade = 'B';
           
    else if(percent_grade >= 70)
        letter_grade = 'C';
           
    else if(percent_grade >= 60)
        letter_grade = 'D';
        
    else 
        letter_grade = 'F';
        
    printf("Your letter grade is %c\n", letter_grade);
        
    system("pause");
    return 0;
    
}
