#include <stdio.h>
int main(){
    int n=10;
    int tab[n];
    int i;
    
    for ( i = 0; i < n; i++)
    {
        printf("entrez l'element numero %d\n",(i+1));
        scanf("%d",&tab[i]);
         }
 int max=tab[0];
 int indicemax=0;
        for (  i = 1; i < n; i++){
   
       if (max < tab[i])
       {
        max=tab[i];
        indicemax=i;
        
       }
       
}
 printf("le maximum est %d a la position %d",max,indicemax+1);
   

    
}