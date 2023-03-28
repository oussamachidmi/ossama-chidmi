#include "libzork/story/choice.hh"

#include <iostream>
#include <string>
#include <vector>

#include "libzork/story/node.hh"

namespace story
{
    Choice::Choice(const Node* other_node, const std::string& text)
        : an_node(other_node)
        , text_(const_cast<std::string&>(text))
    {}

    const std::string Choice::get_text() const
    {
        return text_;
    }

    std::vector<Action> Choice::get_actions() const
    {
        return actions_;
    }

    std::vector<Condition> Choice::get_cnt() const
    {
        return cnd_;
    }

    const Node* Choice::getChoiceNode() const
    {
        return an_node;
    }

} // namespace story