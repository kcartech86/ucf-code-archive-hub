//Put these two lines immediately before the definitions of numRows and numcols
int** temppicx, temppicy;
int**  img,sobelout;




//Put these where you are processing option 3 (in the main program).

        sobelout= setImage();

        temppicx= setImage();
        temppicy= setImage();

        sobelfunc(img,sobelout,temppicx,temppicy); 

        

        printf("Enter image filename for output: ");
        scanf("%s", fileName);

        writeoutpic(fileName,sobelout);

