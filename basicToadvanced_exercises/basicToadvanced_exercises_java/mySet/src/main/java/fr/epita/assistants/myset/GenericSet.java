package fr.epita.assistants.myset;

import java.util.*;

public class GenericSet<T extends  Comparable > {
    private ArrayList<T> base_;

    public GenericSet() {
        base_ = new ArrayList<T>();
    }

    public void insert(T i) {
        if (!base_.contains(i)) {
            base_.add(i);
        }
        Collections.sort(base_);
    }


    public void remove(T i) {
        base_.remove(i);
    }

    public Boolean has(T i) {
        return base_.contains(i);
    }

    public Boolean isEmpty() {
        return base_.isEmpty();
    }

    public int size() {
        return base_.size();
    }

    public T min() {
        if (base_.isEmpty()) {
            return null;
        }

        return (T) Collections.min(base_);
    }

    public  T max() {
        if (base_.isEmpty()) {
            return null;
        }

        return (T) Collections.max(base_);
    }

    public static <T extends Comparable> GenericSet<T> intersection(GenericSet<T> a, GenericSet<T> b) {
        GenericSet<T> result = new GenericSet<T>();
        for (T i : a.base_) {
            if (b.base_.contains(i)) {
                result.insert(i);
            }
        }
        return result;
    }

    public static <T extends Comparable> GenericSet<T> union(GenericSet<T> a, GenericSet<T> b) {
        GenericSet<T> result = new GenericSet<T>();
        if(a.size()+ b.size()==0)
        {
            return result;
        }
        for (T i : a.base_) {
            result.insert(i);
        }
        for (T i : b.base_) {
            result.insert(i);
        }
        return result;
    }
}