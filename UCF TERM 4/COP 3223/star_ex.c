#include <stdio.h>
int main()
{
    int n;
    
    printf("How big is square?\n");
    scanf("%d", &n);
    
    int spaces = n-1;
    
    while (spaces >= 0) 
    {
          //need to print N stars
          int col = 1;
          while (col <= spaces)
          {
           printf(" ");
           col++;
          }
          stars = n -spaces; 
          col = 1;
          while(col <= stars)
          {
           printf("*");
           col++;
           }
           printf("\n")
           spaces--;
    }
    
    system ("pause");
    return 0;
}
