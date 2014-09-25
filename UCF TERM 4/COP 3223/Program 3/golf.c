//Kyle Cartechine
//COP 3223 Section 3
//Program 3
//Problem B: Golf Outing

/* This program reads in information about a single golf course
 that several players have played on. It will then output everyone's final
 score in that particular game.  */
 
#include<stdio.h>

int main()
{   //Create a file pointer and open the input file
    FILE*ifp;
    ifp = fopen("golf.txt", "r");
    
    int golfer, num_golfers, i=0, par = -1, score = -1;
    int par_sum = 0, score_sum = 0, golf_score;
    
    //Read in how many golfers played
    fscanf(ifp, "%d", &num_golfers);
    
    //Read in the par scores for each hole and calculte the total sum
    while ( i <18 ){
          fscanf(ifp, "%d", &par);
          par_sum += par;
          i++;
    }
        
    //Loop through each golfer's score data  
    for(golfer = 1; golfer <= num_golfers; golfer++){
        i = 0;
        score_sum = 0;
        
        //Read in golfer's scores and calculate their total score
        while ( i <18 ){
              fscanf(ifp, "%d", &score);
              score_sum += score;
              golf_score = score_sum - par_sum;
              i++;
              
        } 
        
        //Print the Golfer's calculated score
        printf("Golfer #%d's score: %d \n", golfer, golf_score); 
    }
       
    fclose(ifp);
    system("PAUSE");
    return 0;
}
