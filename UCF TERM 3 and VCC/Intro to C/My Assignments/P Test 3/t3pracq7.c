#include <stdio.h>
#include <ctype.h>

int main() {

  char first[30], last[30];
  char wholename[60];

  scanf("%s", first);
  scanf("%s", last);

  if (strcmp(first, last) < 0)
    printf("Your first name comes first alphabetically.\n");
  else if (strcmp(first, last) == 0)
    printf("You're weird.\n");
  else
    printf("Your last name comes first alphabetically.\n");

  printf("first = %s, last = %s\n", first, last);
  
  strcat(first, last);

  printf("first = %s, last = %s\n", first, last);

  strcpy(wholename, first);

  printf("first = %s, wholename = %s\n", first, wholename);

  printf("Your whole name is %d characters.\n", strlen(wholename));
  
  system("PAUSE");
  return 0;
}

