#include <stdio.h>

int main()
{
    void to_upper(char *word);
    int length(char *word);
    void reverse(char *word);
    
    char word[20];
    printf("enter a string\n");
    
    scanf("%s", word);
    printf("You entered %s. \n", word);
    
    to_upper(word);
    printf("Uppercase string: %s \n", word);
    
    printf("String length: %d chars \n", length(word));
    
    reverse(word);
    printf("The string in reverse: %s \n", word);
    

void to_upper(char *word) {

  int index = 0;

  while (word[index] != '\0') {
    word[index] = toupper(word[index]);
    index++;
  }
}

int length(char *word) {

  int index=0;

  while (word[index] != '\0')
    index++;
  return index;
}

void reverse(char *word) {
  int index, len;
  char temp;
  len = length(word);
  for (index=0; index<len/2; index++) {
    temp = word[index];
    word[index] = word[len-1-index];
    word[len-1-index] = temp;
  }
}

    
    
    system("PAUSE");
    return 0;
}
