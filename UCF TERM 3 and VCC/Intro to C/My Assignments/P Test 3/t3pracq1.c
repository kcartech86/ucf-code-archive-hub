#include <stdio.h>

#include <ctype.h>

int main() {

  char c;

  while ((c = getchar()) != '0') {

    if (isupper(c))

       putchar(('A' + 15-(c-'A')));

    else if (islower(c))

       putchar(('a' + 5 +(c-'a')) );

    else

       putchar(c);
  }
  system ("pause");
  return 0;
}

