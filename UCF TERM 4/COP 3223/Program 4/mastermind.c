/*Kyle Cartechine*/

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
     int i = 0; 
     for (i; i<NUM_PEGS; i++){
            board[i] = rand()%NUM_COLORS; 
    // To test the program or cheat, use the printf on next line
    // printf("%d  ", board[i]);    
     }
}

// Pre-conditions: board and answer are of length NUM_PEGS and store the player's
//                 guess and the correct board, respectively.
// Post-conditions: returns the number of pegs that match at the correct spots.
int numPerfectMatches(int board[], int answer[]) {
    int j = 0, matchingPegs = 0;
    for (j; j < NUM_PEGS; j++){
        if (board[j] == answer[j]){
            matchingPegs ++;
        }
    }
    return matchingPegs;   
}

// Pre-conditions: None.
// Post-conditions: Prints out a greeting for the beginning of the game.
void greeting() {
     printf("Welcome to MasterMind!!! \n\n");
     printf("At each turn, you will enter your guess for the playing board.\n");
     printf("A valid guess has 4 values in between 0 and 5. \n");
     printf("Each guess will have each number within the guess separated ");
     printf("by a space. \n");
     printf("When you are ready, enter your first guess. \n");
     printf ("From that point on, you will be told how many perfect and imperfect \n");
     printf ("matches you have. \n");
     printf ("After this message, you should guess again. \n");
     printf ("You have 10 chances, good luck! \n\n");   
}

// Pre-conditions: board is of length NUM_PEGS
// Post-conditions: NUM_PEGS integers are read in from the user and stored in
//                  board in the natural order.
void getUserGuess(int board[]) {
     int k =0;
     for(k; k < NUM_PEGS; k++){
         scanf("%d", &board[k]);    
     }
}

// Pre-conditions: board and answer are of length NUM_PEGS and store the player's
//                 guess and the correct board, respectively.
// Post-conditions: returns the number of pegs that match at INCORRECT spots
//                  after "erasing" those pegs that match at correct spots.
int numWrongPlaceMatches(int board[], int answer[]) {       
    // Create temporary copies of both boards, since we'll need to make changes
    // to each during this process and we don't want to ruin the original
    // state of either board.
    int answer2[NUM_PEGS];
    int board2[NUM_PEGS];
    copyArray( board2, board, NUM_PEGS);
    copyArray( answer2, answer, NUM_PEGS);

    // Mark out the spots on the board and answer that match up perfectly.
    markOutCorrect(board2, answer2);
    
    // Go through the board and try to match each peg on the board to
    // a spot on the answer. Hint: A double loop is needed.
    // Note: Remember to "mark" an answer when a match is found.
    int j, k, posMatch = 0;
    for(j=0; j < NUM_PEGS; j++){
           for(k=0; k<NUM_PEGS; k++){
               if(answer2[j] == board2[k]){
               posMatch++;    
               }
           }
    }
    return posMatch;
    
}

// Pre-conditions: dest and source are both have the given length.
// Post-conditions: All values from source are copied into the corresponding
//                  locations in dest.
void copyArray(int dest[], int source[], int length) {
     int i =0;
     for(i; i < length; i++){
         dest[i] = source[i];
     }
    
}

// Pre-conditions: board and answer are of length NUM_PEGS.
// Post-conditions: For each corresponding slot that matches in both boards,
//                  the slots are changed to equal each board's appropriate
//                  marker.
void markOutCorrect(int board[], int answer[]) {
     int j;
     for(j=0; j < NUM_PEGS; j++){
        if( answer[j] == board[j]){
            answer[j] = MARKED_ANSWER;
            board[j] = MARKED_BOARD;
        }
     }     
}

// Pre-conditions: array has the given length.
// Post-conditions: each value of array is printed, separated by a space.
void printArray(int array[], int length) {
     
     int k;
     for (k=0; k < length; k++){
         printf("%d ", array[k]);
     }
         

}

// Pre-conditions: num_turns is the number of turns it took the winner to win,
//                 and num_seconds is the total amount of time they took to
//                 win in seconds.
// Post-conditions: A winning message is printed stating the number of moves
//                  and amount of time taken to win in M:SS format.
void printWinner(int num_turns, int num_seconds) {
     int minute = 0, second = 0;
     if( num_turns <=MAX_TURNS ){
         printf("You have won the game in %d turns ", num_turns);
         if( num_seconds>60){
             second = num_seconds%60;
             minute = (num_seconds - second)/60;
             printf("and %02d:%02d!!!\n", minute, second);
         }
         else
             printf("and 0:%02d!!!\n", num_seconds);
     }         
     
}
    


