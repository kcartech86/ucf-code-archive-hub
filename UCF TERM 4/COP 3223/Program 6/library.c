//Kyle Cartechine
//COP 3223 Section 3
//Program 6
//Problem: Personal Library

/* This program allows the user to manage a collection of books. Functions of
   program include:
          1) Add a book to the collection 
          2) Delete a book from the collection
          3) Search for a book from the collection
          4) List all of the books by a particular author from the collection
          5) List all of the books of a particular subject from the collection
*/

#include<stdio.h>

#define MAX_LENGTH 40
#define MAX_BOOKS 1000

struct book {
    char title[MAX_LENGTH];
    char author[MAX_LENGTH];
    char subject[MAX_LENGTH];
};

struct library {
    struct book collection[MAX_BOOKS];
    int num_books;
};

void addbook();
void removebook();
void booksearch();
void authorlist();
void subjectlist();

void copybook(struct book* dest, struct book* source);


int main()
{
    
    
    
    
    
    system ("pause");
    return 0;
}

void addbook();


void removebook();


void booksearch();


void authorlist();


void subjectlist();


void copybook(struct book* dest, struct book* source);
