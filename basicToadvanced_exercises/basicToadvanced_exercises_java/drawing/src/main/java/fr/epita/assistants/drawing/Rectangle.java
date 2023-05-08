package fr.epita.assistants.drawing;

public class Rectangle extends Sharp {

  public int width;

  public Rectangle(int width, int length) {
    super(length);
    this.width = width;
  }

    public void draw() {
        for (int i = 1; i <= length; i++) {
            for (int j = 1; j <= width; j++) {
                if (i == 1 || i == length || j == 1 || j == width) {
                    System.out.print("# ");
                } else {
                    System.out.print("  ");
                }
            }
            System.out.println();
        }
  }
}
