package fr.epita.assistants.drawing;


public abstract class Entity implements IDrawable {

    public static long SEQUENCE = 0;
    public long id;

    public Entity() {
        this.id = SEQUENCE;
        SEQUENCE++;
    }

    public void draw() {
        System.out.println("Drawing entity " + this.id);
    }

    public long getId() {
        return this.id;
    }

}
