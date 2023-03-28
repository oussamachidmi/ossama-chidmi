package fr.epita.assistants.staticpen;

public class Pen {

    private Pen.Color Color;

    // FIXME: Add attributes here.
    public static enum Color{
        RED,
        BLUE,
    };

    private static int countRed =0;
    private static int countBlue =0;

    public Pen(final Color color) {
        this.Color=color;
        if(color== Color.BLUE)
        {
            countBlue++;
        } else if (color== Color.RED) {
            countRed++;
        }
    }

    public static int getRedPenCounter() {
        return countRed;
    }

    public static int getPenCounter() {
        return countBlue+countRed;
    }

    public static int getBluePenCounter() {
        return countBlue;
    }

    public void changeColor(final Color color) {
        // FIXME
        if(this.Color!=color)
        {
            if(color==Color.BLUE)
            {
                countBlue++;
                countRed--;
            }
            else if(color==Color.RED){
                countBlue--;
                countRed++;
            }
        }
        this.Color=color;
    }

    public static void resetCounts() {
        // FIXME
        countRed=0;
        countBlue=0;
    }

    public void print() {
        // FIXME
        System.out.println("I'm a "+this.Color+" pen.");
    }
}
