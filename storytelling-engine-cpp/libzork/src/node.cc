#include "libzork/story/node.hh"

#include <fstream>
#include <iostream>
#include <vector>

#include "libzork/story/choice.hh"

namespace fs = std::filesystem;

namespace story
{
    Node::Node(const std::string& name, const fs::path& script_path)
        : name_(name)
        , script_path_(script_path)
    {
        std::ifstream inFile;
        std::string str;
        inFile.open(script_path);
        if (inFile)
        {
            char c;
            while (inFile.get(c))
                text_ += c;
        }
        inFile.close();
    }

    const std::string& Node::get_name() const
    {
        return name_;
    }

    const std::string& Node::get_text() const
    {
        return text_;
    }

    const Node* Node::make_choice(std::size_t index) const
    {
        if (index < choices_.size())
        {
            const Choice* choice = &choices_[index];
            return choice->getChoiceNode();
        }
        return nullptr;
    }

    std::vector<std::string> Node::list_choices(bool) const
    {
        std::vector<std::string> choice_texts;
        for (std::size_t i = 0; i < choices_.size(); i++)
        {
            choice_texts.push_back(choices_[i].get_text());
        }
        return choice_texts;
    }

    void Node::add_choice(const Node* other, const std::string& text)
    {
        choices_.emplace_back(other, text);
    }

} // namespace story