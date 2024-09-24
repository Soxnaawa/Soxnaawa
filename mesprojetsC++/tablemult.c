#include <stdio.h>
int main(){
    int table;
    printf("entrez la table de multiplication que vous souhaitez avoir:");
    scanf("%d",&table);
    printf("voici la table %d :\n", table);
     for (int i = 1; i <= 10; i++){
       
         printf("%d  * %d = %d\n",table,i,( table * i ));
       }
       

        
        
    }
    



