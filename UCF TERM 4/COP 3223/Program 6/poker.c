// Arup Guha
// 11/20/08
// Example that uses structs with arrays inside of them shown in COP 3223

#include <stdio.h>
#include <time.h>

#define NUMTIMES 10000

// Stores a card, the valid suits and kinds are listed below.
struct card {
    char suit;
    char kind;
};

// A deck stores up to 52 cards.
struct deck {
    struct card myDeck[52];
    int cardsLeft;       
};

// A poker hand has 5 cards in it.
struct hand {
    struct card myHand[5];       
};

// These specify the valid suits and kinds.
char suits[] = {'C', 'D', 'H', 'S'};
char kinds[] = {'2', '3', '4', '5', '6', '7', '8',
                '9', 'T', 'J', 'Q', 'K', 'A'};

void initDeck(struct deck *d);
void drawCard(struct deck *d, struct hand *h, int place);
void drawHand(struct deck *d, struct hand *h);
void printHand(struct hand *h);
int isFullHouse(struct hand *h);
int lookUp(char c);

int main() {
    
    struct deck Hoyle;
    struct hand myCards; 
    struct hand opponent;
    
    srand(time(0));
    
    int loop;
    
    // Keep track of our full houses.
    int myFullHouses = 0;
    int oppFullHouses = 0;
    
    // We want to play 10 times!
    for (loop = 0; loop < NUMTIMES; loop++) {
    
        // Initialize the deck.
        initDeck(&Hoyle);
        
        // Fill each hand from the deck.
        drawHand(&Hoyle, &myCards);
        drawHand(&Hoyle, &opponent);
    
        // Case that I get a full house.
        if (isFullHouse(&myCards)) {
            printf("I have a full house on turn %d.\n", loop);
            printf("my cards: ");
            printHand(&myCards);
            myFullHouses++;
        }
        
        // Case my opponent gets one.
        if (isFullHouse(&opponent)) {
            printf("My opponent has a full house on turn %d.\n", loop);
            printf("opposing cards: ");
            printHand(&opponent);
            oppFullHouses++;
        }
    }
    
    // Print out the end results.
    printf("I had %d full houses.\n", myFullHouses);
    printf("My opponent has %d full houses.\n", oppFullHouses);
    
    system("PAUSE");
    return 0;
    
    
}

// Initializes the deck pointed to by d to a regular deck of cards.
void initDeck(struct deck *d) {
     
    int i,j;
    
    // Go through each suit.
    for (i=0; i<4; i++) {
        
        // Go through each kind.
        for (j=0; j<13; j++) {
            
            // Just set up this card, both suit and kind.
            d->myDeck[13*i+j].suit = suits[i];
            d->myDeck[13*i+j].kind = kinds[j];
        }
    }
    
    // There are currently 52 cards left in this deck.
    d->cardsLeft = 52;
}

// Draws a random card from the deck pointed to by d and puts it
// into the hand pointed to by h into position place.
void drawCard(struct deck *d, struct hand *h, int place) {
    
    // Get the random card. 
    int size = d->cardsLeft;
    int randCard = rand()%size;
    
    // Copy the values into the hand.
    h->myHand[place].kind = d->myDeck[randCard].kind;
    h->myHand[place].suit = d->myDeck[randCard].suit;
    
    // Copy the last card over the one just removed.
    d->myDeck[randCard].kind = d->myDeck[size-1].kind;
    d->myDeck[randCard].suit = d->myDeck[size-1].suit;
    
    // Update the size of the deck.
    d->cardsLeft--;
}

// Draws all five cards from the deck pointed to by d into the
// hand pointed by h.
void drawHand(struct deck *d, struct hand *h) {

    int i;
    for (i=0; i<5; i++) {
        drawCard(d, h, i);
    }
}

// Just prints out a representation of the hand pointed to by h.
void printHand(struct hand *h) {

    int i;
    for (i=0; i<4; i++)
       printf("%c of %c, ", h->myHand[i].kind,
                            h->myHand[i].suit);
    printf("%c of %c\n", h->myHand[i].kind,
                            h->myHand[i].suit);
}

// Returns 1 if the hand pointed to by h is a full house, 0 otherwise.
int isFullHouse(struct hand *h) {

    int freq[13];
    int i;
    for (i=0; i<13; i++) freq[i] = 0;
    
    // Add one to the frequency counter of the correct card.
    for (i=0; i<5; i++)
        freq[lookUp(h->myHand[i].kind)]++;    
        
    int sum = 0;
    
    // Look for one two of a kind/
    for (i=0; i<13; i++)
        if (freq[i] == 2) {
            sum++;
            
            // We break when we see the first one, because I don't want to
            // count if there are two of them.
            break;
        }
    
    // There can only be one 3 of a kind, so no break is needed.
    for (i=0; i<13; i++)
        if (freq[i] == 3)
            sum++;
            
    // Only if we have both do we have a full house.
    return (sum == 2);
}

// Returns the index in the kinds array that stores c. This only works if
// c is a valid kind.
int lookUp(char c) {
    int i;
    for (i=0; i<13; i++)
        if (kinds[i] == c)
            return i;
}
