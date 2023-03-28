package fr.epita.assistants.myebook;

public class Main {
    public static void main(String[] args) {
        EBook bk =new EBook("dsadsa");
        bk.addPage();
        bk.openToPage(1);
        bk.writeCurrentPage("toto");
        EBookReader er = new EBookReader();
        er.openEbook(bk);
        System.out.println(er.readCurrentPage());
        er.openToPage(1);
        System.out.println(er.readCurrentPage());
        Book bk1 =bk.print();
        System.out.println(bk1.readCurrentPage());
        bk1.openToPage(1);
        System.out.println(bk1.readCurrentPage());
    }
}
