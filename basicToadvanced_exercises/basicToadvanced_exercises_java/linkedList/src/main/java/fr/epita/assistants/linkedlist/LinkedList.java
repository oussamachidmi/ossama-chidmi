package fr.epita.assistants.linkedlist;

public class LinkedList<T extends Comparable<T>> {

    /**
     * Initializes the list
     **/
    public nd head;
    public int size;

    class nd {
        public T data;
        public nd next;

        public nd(T data) {
            this.data = data;
            this.next = null;
        }
    }

    public LinkedList() {
        this.head = null;
        this.size = 0;
    }

    /**
     * Inserts the specified element into the list.
     * The elements must be sorted in ascending order.
     * null elements should be at the end of the list.
     *
     * @param e Element to be inserted
     **/
    public void insert(T e) {
        nd cur = head;
        nd prev=null;
        nd p =new nd(e);
        if(e==null){
            while (cur!=null && cur.data!=null)
            {
                prev=cur;
                cur=cur.next;
            }
        if(prev==null)
        {
            head=p;
        }
        else
        {
            prev.next=p;
        }
        }
        else{
            while (cur!=null && cur.data!=null && e.compareTo(cur.data)>0)
            {
                prev=cur;
                cur=cur.next;
            }
            if(prev==null)
            {
                head=p;
            }
            else
            {
                prev.next=p;
            }
            p.next=cur;
        }
        size++;
    }

    /**
     * Returns the n-th element in the list.
     *
     * @param i Index
     * @return The element at the given index
     * @throws IndexOutOfBoundsException if there is no element at this
     *                                   index.
     **/
    public T get(int i) {
        if (i >= size || i < 0) {
            throw new IndexOutOfBoundsException();
        }
        nd cur = head;
        for (int j=0;j<i;j++){
            cur = cur.next;
        }
        return cur.data;
    }

    /**
     * Removes the first occurrence of the specified element in the list.
     *
     * @param e Element to remove
     * @return returns the element that has been removed or null
     **/
    public T remove(T e) {
        nd current =head;
        nd prev =null;
        while(current!=null && !current.data.equals(e))
        {
            prev=current;
            current=current.next;
        }
        if (current==null){
            return null;
        }
        else if(prev==null){
            head=head.next;
        }
        else{
            prev.next=current.next;
        }
        this.size--;
        return current.data;
    }

    /**
     * Returns the size of the list.
     *
     * @return Number of elements in the list
     **/
    public int size() {
        return this.size;
    }

    /**
     * Removes all elements from the list.
     **/
    public void clear() {
       this.head=null;
       this.size=0;
    }
}
