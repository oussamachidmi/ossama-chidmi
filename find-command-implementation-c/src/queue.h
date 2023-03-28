
#ifndef queue_h
#define queue_h
#include <stdio.h>
#include <stdbool.h>
#include <stdlib.h>
#include <assert.h>

#include "err_handle.h"

typedef struct Queue Queue;
Queue *queue_create();
void queue_delete(Queue **queue);
void queue_push(Queue *queue, void *udata);
void queue_pop(Queue *queue);
void *queue_top(Queue *queue);
bool queue_isempty(Queue *queue);
unsigned int queue_size(Queue *queue);
void queue_dump(FILE *f, Queue *queue, void(*dumpfunction)(FILE *f, void *e));

#endif
