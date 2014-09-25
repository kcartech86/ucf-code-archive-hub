// Arup Guha
// 10/17/05
// COP 3223 Class Example illustrating how to read from a file and how to
// write to a file.
#include <stdio.h>

int main() {

  FILE *ifp, *ofp;
  int numgirls, index, numboxes, stars;
  char name[20];

  // Open both files.
  ifp = fopen("cookie.txt","r");
  ofp = fopen("cookiegraph.txt","w");

  // Read in the number of girls in the troop and print this to the output
  // file.
  fscanf(ifp, "%d", &numgirls);
  fprintf(ofp, "%d\n", numgirls);

  // Read in and process each line from the input file.
  for (index=0; index<numgirls; index++) {

    // Read in and print out the current girl's name.
    fscanf(ifp, "%s", &name);
    fprintf(ofp, "%s\t", name);

    // Read in the number of boxes they have sold.
    fscanf(ifp, "%d", &numboxes);

    // Print out the appropriate number of stars on this line.
    for (stars=0; stars<numboxes; stars++)
      fprintf(ofp, "*");
    fprintf(ofp,"\n");
  }

  // Close both the input and output files.
  fclose(ifp);
  fclose(ofp);

  return 0;
}
