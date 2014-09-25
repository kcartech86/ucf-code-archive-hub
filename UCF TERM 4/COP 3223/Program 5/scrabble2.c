// Arup Guha
// 4/9/09
// Written in COP 3223 to illustrate reading in a dictionary.

#include <stdio.h>
#include <ctype.h>

#define SIZE 81000
#define MAXWORDLENGTH 20

int readDictionary(char dictionary[][MAXWORDLENGTH+1], FILE *ifp);
void toLowerCase(char *word);
int inDictionary(char dictionary[][MAXWORDLENGTH+1], int length, char *word);
int BinarySearch(char dictionary[][MAXWORDLENGTH+1], int length, char *word);
int scoreWord(char *word);
int scoreLetter(char c);

int main() {

    char dictionary[SIZE][MAXWORDLENGTH+1];
    
    // Open file.
    FILE *ifp;
    ifp = fopen("dictionary.txt", "r");
    
    int length, i;

    // Read in the dictionary.    
    length = readDictionary(dictionary, ifp);
        
    // Get a word from the user.
    char userword[MAXWORDLENGTH+1];
    printf("Enter a word!\n");
    scanf("%s", userword);
    
    // See if this word is in the dictionary.
    if (BinarySearch(dictionary, length, userword)) {
        printf("great you have picked a valid word!\n");
        
        // If so, score it for Scrabble!
        printf("Your scrabble score is %d.\n", scoreWord(userword));
    
    }
    
    // Not in the dictionary!
    else
        printf("You get ZERO POINTS!!!\n");
    
            
    system("PAUSE");
    return 0;
}

// Reads in the dictionary of words from the file pointed to by ifp into
// dictionary.
int readDictionary(char dictionary[][MAXWORDLENGTH+1], FILE *ifp) {

    // Get size of dictionary.
    int i, length;
    fscanf(ifp, "%d", &length);
    
    // Read in each word, one by one.
    for (i=0; i<SIZE && i<length; i++) {
        fscanf(ifp, "%s", dictionary[i]);
    }
    return length;
}

// Does a linear search and returns 1 iff word is stored in dictionary, which
// must have length number of words.
int inDictionary(char dictionary[][MAXWORDLENGTH+1], int length, char *word) {

    int i;
    
    // Our dictionary is lower case, so change our word we're searching for to
    // lower case.
    toLowerCase(word);
    
    // Go through one by one until we find the word.
    for (i=0; i<length; i++) {
        if (strcmp(word, dictionary[i]) == 0)
            return 1;
    }
    
    // Never found it.
    return 0;
}

// Does a binary search and returns 1 iff word is stored in dictionary, which
// must have a length number of words.
int BinarySearch(char dictionary[][MAXWORDLENGTH+1], int length, char *word) {

    int i;
    
    // Same as the linear search here.
    toLowerCase(word);
    int low = 0;
    int high = length-1;
    
    int mid = (low+high)/2;
    
    // Keep on going so long as the search space is non-empty.
    while (low <= high) {
    
         // We found it!
         if (strcmp(word, dictionary[mid]) == 0)
             return 1;
             
         // Go to the left.
         else if (strcmp(word, dictionary[mid]) < 0)
             high = mid-1;
             
         // Go to the right.
         else
             low = mid+1;
             
         // The new middle of our range.
         mid = (low+high)/2;
    
    }
    
    // If we get here, we never found the word.
    return 0;
}

// Changes word to be all lowercase letters.
void toLowerCase(char *word) {

    int i;
    for (i=0; i<strlen(word); i++)
        word[i] = tolower(word[i]);
}

// Pre-condition: word has all lowercase letters.
// Post-condition: Returns the word's score in Scrabble.
int scoreWord(char *word) {

    int i,sum = 0;
    
    // Add up each letter's score.
    for (i=0; i<strlen(word); i++)
        sum = sum + scoreLetter(word[i]);
    return sum;
}

// Returns the score of c in Scrabble.
int scoreLetter(char c) {

    // Here are all the scores of the 26 letters.
    int scores[] = {1, 3, 3, 2, 1, 4, 2, 4, 1, 8, 5, 1, 3,
                    1, 1, 3, 10, 1, 1, 1, 1, 4, 4, 8, 4, 10};
                   
    // Avoid the array out of bounds error by checking the character.
    if (isalpha(c))                 
        return scores[tolower(c)-'a'];
    // Invalid characters get 0 points.
    else
        return 0;
}
