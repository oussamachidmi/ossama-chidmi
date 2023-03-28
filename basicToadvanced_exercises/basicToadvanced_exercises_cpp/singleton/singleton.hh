#ifndef SINGLETON_HH
#define SINGLETON_HH

#include <string>

template <typename T>
class Singleton
{
public:
    static T* instance()
    {
        static T instance;
        return &instance;
    }

protected:
    Singleton()
    {}
    ~Singleton()
    {}

private:
    Singleton(const Singleton&) = delete;
    Singleton& operator=(const Singleton&) = delete;
};

class Logger : public Singleton<Logger>
{
public:
    void open_log_file(const std::string& file);
    void write_to_log_file();
    void close_log_file();

private:
    friend class Singleton<Logger>;
    Logger()
    {}
    ~Logger()
    {}

    std::string log_file_;
};
#endif // SINGLETON_HH
