//Kyle Cartechine
//COP 3223 Section 3
//Program 2
//Problem A: Land Enclosure 

#include <stdio.h>

int main()

{
    //Declare all scanned variables and calculated values to be printed
    double area, side_1, side_2, total_perim;
    int ratio_len, ratio_wid;
    
    //Ask the user for area they want to fence in, scan in user input
    printf("What area do you wish to enlose with fence in square feet?\n");
    scanf("%lf", &area);
    
    //Error check to make sure they don't enter a value over 100,000,000
    if(area > 100000000)
            {
             printf("The area is limited to less than 100000000.\n");
             printf ("Please enter a smaller amount:\n");
             scanf("%lf", &area);
            }
            
    //Ask for ratio values of fence, scan in user inputs        
    printf("What is the ratio of length to width of your desired enclosure?\n");    
    scanf("%d %d", &ratio_len, &ratio_wid);
    
    //Error check to make sure ratio values don't exceed 100
    if ( (ratio_len > 100) || (ratio_wid > 100) )
            {
             printf("One ratio value is too large. ");
             printf ("Please enter an amount less than 100 for both dimensions:\n");
             scanf("%d %d", &ratio_len, &ratio_wid);
            }
    
    //Run calculations to dertimine actual fence dimensions and perimeter length
    side_2 = sqrt( (area)/(ratio_len*ratio_wid) );
    side_1 = area/side_2;
    total_perim = 2*(side_1 + side_2);
    
    //Print the calculations for end user to see
    printf("Your enclosure has dimensions");
    printf(" %.2lf feet by %.2lf feet\n", side_1, side_2);
    printf("You will need %.2lf feet of fence total.\n", total_perim); 
    
    system("pause");
    return 0;
    
}
