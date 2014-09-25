#include <stdio.h>

int main()
{
    int i, num_words;
   
        
    FILE *ifp;
    ifp = fopen("textmsg.txt", "r");
    fscanf(ifp, "%d", &num_words);
    
    char wordlist[num_words][30];

 // Read in each dictionary word into the 2d array.
    for (i=0; i<num_words; i++) 
    fscanf(ifp, "%s", wordlist[i]); 
  
//Print the newly created array
    for (i=0; i<num_words; i++)
    printf("%s  ", wordlist[i]);  
  
// Close the file.
    fclose(ifp);    
    system("PAUSE");
    return 0;
    
    
}    
