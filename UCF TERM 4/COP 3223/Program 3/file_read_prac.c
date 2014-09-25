#include <stdio.h>

int main()  {
    
    FILE* ifp;
    int n;
    
    ifp = fopen("input.txt", "r");
    
    fscanf(ifp, "%d", &n);
    
    int i;
    for (i=0; i < n; i++) {
        int num;
        fscanf(ifp, "%d", &num);
        printf("Just read in %d\n", num);
        
        }
        
     fclose(ifp);   
     system("PAUSE");
     return 0;
     
     } 
