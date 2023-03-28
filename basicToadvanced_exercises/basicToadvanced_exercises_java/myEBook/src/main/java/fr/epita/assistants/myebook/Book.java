package fr.epita.assistants.myebook;

import java.util.List;

public class Book implements Paginated, Readable {
    private String name;
    private List<String> pages;
    private
    int currentPage;

    Book(String name, List<String> pages) {
        this.name = name;
        if (pages.size() == 0)
        {
            pages.add("");
        }
        this.pages = pages;
        this.currentPage = 0;
    }

    public String getName() {
        return name;
    }

    public EBook scan() {
        EBook bk =new EBook(this.name);

        for (int i=0;i<this.pages.size();i++)
        {
            if(i!=this.pages.size()-1)
            {
                bk.addPage();
            }
            bk.openToPage(i);
            bk.writeCurrentPage(this.pages.get(i));
        }
        return bk;
    }

    public void openToPage(int page) {
        if (page >= 0 && page < pages.size()) {
            currentPage = page;
        }
    }

    public int getCurrentPage() {
        return currentPage;
    }

    public int getPageCount() {
        return pages.size();
    }


    public String readCurrentPage() {
        return pages.get(currentPage);
    }

}
