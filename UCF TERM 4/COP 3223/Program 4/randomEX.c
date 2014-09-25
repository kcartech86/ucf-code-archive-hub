#include <stdio.h>
#include <time.h>

int main()
{
    
    srand(time(0));
    
    int x = 1 + rand()%100;
    int y = rand()%6;
    int i = 0;
    int board[4] = {0,5,3,4};
    
    for (i; i<4; i++){
            board[i] = rand()%6;
    }
    
    printf("X is : %d\n", x);
    printf("Y is : %d\n", y);  
    
    int answerCopy[4] = {4,5,2,1};
    int boardCopy[4] = {5,1,4,5};
    int answer[4] = {4,5,2,1};
    
    
    int j = 0;
  /*for(j; j < 4; j++){
        if( answerCopy[j] == boardCopy[j]){
            answerCopy[j] = 0;
            boardCopy[j] = 0;
            printf("Equal at position %d. \n", j);
        }
    } */ 
    
    int k = 0, counter =0;
    int offPosMatch = 0;
     
    for(j; j < 4; j++){
        if( answerCopy[j] == boardCopy[j]){
            answerCopy[j] = 6;
            boardCopy[j] = 7;
        }
        for(k; k < 4; k++){
            if( answerCopy[j] == boardCopy[k] ){
               counter++; 
            }
         offPosMatch +=counter;   
        }
    }
    printf("Off position matches = %d \n", counter);
    
    system("PAUSE");
    return 0;
}
