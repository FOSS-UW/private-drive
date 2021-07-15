#include <stdio.h>
#include <stdlib.h>
#include <sys/stat.h>
#include <string.h>

//djb2
unsigned long hash(unsigned char*);

int user_init();
//int comm_loop(); to be implemented

int main(void) {
    if (user_init() == -1) {
        fprintf(stderr, "Error initializing user. Exiting.\n");
        exit(1);
    }

    exit(0);
}

unsigned long hash(unsigned char *str)
{
    unsigned long hash = 5381;
    int c;

    while (c = *str++)
        hash = ((hash << 5) + hash) + c; /* hash * 33 + c */

    return hash;
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

    char usr_dir[72] = "../public/";
    strcat(usr_dir, user);

    int status = mkdir(usr_dir, S_IRUSR);
    if (status == -1) {
        return -1;
    }

    FILE* fp = fopen(".user.rc", "w");
    if (fp == NULL) {
        return -1;
    }
    fprintf(fp, "%lu %lu\n", hash(user), hash(pass));
    fclose(fp);

	printf("The root user has been initialized."
		   " Enjoy your Private Drive.\n");

    return 0;
}
