package fr.epita.assistants.drawing;


public interface IDrawable {
    default public void draw() {
        System.out.println("Drawing");
    }
}
