#include <stdio.h>

int main() {

  int pascaltri[11][11];
  int r, c;

  // Initialize beginning and end of each 
  // row to 1.
  for (r=0; r<11; r++) {
    pascaltri[r][0] = 1;
    pascaltri[r][r] = 1;
  }

  // Fill in the table.
  for (r=2; r<11; r++)
    for (c=1; c<r; c++)
      pascaltri[r][c] = pascaltri[r-1][c-1]+
                        pascaltri[r-1][c];

  // Loop through each row of the table.
  for (r=0; r<11; r++) {

    // Loop through each value of the row.
    for (c=0; c<=r; c++) 
      printf("%4d ", pascaltri[r][c]);
  
    // Go to the next line.
    printf("\n");
  }
  system ("PAUSE");
  return 0;
}
