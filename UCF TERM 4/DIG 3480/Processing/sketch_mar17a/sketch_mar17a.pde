/*start w/ comma delimited string of grades
  Sum all the numbers together in that string
  Output " My total grade so far is: #number# to the processing console window
  */

String grades = "85,76,60,350,88,99";
int[] gradesArray = int(split(grades, ','));

int i;
int totalGrades = 0;
int grade;

for(i=0; i<6; i++)
{
  grade = gradesArray[i];
  totalGrades += grade; 
}

println("My total grade so far is: "+ totalGrades );

