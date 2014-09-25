#include <stdio.h>

int amin() 
{
    FILE* ifp;
    
    ifp = fopen("FLORLAND.txt", "r");
    
    int month, day, year;
    double temp;
    double sumtemp = 0;
    int numtemps = 0;
    
    fscanf(ifp, "%d", &month);
    
    while (month != -1)  {
          fscanf(ifp, "%d%d%lf", &day, &year, &temp);
          sumtemp = sumtemp + temp;
          numtemps++;
          fscanf(ifp, "%d", &month);
    }
    printf("Data for %d days. \n", numtemps);
    printf("Avg. temp is %.2lf \n", sumtemp/numtemps);
    fclose(ifp);
    
    system ("PAUSE");
    return 0;

}
