package fr.epita.assistants.drawing;


public class Triangle extends Sharp {

    public Triangle(int length) {
        super(length);
    }
    public void draw() {
        for (int i = 1; i <= length; i++) {
            for (int j = 1; j <= i; j++) {
                if (i == 1 || i == length || j == 1 || j == i) {
                    System.out.print("# ");
                } else {
                    System.out.print("  ");
                }
            }
            System.out.println();
        }
    }
}