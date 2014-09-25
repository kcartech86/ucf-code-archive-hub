#include <stdio.h>

int f1(int *a, int b);

int f2(int a, int *b);

int main(void) {

  int a=5, b=2, c=7, d=9;

  c = f1(&d, a);

  printf("a=%d b=%d c=%d d=%d\n",a,b,c,d);

  a = f2(c-d, &a);

  printf("a=%d b=%d c=%d d=%d\n",a,b,c,d);

  b = f1(&c, 8);

  printf("a=%d b=%d c=%d d=%d\n",a,b,c,d);

  d = f2(b, &a);

  printf("a=%d b=%d c=%d d=%d\n",a,b,c,d);
  
  system("PAUSE");
  return 0;

}

int f1(int *a, int b) {

  *a = b -8;

  b = b*2 - (*a);

  printf("In f1: a=%d b=%d\n", *a, b);

  return b - *a;

}

int f2(int a, int *b) {

  a = *b+a;

  *b = 37 - *b;

  printf("In f2: a=%d b=%d\n", a, *b);

  
  return a;

}

