#include <stdio.h>
#include <time.h>

int main()
{
    int board[4] = {5,1,4,3};
    int answer[4] = {4,5,2,1};
    
    int i = 0, j, k, counter = 0, posMatch = 0;
    for(j = 0; j < 4; j++){
          // i++;
           for(k = 0; k<4; k++){
               if(answer[j] == board[k]){
               // printf("Found a match at board positon %d ", k);
               // printf("and at answer position %d \n", j);
                posMatch++;
               }
          // counter++;
           }
    }
    printf("Outer loop ran %d times\n", i);
    printf ("Inner loop ran %d times\n", counter);
    printf ("Off position matches %d\n", posMatch); 
system("PAUSE");
return 0;
}
