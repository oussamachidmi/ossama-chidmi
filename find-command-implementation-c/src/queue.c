#include "queue.h"

typedef struct QueueItem QueueItem;
struct QueueItem
{
    void *value;
    QueueItem *next;
};

struct Queue
{
    QueueItem *head;
    QueueItem *tail;
    unsigned int size;
};

Queue *queue_create()
{
    Queue *queue = malloc(sizeof(Queue));
    assert(queue);
    queue->head = queue->tail = NULL;
    queue->size = 0;
    return (queue);
}

void queue_delete(Queue **queue)
{
    assert(queue);
    assert(*queue);
    QueueItem *toDelete = (*queue)->head;
    while (toDelete)
    {
        QueueItem *f = toDelete;
        toDelete = toDelete->next;
        free(f);
    }
    free(*queue);
    *queue = NULL;
}

void queue_push(Queue *queue, void *v)
{
    QueueItem **insert_at =
        (queue->size ? &(queue->tail->next) : &(queue->head));
    QueueItem *new = malloc(sizeof(QueueItem));
    assert(new);
    new->value = v;
    new->next = NULL;
    *insert_at = new;
    queue->tail = new;
    ++(queue->size);
}

bool queue_isempty(Queue *queue)
{
    assert(queue);
    return (queue->size == 0);
}

static void assert_notempty(Queue *queue)
{
    assert(!queue_isempty(queue));
}

void queue_pop(Queue *queue)
{
    assert_notempty(queue);
    QueueItem *old = queue->head;
    queue->head = queue->head->next;
    queue->size--;
    free(old);
}

void *queue_top(Queue *queue)
{
    assert_notempty(queue);
    return (queue->head->value);
}

unsigned int queue_size(Queue *queue)
{
    assert(queue);
    return queue->size;
}
