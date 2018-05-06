#include <stdio.h>

void secretFunction(){
    printf("Congratulations!\n");
    printf("You have entered in the secret function!\n");
}

void brokenFunction(){
    char buffer[20];
    printf("Enter some text:\n");
    scanf("%s", buffer);
    printf("You entered: %s\n", buffer);    
}

int main(){
    brokenFunction();
    return 0;
}
