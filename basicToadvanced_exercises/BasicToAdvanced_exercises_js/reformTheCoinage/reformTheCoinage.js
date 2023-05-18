// You will implement a reformTheCoinage function that will take a positive int as parameter that represent an amount. This function will return the number of combinations the given amount can be paid with coin of 1, 2, 5 and 10.

function reformTheCoinage(amount)
{
    if (amount < 0)
    {
        return -1;
    }
    if (amount === 0)
    {
        return 1;
    }
    if (amount === NaN || amount === null)
    {
        return -1;
    }
    var sm = 0;
    for (var i = 0; i <= amount; i++)
    {
        for (var j = 0; j <= amount; j++)
        {
            for (var k = 0; k <= amount; k++)
            {
                for (var l = 0; l <= amount; l++)
                {
                    let r = i + 2 * j + 5 * k + 10 * l;
                    if (r === amount)
                    {
                        sm++;
                    }
                }
            }
        }
    }
    return sm;
}

module.exports = {
    reformTheCoinage,
}