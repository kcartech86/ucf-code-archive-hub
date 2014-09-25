// Arup Guha
// 9/7/05
// A small example utilizing random number generation. Two users guess at
// a random number in between 1 and 100, and a winner (the person who
// guessed closer) is determined.

#include <stdio.h>
#include <time.h>

int main() {

  int guess1, guess2;
  int diff1, diff2;
  int secretNum;

  // Seed the random number generator.
  srand(time(0));

  // Create the secret number.
  secretNum = rand()%100+1;

  // Get both guesses.
  printf("Contestant #1, what number do you guess(1-100)?\n");
  scanf("%d", &guess1);
  printf("Contestant #2, what number do you guess(1-100)?\n");
  scanf("%d", &guess2);

  // Compute how far off each guess is.
  diff1 = abs(guess1-secretNum);
  diff2 = abs(guess2-secretNum);
  

  // Contestant #1 wins!
  if (diff1 < diff2)
    printf("Contestant #1, you win, the secret number was %d!\n", secretNum);

  // Contestant #2 wins!
  else if (diff2 < diff1)
    printf("Contestant #2, you win, the secret number was %d!\n", secretNum);

  // Tie!
  else
    printf("It was a tie! The secret number was %d\n", secretNum);


  return 0;
}
