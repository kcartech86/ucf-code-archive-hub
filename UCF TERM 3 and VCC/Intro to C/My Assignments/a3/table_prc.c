#include <stdio.h>
#include <string.h>

int main()
 
{
    char word[26], table[5][26];
    int i, counter=0; 
  while (i<5)
  {  
    for (i=0; i<=counter; i++)
        {
              printf("Enter a word: ");
              scanf("%s", word);
              strcpy(table[i], word);
             // 
         }
}      
    counter+=1;
    
    printf("\n\n     TABLE     \n");
    for (i=0; i<=counter; i++)
      
         printf("%s\n", table[i]);
         printf("\n");
         
system ("pause");
return 0;
}
