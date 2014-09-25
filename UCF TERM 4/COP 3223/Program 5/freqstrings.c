// Arup Guha
// 4/5/06
// A program that illustrates the COP 3223 in-class example of a function
// that takes in an array of strings. 

// This program reads in several words from a file into an array of 
// strings, and then calculates the frequence of each letter in those
// words and prints out a histogram of the results.

#include <stdio.h>
#include <ctype.h>

#define MAXSIZE 100

int readfile(char words[][20], char name[], int length);
void calcfreq(char words[][20], int freq[], int len);
void printHistogram(int freq[]);
void printHistogram2(int freq[]);
int max(int freq[]);

int main() {

  char filename[20];
  char dictionary[MAXSIZE][20];
  int freq[26], i, numvals;

  // Get the filename.
  printf("What file stores your words?\n");
  scanf("%s", filename);

  // Read in the words from the file into dictionary.
  numvals = readfile(dictionary, filename, MAXSIZE);

  // Initialize the frequency array.
  for (i=0; i<26; i++)
    freq[i] = 0;
 
  // Calculate the frequencies.
  calcfreq(dictionary, freq, numvals);

  // Print a regular histogram.
  printHistogram(freq);
  
  // Print a histogram rotated 90 degrees compared to the first.
  printHistogram2(freq);

  system ("pause");
  return 0;
}

// Reads in upto length words from the file name and stores them in
// words. The actual number of words read in is returned.
int readfile(char words[][20], char name[], int length) {

  int size, i;
  FILE *ifp;

  // Read in the number of words in the file.
  ifp = fopen(name, "r");
  fscanf(ifp, "%d", &size);

  // Read in each word into the array.
  for (i=0; i<size && i<length; i++) 
    fscanf(ifp, "%s", words[i]);
  
  // Close the file and return the number of words read in.
  fclose(ifp);
  return i;
}

// Calculates the frequencies each letter appears in words, and
// stores these in freq. len is the number of words stored.
void calcfreq(char words[][20], int freq[], int len) {
  int wordcnt, let;

  // Loop through each word.
  for (wordcnt=0; wordcnt<len; wordcnt++) {

    // Loop through each letter in the current word.
    for (let=0; let<strlen(words[wordcnt]); let++) {

      // Adjust the appropriate frequency if it's an alphabetic letter.
      if (isalpha(words[wordcnt][let]))
        freq[tolower(words[wordcnt][let])-'a']++;
    }
  }
}

// Print out a histogram displaying the frequency data stored in freq.
void printHistogram(int freq[]) {

  int letcnt, cnt;

  // Print the chart header.
  printf("Letter\tFrequency\n");

  // Loop through each letter.
  for (letcnt=0; letcnt<26; letcnt++) {

    // Print out the current letter.
    printf("%c\t", letcnt+'a');

    // Print out one star for each occurence of that letter, which is
    // stored in the freq array.
    for (cnt=0; cnt<freq[letcnt]; cnt++)
      printf("*");
    printf("\n");
  }
  printf("\n");
}

// Print out a histogram displaying the frequency data stored in freq.
// This histogram has vertical bars instead of horizontal ones. 
void printHistogram2(int freq[]) {

  int letcnt, cnt;

  // Calculate the number of times the most frequent letter occurs.
  int rowcnt = max(freq);

  // We are printing stars in a "backwards" fashion, so we start with the
  // "top" row so to speak and count down.
  while (rowcnt > 0) {

    // Loop through each letter.
    for (letcnt=0; letcnt<26; letcnt++) {

      // We only want to print a star if the number of occurences of the
      // current letter is greater than or equal to the current row we are
      // on. Otherwise, we print a space.
      if (freq[letcnt] >= rowcnt)
        printf("*");
      else
        printf(" ");
    }

    printf("\n");
    rowcnt--;
  }

  // Print the column header for each bar.
  for (letcnt=0; letcnt<26; letcnt++)
    printf("%c",letcnt+'a');

  printf("\n");
}

// Returns the maximum value stored in freq, and assumes that the length
// of freq is 26.
int max(int freq[]) {

  int i, retval;
  
  retval = freq[0];
  for (i=1; i<26; i++)
    if (retval < freq[i])
      retval = freq[i];

  return retval;
}
