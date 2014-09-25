//Kyle Cartechine
//COP 3223 Section 3
//Program 3
//Problem C: Golf Outning Revisited

/* This program is a modification to Problem B where it still reads from
a file including golfer's scores, but instead of printing their final scores 
it prints their score on each hole.  */

#include <stdio.h>

#include<stdio.h>

int main()
{   //Create a file pointer and open the input file
    FILE*ifp;
    ifp = fopen("golf.txt", "r");
    
    int golfer, num_golfers, i = 0, j = 0, k = 0;
    int par_array[18];
    int score_array[18];
    int golf_scores[18];
    
    //Read in how many golfers played
    fscanf(ifp, "%d", &num_golfers);
    
    //Store the par scores in an array
    for ( i=0; i<18; i++ ){
          fscanf(ifp, "%d", &par_array[i]);        
    }
    
    //Loop through each golfer's score data  
    for(golfer = 1; golfer <= num_golfers; golfer++){
        /*You need to subtract each individual hole score from each individual
        par score. Since we stored par scores in par_array, we need to store 
        the golfer's individual hole scores in an array. Then subtract par 
        scores from golfer's scores and store in a final array. ***To make 
        all array positions match i,j, and k must be properly incremented. */ 
        for ( i=0, j=0, k=0; i<18, j<18, k<18; i++, j++, k++ ){
              fscanf(ifp, "%d", &score_array[j]);
              golf_scores[k] = score_array[j] - par_array[i];
        }
         
        printf("Golfer %d's score: ", golfer);
        /*To print the golfer's score hole by hole loop through and print data
        in each position of golf_scores[] array.*/
        for (k=0; k<18; k++){
             printf("%2d ", golf_scores[k]);
        }
        printf("\n"); 
    }
      
    fclose(ifp);
    system("PAUSE");
    return 0;
}
