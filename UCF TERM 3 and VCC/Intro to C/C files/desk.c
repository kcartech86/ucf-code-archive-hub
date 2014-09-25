// Arup Guha
// 9/7/05

// Example shown in lecture utilizing an if statement and swapping 
// variables. The problem solved is deciding whether or not a desk will
// fit in a room (with its sides parallel to the room) given the 
// dimensions of both.

#include <stdio.h>

int main() {

  int roomlen, roomwid;
  int desklen, deskwid;
  int temp;

  // Get the room and desk dimensions from the user.
  printf("Enter the length and width of the room.\n");
  scanf("%d%d", &roomlen, &roomwid);
  printf("Enter the length and width of the desk.\n");
  scanf("%d%d", &desklen, &deskwid);

  // Adjust room length to be greater than or equal to its width.
  if (roomlen < roomwid) {

    temp = roomlen;
    roomlen = roomwid;
    roomwid = temp;
  }

  // Adjust desk length to be greater than or equal to its width.
  if (desklen < deskwid) {

    temp = desklen;
    desklen = deskwid;
    deskwid = temp;
  }

  // Compare corresponding dimensions and output the result.
  if (deskwid <= roomwid && desklen <= roomlen)
    printf("The desk will fit in the room.\n");
  else
    printf("The desk will not fit in the room.\n");

  return 0;
}
