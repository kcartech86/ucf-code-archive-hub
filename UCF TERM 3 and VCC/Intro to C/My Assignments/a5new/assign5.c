//Kyle Cartechine
//Assignment 5
//Program that read structures of employee data
//and produces tax forms from that data

#include<stdio.h>
#include<stdlib.h>
#include <string.h>

#define MAX_LEN 30
#define MAX_EMP 20

struct employee {
  char first[MAX_LEN];
  char last[MAX_LEN];
  double payperhr;
  double gross;
  double taxes;
  double hours_in_week;
}

double ftime(int Hin,int Min,int Hout,int Mout);
void ftotalpay(int num_emp,struct employee *x);

int main()

{
 FILE *ifp,*ofp;
 struct employee worker[MAX_EMP];
 char first[MAX_LEN],last[MAX_LEN];
 int HrIN,MinIN,HrOUT,MinOUT;
 double ttl_time;
 int i,j,k,found_here;
 int num_emp,num_set,num_rec;
  
 
 ifp=fopen("clock.txt","r");
 ofp = fopen("w2.txt", "w");

 fscanf(ifp,"%d",&num_emp);

 for(i=0;i<num_emp;i++)
   fscanf(ifp,"%s %s %lf",worker[i].first,worker[i].last,&worker[i].payperhr);
   
 fscanf(ifp,"%d",&num_set);

 for(i=0;i<num_set;i++)
  {
   fscanf(ifp,"%d",&num_rec);
     
     for(j=0;j<num_rec;j++)
     {
       fscanf(ifp,"%s %s",last,first);
 
 for(k=0;k<num_emp;k++)
 {
   if(strcmp(worker[k].first,first)==0 && strcmp(worker[k].last,last)==0)
   found_here = k;
 }

 fscanf(ifp,"%d %d %d %d",&HrIN,&MinIN,&HrOUT,&MinOUT);
 
 worker[found_here].hours_in_week+=ftotal_time(HrIN,MinIN,HrOUT,MinOUT);

 if(j ==num_rec-1)
 {
   ftotalpay(num_emp,&worker);
 } 
  }
     }

 fclose(ifp);

 for(i=0; i<num_emp; i++)
   [i].netpay = worker[i].gross-worker[i].taxes;
   

 for(i=0;i<num_emp;i++)
   printf("\n%s \n%s \n%lf \n%lf\n %lf\n \n%lf \n%lf",worker[i].first,worker[i].last,worker[i].payperhr,worker[i].gross,worker[i].taxes,worker[i].hours_in_week,worker[i].netpay);

system("pause");
return 0;

}

void ftotalpay(int num_emp, struct employee *x) 
{
  int i;
  double pay = 0;
  double tax = 0;

  for(i=0;i<num_emp;i++)
  {
   if(x[i].hours_in_week<=40) 
   {
     pay=x[i].hours_in_week*x[i].payperhr;
     tax=(0.1*pay);
   }
  
   else 
   {
    pay=(x[i].hours_in_week*x[i].payperhr) + ((x[i].hours_in_week-40)*1.5*x[i].payperhr);
    tax=0.1*(x[i].hours_in_week*x[i].payperhr) + .2*((x[i].hours_in_week-40)*1.5*x[i].payperhr);
   }

  x[i].gross+= pay;
  x[i].taxes+= tax;

  x[i].hours_in_week = 0;
  } 
}

/*double double ftime(int Hin,int Min,int Hout,int Mout);

{
  double ttl_time;
  double hours,minutes;

  hours = HrOut - HrIn;

  if(MinOut < MinIn) 
  {
   hours-= 1;
   minutes = ((60-MinIn) + MinOut) ;
  }

  else 
   minutes = MinOut - MinIn; 

  ttl_time = hours + (minutes/60);

  return ttl_time;
}
*/
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
