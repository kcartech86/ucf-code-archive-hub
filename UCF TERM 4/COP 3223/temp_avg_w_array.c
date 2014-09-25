#include <stdio.h>

#define NUMYEARS 15
#define STARTYEAR 1995

int amin() 
{
    FILE* ifp;
    
    ifp = fopen("FLORLAND.txt", "r");
    
    int i; month, day, year;
    double temp;
    double sumtemp [NUMYEARS];
    int numtemps [NUMTEMPS];
    
    for(i=0; i<NUMYEARS; i++){
             sumtemp[i] = 0;
             numtemps[i] = 0;
    }
    
    fscanf(ifp, "%d", &month);
    
    while (month != -1)  {
          fscanf(ifp, "%d%d%lf", &day, &year, &temp);
          sumtemp[year-STARTYEAR] = sumtemp[year-STARTYEAR] + temp;
          numtemps[year-STARTYEAR]++;
          fscanf(ifp, "%d", &month);
    }
    for (i=0; i<NUMYEARS; i++)
        printf("%d\t%d\t%.2lf\n", i+STARTYEAR, numtemps[i], sumtemp[i]/numtemps[i]);
    
    
    fclose(ifp);
    
    system ("PAUSE");
    return 0;

}
