//Kyle Cartechine
//COP 3223: Intro To C
//Assignment #1, Part B
//9-5-2009
//A program that predicts how much time
//a student should allow themselves to 
//find a parking spot at UCF.

#include <stdio.h>
#include <math.h>

int main()
{
    int t, g, a;
    float prksrch_time;
//FORMULA: Time (in minutes) = (12 - | 12 - t |)*g/a
//Time of Day =t, Parking Spots =a, Parking Permits Given =g

//Prompt for and gather user input
printf ("What hour will you be looking for parking on campus? ");
printf ("(up to 23)\n");

scanf ("%d", &t); 

printf ("How many spots are available this semester? ");
printf ("(up to 50000)\n");

scanf ("%d", &a);

printf ("How many permits were sold this semester? ");
printf ("(up to 60000)\n");

scanf ("%d", &g);

//Calculate the time using inputs
prksrch_time =  (12 - abs( 12 - t ))*g/a;

//Diplay the answer
printf ("You will have to search %1.2f minutes to find parking.\n\n", 
prksrch_time);

system ("PAUSE");

return 0;

}


