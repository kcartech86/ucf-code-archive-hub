#include <stdio.h>

int f1(int *a, int c);

int main(void) {

  int a=2, b=3, c=4, d=5;

  a = f1(&c, b);

  printf("a= %d b= %d c= %d d= %d\n",a,b,c,d);

  system("PAUSE");
  return 0;

}

int f1(int *a, int c) {

  *a = c - 2;

  c = c*2 - (*a);

  printf("a= %d c= %d\n", *a, c);

  return c - *a;

}

