package fr.epita.assistants.war;

class Soldier extends Combatant
{
    public int Health_p;
    public int Damage_p;
    public String scream;

    public Soldier() {
        this.Health_p=15;
        this.Damage_p=3;
        this.scream="No pity for losers!";
    }

    public void kill() {
        this.Health_p=0;
    }
    void printState() {
        System.out.println("I have "+this.Health_p+" health points.");
    }
    public void attack(Soldier s)
    {
        s.Health_p=s.Health_p-this.Damage_p;
    }
    public void attack(Vehicle v)
    {
        System.out.println("I can't fight this.");
    }
    public void scream(){
        System.out.println(this.scream);
    }
}