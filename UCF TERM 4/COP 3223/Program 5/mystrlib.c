// Arup Guha
// 11/1/07
// This is a short file that shows a few examples of functions that
// operate on strings. The C string library already has some of these
// functions

#include <stdio.h>
#include <ctype.h>

int equal(char *w1, char *w2);
void to_upper(char *word);
int length(char *word);
void reverse(char *word);

int main() {

  char test1[30], test2[30];

  // Get two input strings.
  printf("Enter a string.\n");
  scanf("%s", test1);

  printf("Enter another string.\n");
  scanf("%s", test2);

  // Test the equal function.
  if (equal(test1, test2))
    printf("You entered two equal strings.\n");
  else
    printf("Your strings are different.\n");

  // Now the upper case function.
  to_upper(test1);
  printf("Your first string is now upper case: %s\n", test1);

  // And length.
  printf("The length of your second string is %d\n", length(test2));

  // Finally reverse!
  reverse(test2);
  printf("Your second string reversed is %s\n", test2);

  return 0;
}

// Returns 1 iff the strings pointed to by w1 and w2 are identical.
// Returns 0 otherwise.
int equal(char *w1, char *w2) {

  int i=0;

  // Keeps on going.
  while (1) {

    // Characters don't match, not equal!
    if (w1[i] != w2[i])
      return 0;

    // If we match the null character, the strings are
    // equal!!!
    else if (w1[i] == '\0')
      return 1;

    i++;
  }
}

// Changes the string pointed to by word to be upper case.
void to_upper(char *word) {

  int i=0;

  // Go through each character one by one, changing it to upper case.
  while (word[i] != '\0') {
    word[i] = toupper(word[i]);
    i++;
  }
}

// Returns the length of the string pointed to by word.
int length(char *word) {

  int i=0;

  // Keep on counting until the null character.
  while (word[i] != '\0')
    i++;
  return i;
}

// Reverses the contents of the string pointed to by word.
void reverse(char *word) {

  int i, len;
  char temp;

  // Get the length of the word.
  len = length(word);

  // Go half-way through.
  for (i=0; i<len/2; i++) {

    // Swap "opposite" side letters!
    temp = word[i];
    word[i] = word[len-1-i];
    word[len-1-i] = temp;
  }
}
