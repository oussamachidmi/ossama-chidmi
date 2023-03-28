
package fr.epita.assistants.myebook;

import java.util.ArrayList;
import java.util.List;

public
class EBook implements Paginated, Editable
{
    private String name;
    private List<String> pages;
    private int curp;

    public EBook(String name)
    {
        this.name = name;
        this.pages = new ArrayList<>();
        this.pages.add("");
        this.curp = 0;
    }

    public String getName()
    {
        return this.name;
    }

    public Book print()
    {
        List<String> pages1 =new ArrayList<>(this.pages);
        return new Book(this.name, pages1);
    }

    // Paginated interface

    public void openToPage(int page)
    {
        if (page >= 0 && page < this.pages.size())
        {
            this.curp = page;
        }
    }


    public int getCurrentPage()
    {
        return this.curp;
    }


    public int getPageCount()
    {
        return this.pages.size();
    }

    // Readable interface

    // Editable interface

    public void writeCurrentPage(String pageText)
    {
        this.pages.set(this.curp, pageText);
    }


    public void addPage()
    {
        this.pages.add(this.curp+1, "");
    }
    
    public void deletePage()
    {
        if (this.getPageCount() > 1)
        {
            this.pages.remove(this.curp);
            if (this.curp == this.pages.size())
            {
                this.curp--;
            }
        }
        else
        {
            this.pages.set(0, "");
        }
    }
}

