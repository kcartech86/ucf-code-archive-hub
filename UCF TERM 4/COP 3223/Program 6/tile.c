// Arup Guha
// 4/12/06
// Program for COP 3223 struct lecture. The program utilizes a struct to
// store scrabble tiles. It reads in 7 tiles from the user and then prints
// out the letters in the set as well as the total score of those letters.

#include <stdio.h>

struct tile {
  char letter;
  int score;
};

void printTiles(struct tile alltiles[], int length);
void printScore(struct tile alltiles[], int length);
char getChar();

int main() {

  int index;
  struct tile mine[7];

  // Ask the user for each tile, letter and score  
  for (index=0; index<7; index++) {
    printf("Enter tile #%d, letter followed by score.\n", index+1);
    mine[index].letter = getChar();
    scanf("%d", &mine[index].score);
  }

  // Print out the tiles and their total score.
  printTiles(mine, 7);
  printScore(mine, 7);
  
  system("PAUSE");
  return 0;
}

// Precondition: The length of alltiles is length and each tile is already
//               initialized.
// Postcondition: All the letters stored in alltiles will be printed out
//                contiguously followed by a newline character.
void printTiles(struct tile alltiles[], int length) {

  int index;

  // Just loop through the whole array, printing out each letter.
  for (index=0; index<length; index++) 
    printf("%c", alltiles[index].letter);
  printf("\n");
}

// Precondition: The length of the alltiles is length and each tile is
//               already initialized.
// Postcondition: The sum of the scores of all the tiles will be printed.
void printScore(struct tile alltiles[], int length) {

  int index, sum=0;

  // Loop through each tile, adjusting the sum of the tiles seen so far.
  for (index=0; index<length; index++) 
    sum+=alltiles[index].score;
  printf("Score = %d\n", sum);
}

// Precondition: None
// Postcondition:Returns the next non-white space character from the input 
//               stream. White space characters are spaces, tabs and 
//               newline characters.
char getChar() {
  char c = getchar();
  while (c == ' ' || c == '\t' || c == '\n')
    c = getchar();
  return c;
}
