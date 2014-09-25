// Arup Guha
// 10/22/01, reused 11/17/03 for COP3223.
// Program Description: A short example to illustrate the use of structs.
//                      The struct created is a set of blocks. Each block
//                      is initialized and then compared with each other
//                      to see if there are any duplicates.
#include <stdio.h>

struct block {

  int number;
  char letter;
  char color[15];
};

void setup(struct block *b);
void print_block(struct block b);
int equal(struct block a, struct block b);

#define SIZE	3

int main() {
  int i, j;
  struct block my_set[SIZE];

  // Initialize all blocks
  for (i=0; i<SIZE; i++) {
    setup(&my_set[i]);
    print_block(my_set[i]);
    printf("In main: %d %c %s\n", my_set[i].number, my_set[i].letter,
  				  my_set[i].color);

  }

  // See if any pair are equal
  for (i=0; i<SIZE; i++) {
    for (j=i+1; j<SIZE; j++) {
      if (equal(my_set[i],my_set[j]))
        printf("Blocks %d and %d are identical.\n",i,j); 
    }
  }

  for (i=0;i<SIZE; i++)
    print_block(my_set[i]);
}

// Post-condition: b will be initialized with information entered by the
//                 user.
void setup(struct block *b) {

  printf("Enter number, letter & color\n");
  scanf("%d %c %s", &(b->number), &(b->letter), &(b->color));

}

// Post-condition: b's components will be printed out.
void print_block(struct block b) {
  strcpy(b.color, "Yellow");
  printf("In func: %d %c %s\n", b.number, b.letter, b.color);
}

// Post-condition: Will return 1 if each corresponding component of blocks
//                 a and b are equal, 0 otherwise.
int equal(struct block a, struct block b) {

  if (a.number == b.number && a.letter  == b.letter && 
      !strcmp(a.color, b.color))
    return 1;
  else
    return 0;
}
