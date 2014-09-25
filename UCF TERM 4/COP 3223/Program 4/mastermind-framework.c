// Arup Guha
// 3/3/2010
// Framework for COP 3223 Spring 2010 Program #4

#include <stdio.h>
#include <time.h>

// Constants used in the program.
#define NUM_PEGS 4
#define NUM_COLORS 6
#define MAX_TURNS 10
#define MARKED_BOARD -1
#define MARKED_ANSWER -2

// Functions used.
void fillBoard(int board[]);
int numPerfectMatches(int board[], int answer[]);
void getUserGuess(int board[]);
void copyArray(int dest[], int source[], int length);
void markOutCorrect(int board[], int answer[]);
int numWrongPlaceMatches(int board[], int answer[]);
void greeting();
void printArray(int array[], int length);
void printWinner(int num_turns, int num_seconds);

int main() {
    
    // Seed the random number generator.
    srand(time(0));
    
    // Stores the real answer and the user's board, respectively.
    int answer[NUM_PEGS];
    int board[NUM_PEGS];
    
    // Set everything up.
    int num_turns = 0;    
    fillBoard(answer);
    greeting();
    int start = time(0);
    
    // Loop through each turn, ending at 10 moves or a win.
    do {
        
        // Read in the user's guess.
        getUserGuess(board);
        
        // Figure out the number of matches.
        int num_perfect = numPerfectMatches(board, answer);
        int num_imperfect = numWrongPlaceMatches(board, answer);
        
        // Update for this turn.
        printf("You have %d perfect matches and %d imperfect matches.\n", num_perfect, num_imperfect);
        num_turns++;
        
    } while (num_turns < MAX_TURNS && numPerfectMatches(board, answer) < NUM_PEGS);
    
    // Winning case.
    if (numPerfectMatches(board, answer) == NUM_PEGS) {
        int end = time(0);
        printWinner(num_turns, end-start);
    }
    
    // Losing case.
    else {
        printf("Sorry, you have exceeded the maximum number of turns. You lose.\n");
        printf("Here is the winning board: ");
        printArray(answer, NUM_PEGS);
        printf("\n");
    }
    
    system("PAUSE");
    return 0;
}

// Pre-conditions: board is uninitialized and of size NUM_PEGS.
// Post-conditions: board will be filled in randomly with values ranging from
//                  0 to NUM_COLORS-1.
void fillBoard(int board[]) {

}

// Pre-conditions: board and answer are of length NUM_PEGS and store the player's
//                 guess and the correct board, respectively.
// Post-conditions: returns the number of pegs that match at the correct spots.
int numPerfectMatches(int board[], int answer[]) {
   
}

// Pre-conditions: None.
// Post-conditions: Prints out a greeting for the beginning of the game.
void greeting() {
   
}

// Pre-conditions: board is of length NUM_PEGS
// Post-conditions: NUM_PEGS integers are read in from the user and stored in
//                  board in the natural order.
void getUserGuess(int board[]) {
 
}

// Pre-conditions: board and answer are of length NUM_PEGS and store the player's
//                 guess and the correct board, respectively.
// Post-conditions: returns the number of pegs that match at INCORRECT spots
//                  after "erasing" those pegs that match at correct spots.
int numWrongPlaceMatches(int board[], int answer[]) {
       
    // Create temporary copies of both boards, since we'll need to make changes
    // to each during this process and we don't want to ruin the original
    // state of either board.
   
    
    // Mark out the spots on the board and answer that match up perfectly.

    
    // Go through the board and try to match each peg on the board to
    // a spot on the answer. Hint: A double loop is needed.
    // Note: Remember to "mark" an answer when a match is found.
    
}

// Pre-conditions: dest and source are both have the given length.
// Post-conditions: All values from source are copied into the corresponding
//                  locations in dest.
void copyArray(int dest[], int source[], int length) {
    
}

// Pre-conditions: board and answer are of length NUM_PEGS.
// Post-conditions: For each corresponding slot that matches in both boards,
//                  the slots are changed to equal each board's appropriate
//                  marker.
void markOutCorrect(int board[], int answer[]) {
     
}

// Pre-conditions: array has the given length.
// Post-conditions: each value of array is printed, separated by a space.
void printArray(int array[], int length) {

}

// Pre-conditions: num_turns is the number of turns it took the winner to win,
//                 and num_seconds is the total amount of time they took to
//                 win in seconds.
// Post-conditions: A winning message is printed stating the number of moves
//                  and amount of time taken to win in M:SS format.
void printWinner(int num_turns, int num_seconds) {
     
}
    
