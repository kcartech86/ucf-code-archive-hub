//Kyle Cartechine
//COP 3223: Intro to C Prog
//Program 5
//Text Message Censoring

/* Program is meant to scan text messages between 1am and 6:59am and will
   block unwanted messages with bad or mispelled words.
*/

#include<stdio.h>
#include <string.h>
#include<ctype.h>

#define MAX_WORDS 30000
#define BAD_WORDS 100
#define MSG_WORDS 50
#define LENGTH 30
#define TIME_LEN 8




int main(){
    
    FILE *ifp;
    ifp = fopen("textmsg.txt", "r");
    
    int i, num_words;
    fscanf(ifp, "%d", &num_words);
    
    char word[num_words][LENGTH];    
    for(i=0; i<num_words; i++)
        fscanf(ifp, "%s", word[i]);
        
    for (i=0; i<num_words; i++)
    printf("%s  ", word[i]);
//--------------------------------------------------
    int num_badwords;
    fscanf(ifp, "%d", &num_badwords);
    
    char bad[num_badwords][LENGTH];    
    for(i=0; i<num_badwords; i++)
        fscanf(ifp, "%s", bad[i]);
    
    printf("\n"); 
       
    for (i=0; i<num_badwords; i++)
    printf("%s ", bad[i]);
//--------------------------------------------------        
    int num_msgs;
    fscanf(ifp, "%d", &num_msgs);
    
    char messages[num_msgs*2][MSG_WORDS];
    for(i=0; i<(num_msgs*2); i++)
        fscanf(ifp, "%s", messages[i]);
        
  
    
//--------------------------------------------------   
    
    fclose(ifp);
    system ("PAUSE");
    return 0;
}  
