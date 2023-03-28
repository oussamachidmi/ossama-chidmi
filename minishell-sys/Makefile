CC = gcc
CFLAGS = -Wall -Wextra -Werror -pedantic -std=c99 -Wvla -fsanitize=address -g -D_DEFAULT_SOURCE

SRCDIR = src
SOURCES = $(wildcard $(SRCDIR)/*.c)
OBJECTS = $(SOURCES:.c=.o)

TARGET = minishell

$(TARGET): $(OBJECTS)
	$(CC) $(CFLAGS) $^ -o $@

$(SRCDIR)/%.o: $(SRCDIR)/%.c
	$(CC) $(CFLAGS) -c $< -o $@

.PHONY: clean

clean:
	rm -f $(OBJECTS) $(TARGET)