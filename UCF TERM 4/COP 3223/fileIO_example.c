#include <stdio.h>

int main() {

  FILE *ifp;
  int num = -1, sum = 0;

  ifp = fopen("input.txt", "r");

  while (num != 0) {
    fscanf(ifp, "%d", &num);
    sum += num;
  }

  

  printf("The sum is %d\n", sum);
  fclose(ifp);
  system ("PAUSE");
  return 0;
}
