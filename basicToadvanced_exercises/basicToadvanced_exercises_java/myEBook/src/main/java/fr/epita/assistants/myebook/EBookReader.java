package fr.epita.assistants.myebook;


public class EBookReader implements Paginated, Readable, Updatable
{
    private EBook ebook;
    private double vr;
    private int cur;

    public EBookReader()
    {
        this.vr = 1.0;
        this.cur = 0;
    }

    public void openEbook(EBook ebook)
    {
        this.ebook = ebook;
        this.cur = 0;
    }


    public void openToPage(int page)
    {
        if (ebook != null && page >= 0 && page < ebook.getPageCount())
        {
            this.ebook.openToPage(page);
        }
    }


    public int getCurrentPage()
    {
        if(ebook != null)
        {
            return this.ebook.getCurrentPage();
        }
        else
        {
            return -1;
        }
    }


    public int getPageCount()
    {
        if(ebook != null)
        {
            return ebook.getPageCount();
        }
        else
        {
            return -1;
        }

    }


    public String readCurrentPage()
    {
        if(ebook != null)
        {
            Book bk= ebook.print();
            bk.openToPage(ebook.getCurrentPage());
            return bk.readCurrentPage();
        }
        else
        {
            return null;
        }
    }


    public double getVersion()
    {
        return this.vr;
    }


    public void update(double version)
    {
        if (version > this.vr)
        {
            this.vr = version;
        }
    }
}
