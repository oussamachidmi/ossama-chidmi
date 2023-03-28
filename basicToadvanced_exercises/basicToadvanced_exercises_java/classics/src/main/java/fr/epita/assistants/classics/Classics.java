package fr.epita.assistants.classics;

import java.lang.*;

public class Classics {
    /**
     * Computes the factorial of n.
     *
     * @param n the nth value to compute, negative values should return -1
     * @return the long value of n!
     */
    public static long factorial(int n) {
        /* FIXME */
        if (n < 0) {
            return -1;
        }
        long a = 1;
        for (long i = 1; i <= n; i++) {
            a = a * i;
        }
        return a;
    }

    /**
     * Computes the nth value of the tribonacci suite.
     * f(0) = 0, f(1) = 1, f(2) = 1, f(n+3) = f(n) + f(n+1) + f(n+2)
     *
     * @param n the nth sequence to compute
     */
    public static long tribonacci(int n) {
        /* FIXME */
        if (n == 1 || n == 0) {
            return n;
        }
        if (n == 2) {
            return 1;
        }
        long a = 0, b = 1, c = 1, d;
        for (long i = 3; i <= n; i++) {
            d = a + b + c;
            a = b;
            b = c;
            c = d;
        }
        return c;
    }

    /**
     * Checks if a word is a palindrome.
     *
     * @param word the string to check
     * @return true if the word is a palindrome, false otherwise.
     */
    public static boolean isPalindrome(String word) {
        /* FIXME */
        if(word.isEmpty()) {
            return true;
        }
        word=word.replace(" ","");
        int j=word.length()-1;
        for (int i=0;i<=word.length()/2;i++)
        {
            if(word.toLowerCase().charAt(i)!=word.toLowerCase().charAt(j))
            {
                return false;
            }
            j--;
        }
        return true;
    }

    /**
     * Sorts an array using an insertion sort.
     *
     * @param array the array to sort in place
     */
    public static void insertionSort(int[] array) {
        /* FIXME */
        int n = array.length;
        for (int i = 1; i < n; ++i) {
            int key = array[i];
            int j = i - 1;
            while (j >= 0 && array[j] > key) {
                array[j + 1] = array[j];
                j = j - 1;
            }
            array[j + 1] = key;
        }
    }

    /**
     * Combines two strings by alternating their characters. Must use a StringBuilder.
     * If the strings do not have the same length, appends the remaining characters at the end of the result.
     * For instance, combine("abc", "def") returns "adbecf"
     */
    public static String combine(String a, String b) {
        /* FIXME */
        String max;
        String min;
        if (a.length() == 0) {
            return b;
        }
        if (b.length() == 0) {
            return a;
        }
        int j = 0;
        if (a.length() > b.length()) {
            max = a;
            min = b;
        } else {
            max = b;
            min = a;
        }
        StringBuilder sb = new StringBuilder();
        for (int i = 0; i < max.length(); i++) {
            if (a.equals(max)) {
                sb.append(max.charAt(i));

                if (j < min.length()) {
                    sb.append(min.charAt(j));
                    j++;
                }
            }
            else{
                if (j < min.length()) {
                    sb.append(min.charAt(j));
                    j++;
                }
                sb.append(max.charAt(i));
            }
        }
        return sb.toString();
    }
}
