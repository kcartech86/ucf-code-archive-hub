#include <stdio.h>

int main()
{
    char name1[20];
    char name2[20];
    
    printf("enter name 1\n");
    scanf("%s",  name1);
    
    strcpy(name2, name1);
    
    printf("name1 is %s\n", name1);
    printf("name2 is %s\n", name2);
    
    system("pause");
    return 0;
}
