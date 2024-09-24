#include <stdio.h>
int main(){
    int s=0;
    int i,n;
    printf("entrez le nombre n pur faire la somme:\n");
    scanf("%d",&n);
    for ( i = 0; i <= n; i++)
    {
        s=s+i;
    }
    
    printf("la somme des nombres jusqu a %d est: %d",n,s);
}