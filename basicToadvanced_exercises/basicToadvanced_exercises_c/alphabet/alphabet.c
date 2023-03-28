#include<stdio.h>
#include<err.h>
#include<errno.h>
#include<assert.h>



int main()
{
char i='a';
for (i='a';i<='z';i++){
      putchar(i);
      putchar(" ");
}
putchar("\n");
return 0;
}
