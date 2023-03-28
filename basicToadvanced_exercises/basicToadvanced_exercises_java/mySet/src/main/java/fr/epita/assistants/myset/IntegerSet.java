package fr.epita.assistants.myset;

import java.util.*;

public class IntegerSet {
    private ArrayList<Integer> base_;

    public IntegerSet() {
        base_ = new ArrayList<Integer>();
    }

    public void insert(Integer i) {
        if (!base_.contains(i)) {
            base_.add(i);
        }
        Collections.sort(base_);
    }

    public void remove(Integer i) {
        base_.remove(i);
    }

    public Boolean has(Integer i) {
        return base_.contains(i);
    }

    public Boolean isEmpty() {
        return base_.isEmpty();
    }

    public Integer min() {
        if (base_.isEmpty()) {
            return null;
        }
        Integer min = Integer.MAX_VALUE;
        for (int i=0 ; i <base_.size(); i++) {
            if ( base_.get(i).compareTo(min)<0) {
                min = base_.get(i);
            }
        }
        return min;
    }

    public Integer max() {
        if (base_.isEmpty()) {
            return null;
        }
        int max = Integer.MIN_VALUE;
        for (int i=0 ; i <base_.size(); i++) {
            if (base_.get(i).compareTo(max)>0) {
                max = base_.get(i);
            }
        }
        return max;
    }

    public int size() {
        return base_.size();
    }

    public static IntegerSet intersection(IntegerSet a, IntegerSet b) {
        IntegerSet rp = new IntegerSet();
        for (int i=0 ; i <a.base_.size(); i++) {
            if (b.base_.contains(a.base_.get(i))) {
                rp.insert(a.base_.get(i));
            }
        }
        return rp;
    }

    public static IntegerSet union(IntegerSet a, IntegerSet b) {
        IntegerSet rp = new IntegerSet();
        if(a.size()+ b.size()==0)
        {
            return rp;
        }
        for (int i=0 ; i <a.base_.size(); i++) {
            rp.insert(a.base_.get(i));
        }
        for (int i=0 ; i <b.base_.size(); i++) {
            rp.insert(b.base_.get(i));
        }
        return rp;
    }
}