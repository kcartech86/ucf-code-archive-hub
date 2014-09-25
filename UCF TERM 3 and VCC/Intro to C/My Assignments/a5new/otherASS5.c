//For your fgross function, try resetting the values of pay and tax 
//by adding =0 to the variable declarations. Not sure if that's 
//the problem but it's worth a try! 



#include <stdio.h>
#include <string.h>
#define MAX_LEN 30
#define EMP_MAX_SIZE 20

struct employee {
char first[MAX_LEN];
char last[MAX_LEN];
double payperhr;
double gross;
double taxes;
double hours_in_week;
double netpay;
};

double ftime(int Hin,int Min,int Hout,int Mout);
void fgross(int numemp,struct employee *x);



int main() {

FILE *ifp,*ofp;
int i,j,k,found_it_at;
int numemp,numset,numrec;
int HrIN,MinIN,HrOUT,MinOUT;
double time,totaltime;
char first[MAX_LEN],last[MAX_LEN];
struct employee person[EMP_MAX_SIZE];


ifp=fopen("clock.txt","r");
ofp = fopen("w2.txt", "w");

fscanf(ifp,"%d",&numemp);

for(i=0;i<numemp;i++)
fscanf(ifp,"%s %s %lf",person[i].first,person[i].last,&person[i].payperhr);

fscanf(ifp,"%d",&numset);

for(i=0;i<numset;i++){
fscanf(ifp,"%d",&numrec);
for(j=0;j<numrec;j++){
fscanf(ifp,"%s %s",last,first);
for(k=0;k<numemp;k++){
if(strcmp(person[k].first,first)==0&&strcmp(person[k].last,last)==0)
found_it_at=k;
}

fscanf(ifp,"%d %d %d %d",&HrIN,&MinIN,&HrOUT,&MinOUT);



person[found_it_at].hours_in_week+=ftime(HrIN,MinIN,HrOUT,MinOUT);


if(j==numrec-1){ 

fgross(numemp,person);
} 




}


}




fclose(ifp);

for(i=0;i<numemp;i++)
person[i].netpay=person[i].gross-person[i].taxes;

for(i=0;i<numemp;i++)
printf("\n%s \n%s \n%lf \n%lf\n %lf\n \n%lf \n%lf",person[i].first,person[i].last,person[i].payperhr,person[i].gross,person[i].taxes,person[i].hours_in_week,person[i].netpay);

system("pause");
return 0;

}


double ftime(int Hin,int Min,int Hout,int Mout) {

double time;
double hours,minutes;

hours=Hout-Hin;

if(Mout<Min) {
hours-=1;
minutes=(60-Min)+Mout;
}

else 
minutes=Mout-Min; 

time=hours+(minutes/60);

return time;
}

void fgross(int numemp, struct employee *x) {

int i;
double pay =0 ;
double tax =0 ;

for(i=0;i<numemp;i++){

if(x[i].hours_in_week<=40) {
pay=x[i].hours_in_week*x[i].payperhr;
tax=(0.1*pay);
}
else {
pay=(x[i].hours_in_week*x[i].payperhr)+((x[i].hours_in_week-40)*1.5*x[i].payperhr);
tax=0.1*(x[i].hours_in_week*x[i].payperhr)+.2*((x[i].hours_in_week-40)*1.5*x[i].payperhr);
}

x[i].gross+=pay;
x[i].taxes+=tax;

x[i].hours_in_week=0;
} 

}
