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

struct doll {

  char name[20];
  double price;
};

struct toys {
  struct block rubix;
  struct doll barbie;
};

void setup_block(struct block *b);
void print_block(struct block b);
void setup_doll(struct doll *d);
void print_doll(struct doll d);

void init(struct toys *t);
void print_all(struct toys t);

int main() {

  struct toys mine;
  init(&mine);
  print_all(mine);
  return 0;
}

// Post-condition: b will be initialized with information entered by the
//                 user.
void setup_block(struct block *b) {

  printf("Enter number, letter & color\n");
  scanf("%d %c %s", &(b->number), &(b->letter), &(b->color));

}

// Post-condition: b's components will be printed out.
void print_block(struct block b) {
  printf("Color: %s, Number: %d, Letter: %c\n", b.color, b.number,
	  b.letter);
}


// Post-condition: b will be initialized with information entered by the
//                 user.
void setup_doll(struct doll *d) {

  printf("Enter the name and cost of the doll\n");
  scanf("%s %lf", &(d->name), &(d->price));

}

// Post-condition: b's components will be printed out.
void print_doll(struct doll d) {
  printf("Name: %s, Price: %lf\n", d.name, d.price);
}

void init(struct toys *t) {

  setup_block(&(t->rubix));
  setup_doll(&(t->barbie));

}

void print_all(struct toys t) {

  print_block(t.rubix);
  print_doll(t.barbie);
}
