#include <stdio.h>
int main(){
    int nombre;
    
    do
    {
      printf("entrez un nombre compris en 10 et 30\n");
      scanf("%d",&nombre);
      if (nombre > 20)
      {
        printf("plus petit\n");
      }
      else if (nombre < 10)
      {
       printf("plus grand\n");
      }
      else
      {
       printf("bravo , le nombre saisi est %d",nombre);
      }
      
      
        
    } while ( (nombre<10) || (nombre >20) );
    
}