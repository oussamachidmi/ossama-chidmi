function replace(str)
{
    return str.replace(/(\d{2})\/(\d{2})\/(\d{4})/g, '$3-$1-$2');
}

console.log(replace("11/15/2019"));

module.exports = {
    replace,
}