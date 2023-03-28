cc=gcc
cflags=-std=c99 -pedantic  -Wall -Wextra -Wvla 

SRC =$(wildcard src/*.c)
OBJ =$(SRC:.c=.o)

all :
	$(cc) $(cflags) $(SRC) -o myfind

clean :
	rm -rf *.o
