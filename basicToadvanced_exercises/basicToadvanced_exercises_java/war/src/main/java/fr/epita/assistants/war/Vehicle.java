package fr.epita.assistants.war;

class Vehicle extends Combatant
{
    public String name;
    public int defense;
    public Vehicle(String name, int defense)
    {
        this.name=name;
        this.defense=defense;
    }

    void printState() {
        System.out.println("I have "+this.defense+" defense points.");
    }
    public void attack(Soldier s)
    {
        s.kill();
    }
    public void attack(Vehicle v)
    {
        v.defense=v.defense/2;
    }
    public void scream(){
        System.out.println("I'm "+this.name+"!");
    }
}