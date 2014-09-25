// Arup Guha
// 9/11/09
// Solution to Fall 2009 COP 3223 Program 1B: Parking Calculator
// This program calculates how long it will take to park given the time of day.

int main() {
    
    int hour, openSpots, numPermits;
    
    // Get the input from the user.
    printf("What hour are you looking for parking?\n");
    scanf("%d", &hour);
    
    printf("How many spots are available this semester?\n");
    scanf("%d", &openSpots);
    
    printf("How many parking permits were given this semester?\n");
    scanf("%d", &numPermits);
    
    // Implement the formula given in the assignment. The most important
    // part is casting the first part of the expression to a double, so that
    // a real number division is done.
    double numMin = (double)(12 - abs(12 - hour))*numPermits/openSpots;
 
    // Display the result.   
    printf("You will have to wait %.2lf minutes to find parking.\n", numMin);
    
    system("PAUSE");
    return 0;
}
