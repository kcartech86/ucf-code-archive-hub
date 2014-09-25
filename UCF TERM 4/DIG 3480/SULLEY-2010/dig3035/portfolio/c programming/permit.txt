//Kyle Cartechine
//COP 3223: Intro To C
//Assignment #2, Part A Parking Permits
//DUE 10-6-2009

//A program where the user enters info about their college 
//role and parking permit type they would like to purchase, in order to 
//be provided with an output of how much their permit will cost.

#include <stdio.h>

int main()

{
    //Because there are two categories of data (cost of hangtag or
    //cost of sticker) two arrays need to be declared for each category.
    //Then set the data for each array. You also need variables to store
    //user inputs for their role(val) and tag type.
    
    int val, tagtype, sticker[3], hangtag[3];
            
    sticker[0]=100;
    sticker[1]=200;
    sticker[2]=300;
    
    hangtag[0]=150;
    hangtag[1]=300;
    hangtag[2]=450;
    
    //Ask the user for their collegiate status and permit type.
     
    printf ("What is your collegiate status? (1=student, ");
    printf ("2=staff, 3=faculty)\n");
    
    scanf ("%d", &val);
    
    printf ("What type of tag do you want? (1=sticker, 2=hangtag)\n");
    
    scanf ("%d", &tagtype);
    
    //Determine the cost of the user's permit based on there input and 
    //print the cost from the data stored in your two arrays.
    
    if(tagtype==1 && val==1) 
       printf ("You need to pay $%d for your parking permit.\n", sticker[0]);
       else if(tagtype==1 && val==2)
       printf ("You need to pay $%d for your parking permit.\n", sticker[1]);
       else if(tagtype==1 && val==3)
       printf ("You need to pay $%d for your parking permit.\n", sticker[2]);
      
       
       else if (tagtype==2 && val==1) 
          printf ("You need to pay $%d for your parking permit.\n", hangtag[0]);
          else if(tagtype==2 && val==2)
          printf ("You need to pay $%d for your parking permit.\n", hangtag[1]);
          else if(tagtype==2 && val==3)
          printf ("You need to pay $%d for your parking permit.\n", hangtag[2]);
           
    
    system ("PAUSE");
    
    return 0;
    
}
