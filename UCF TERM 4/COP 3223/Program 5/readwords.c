// Arup Guha
// 3/23/2010
// Example that shows how to read in a dictionary.

/* Note: I already have another example similar to this up on line, but someone
         wanted me to post this one. I think that posting different examples
         that illustrate the same concept makes the page slightly more
         confusing. I also think that it detracts from learning conceptually.
         To learn conceptually, it's better to see one example in class and
         look at a different one when you study. The reason for this is that
         if you require the identical example to understand what is going on
         then you are probably memorizing too much and missing the essential
         ideas. If you are forced to see a different example and extract what
         is meaningfully the same between it and something else, it focuses
         on conceptual learning better. Now that I've stated clearly why I
         would have preferred not to post this to enhance the class's
         conceptual learning, I'll just post it anyway since someone asked.
*/

/* File format: First line has a positive integer n, representing the number
                of words in the file. The following n lines contain one word
                each, all lowercase letters only.
*/

#include <stdio.h>

int search(char list[][20], int length, char word[]) ;

int main() {
    
    char words[100][20];
    
    // Open the file.
    FILE* ifp;
    ifp = fopen("words.txt", "r");
    
    // Read in the number of words.
    int numwords;
    fscanf(ifp, "%d", &numwords);
    
    // Read in each word: It's very intuitive - just index the two D array
    // with one index, that tells you which word you are reading in.
    int i;
    for (i=0; i<numwords; i++)
        fscanf(ifp, "%s", words[i]);
        
    // Print out all the words, in order.
    printf("here is what you read:\n");
    for (i=0; i<numwords; i++)
        printf("%s\n", words[i]);

    // Get a word to test our search function.
    char test[20];
    printf("enter a word to search for.\n");        
    scanf("%s", test);
    
    // Search for that word.
    if (search(words, numwords, test))
        printf("Found %s in the dictionary\n", test);
    else
        printf("did not find %s\n", test);
        
    system("PAUSE");
    return 0;
}

// Returns 1 iff word is found inside of list. The
// number of strings stored in list is length.
int search(char list[][20], int length, char word[]) {
    
    int i;
    
    // Go through each word, if you find a match return 1.
    for (i=0; i<length; i++)
        if (strcmp(list[i], word) == 0)
            return 1;
            
    // If we get here, no match was found.
    return 0;
}
