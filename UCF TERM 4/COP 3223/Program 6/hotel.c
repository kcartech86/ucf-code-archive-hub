// Arup Guha
// 10/22/01, used also 11/17/03 for COP3223, slightly edited on 4/12/06
// This example uses a structure that has an array inside of it.
#include <stdio.h>

#define SIZE 10
#define FULL_HOTEL -1

// A structure to keep track of room availability in a hotel.
struct hotel {
  int rooms[SIZE];
  int available;
};

void init_hotel(struct hotel *h);
void get_room(struct hotel *h);
int find_room(struct hotel *h);
void check_out(struct hotel *h);
void print_all(struct hotel *h);

int main() {
  struct hotel plaza;
  int ans,i;
  init_hotel(&plaza);

  // Asks the user to check out rooms.
  printf("Would you like check in(1), or check out(2) or quit(4)?");
  scanf("%d", &ans);

  // Execute the user's choices until they quit.
  while (ans != 4) {

    if (ans == 1) 
      get_room(&plaza);
    else if (ans == 2)
      check_out(&plaza);
    else if (ans == 3) 
      print_all(&plaza);

    // Get the user's next choice.
    printf("Would you like check in(1), or check out(2) or quit(3)?");
    scanf("%d", &ans);
  }

  return 0;
}

// Initializes an empty hotel structure.
void init_hotel(struct hotel *h) {

  int i;
  for (i=0;i<SIZE;i++)
    h->rooms[i] = 1;
  h->available = SIZE;
}

// Executes getting a room.
void get_room(struct hotel *h) {
  int room_no;

  // Finds a room number that is available.
  room_no = find_room(h);

  // Full hotel case.
  if (room_no == FULL_HOTEL)
    printf("Sorry, we are full.\n");

  // Adjust necessary quantities to fill the chosen room.
  else {
    printf("You will stay in room %d.\n", room_no);
    h->available--;
    h->rooms[room_no] = 0;
  }
}

// Returns the smallest available room number if any are avaiable. Returns
// FULL_HOTEL otherwise.
int find_room(struct hotel *h) {

  // Returns the first available room found.
  int i;
  for (i=0; i<SIZE; i++) {
    if (h->rooms[i] == 1)
      return i;
  }

  // Signifies a full hotel.
  return FULL_HOTEL;
}

// Allows the user to check out of the hotel pointed to by h.
void check_out(struct hotel *h) {

  int rm_num;

  // Get the room the user is staying in.
  printf("What room are you staying in?\n");
  scanf("%d", &rm_num);

  // Not a valid room.
  if (rm_num < 0 || rm_num >= SIZE || h->rooms[rm_num] == 1)
    printf("Sorry, that is not a valid room to check out of.\n");
  // Check them out.
  else {
    h->rooms[rm_num] = 1;
    h->available++;
  }
}

// Print out the rooms being occupied.
void print_all(struct hotel *h) {
  int i;
  printf("Here are the rooms being used: ");
  for (i=0; i<SIZE; i++) {
    if (h->rooms[i] == 0)
      printf("%d ", i);
  }
  printf("\n\n");
}
