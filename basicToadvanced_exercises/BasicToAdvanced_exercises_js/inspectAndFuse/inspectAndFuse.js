function getNumberFields(inputObject)
{
    if (typeof inputObject !== 'object') {
        return [];
    }
    var nbr = [];
    for (var key in inputObject) {
        if (typeof inputObject[key] === 'number') {
            nbr.push(key);
        }
    }
    return nbr;
}



function incrementCounters(inputObject)
{
    if (typeof inputObject !== 'object') {
        return;
    }
    for (var i in inputObject) {
        if (typeof inputObject[i] === 'number' && i.toLowerCase().includes('counter') ) {
            inputObject[i]++;
        }
    }
}

function deleteUppercaseProperties(inputObject)
{
    if (typeof inputObject !== 'object') {
        return;
    }
    for (var i in inputObject) {
        if (typeof inputObject[i] === 'object') {
            deleteUppercaseProperties(inputObject[i]);
        }
        if (i === i.toUpperCase()) {
            delete inputObject[i];
        }   
    }
}

function fusion(...objs)
{
    var newElm = {};
    if (objs==null || objs == undefined) {
        return objs 
    }
    for (var object of objs) {
        if (object == null || typeof object != 'object') {
            return null;
        }
        for (var key in object) {
            if (key === null) {
                continue;
            }
            if ( Array.isArray(object[key]) && Array.isArray(newElm[key])) {
                newElm[key] = newElm[key].concat(object[key]);
            }
            else if (typeof object[key] =='object' && typeof newElm[key] =='object') {
                newElm[key] = fusion(newElm[key],object[key]);
            }
            else if ( typeof key =='string' && typeof newElm[key] =='string') {
                newElm[key] = newElm[key].concat(object[key]);
            }
            else if ( typeof newElm[key]  =='number' && typeof object[key]  =='number') {
                newElm[key] = newElm[key] + object[key];
            }
            else {
                newElm[key] = object[key];
            }   
        }        
    }
    return newElm;
}

console.log(fusion({a:1},{a:undefined}));

module.exports = {
    getNumberFields,
    incrementCounters,
    deleteUppercaseProperties,
    fusion,
}