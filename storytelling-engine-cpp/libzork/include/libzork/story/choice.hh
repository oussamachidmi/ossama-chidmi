#pragma once

#include <vector>

#include "libzork/variables/action.hh"
#include "libzork/variables/condition.hh"

namespace story
{
    class Node;
    class Choice
    {
    public:
        Choice(const Node* other_node, const std::string& text);

        // Getters
        const std::string get_text() const;

        std::vector<Condition> get_cnt() const;
        std::vector<Action> get_actions() const;
        const Node* getChoiceNode() const;

    private:
        const Node* an_node;
        std::string& text_;
        std::vector<Condition> cnd_;
        std::vector<Action> actions_;
    };
} // namespace story