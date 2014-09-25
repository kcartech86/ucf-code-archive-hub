//Kyle Cartechine

//Diamond problem PT2num6
//Prompt to read in one positive integer and produce a diamond with same 
//height and width

#include <stdio.h>
int main()

{
    int i,c, Wstar=1, height, width;
    
    scanf("Enter value: %d\n", &height);
    height= width;
    
    /*this loop is for blanks*/
    for (i = 1; i<= height; i++ )
    {   
     if ((i<= 1+height/2))
     Wstar+= 2;
     else Wstar -=2;
    }
    
    for (c= 0; c < (height/2)- (Wstar/2);c++)
        printf(" ");
        
        
    /*this loop is for stars */
    for (c=0 ;c<Wstar; c++ )
    printf("*"); 
    
    printf("\n");
    
 system ("PAUSE");
 return 0;   
}
