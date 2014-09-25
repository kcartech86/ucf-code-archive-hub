// Arup Guha
//Calendar prac test 2

#include <stdio.h>

int main(void) {

  int i, n, start;
  n=31;

  scanf("%d", &start);
  
  for (i=0; i<start-1;i++)
     printf("   ");
  
  for (i=1; i<=n; i++)
  {
      printf("%3d",i);
      if ( ((i+start-1)%7)==0)
      printf("\n");
  }    
  
    system("PAUSE");

}
