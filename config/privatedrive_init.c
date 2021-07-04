#include <stdio.h>
#include <stdlib.h>
#include <sys/stat.h>
#include <string.h>

int user_init();
//int comm_loop(); to be implemented

int main(void) {
    if (user_init() == -1) {
        fprintf(stderr, "Error initializing user. Exiting.\n");
        exit(1);
    }

    exit(0);
}

int user_init() {
    char user[50],
         pass[50];
    printf("Welcome to Private Drive. Let's set up a root account."
            "\nUser: ");
    fgets(user, 50, stdin);
    printf("Password: ");
    fgets(pass, 50, stdin);

    user[strcspn(user, "\n")] = 0;
    pass[strcspn(pass, "\n")] = 0;

    FILE* fp = fopen("user.rc", "w");
    if (fp == NULL) {
        return -1;
    }
    fprintf(fp, "root:\n\t%s %s\n", user, pass);
    fclose(fp);

    return 0;
}