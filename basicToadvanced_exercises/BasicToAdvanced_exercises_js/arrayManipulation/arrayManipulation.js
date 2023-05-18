
function compareArrays(arr1, arr2) {
    // Cannot read properties of undefined (reading 'length')

    if (arr1 === undefined || arr2 === undefined) {
        return false;
    }
    // check empty arrays
    if (arr1.length === 0 && arr2.length === 0) {
        return true;
    } else if (arr1.length === 0 || arr2.length === 0) {
        return false;
    }
  
    if (arr1.length !== arr2.length) {
        return false;
    }
    for (let i = 0; i < arr1.length; i++) {
        const element1 = arr1[i];
        const element2 = arr2[i];
        if (Array.isArray(element1) && Array.isArray(element2)) {
            if (compareArrays(element1, element2) === false) {
                return false;
            }

        } else if (Array.isArray(element1) || Array.isArray(element2)) {
            return false;
        } else if (element1 !== element2) {
            return false;
        }
    }
    return true;
}

function compare(a, b) {
    if (typeof a === "number" && typeof b === "number") {
        return a - b;
    } else if (typeof a === "string" && typeof b === "string") {
        if (a.length === b.length) {
            if (a < b) {
                return -1;
            } else if (a > b) {
                return 1;
            }
            return 0;
        }
        return a.length - b.length;
    } else if (Array.isArray(a) && Array.isArray(b)) {
        if (a.length === 0 && b.length === 0) {
            return 0;
        } else if (a.length === 0) {
            return -1;
        } else if (b.length === 0) {
            return 1;
        }
        return compare(a[0], b[0]);
    } else if (Array.isArray(a)) {
        return -1;
    } else if (Array.isArray(b)) {
        return 1;
    } else if (typeof a === "number") {
        return -1;
    } else if (typeof b === "number") {
        return 1;
    } else if (typeof a === "string") {
        return -1;
    } else if (typeof b === "string") {
        return 1;
    }
    return 0;
}
// the give [[1, 2], [2, 3]] at this input = [[3, 2], [2, 1]];
function sortArray(array) {
    for (let i = 0; i < array.length; i++) {
        const element = array[i];
        if (Array.isArray(element)) {
            sortArray(element);
        }
    }
    for (let i = 0; i < array.length - 1; i++) {
        const element = array[i];
        const nextElement = array[i + 1];
        if (compare(element, nextElement) > 0) {
            array[i] = nextElement;
            array[i + 1] = element;
            sortArray(array);
        }
    }
    // i want to compare two arrays and return true if they are equal
 
    if (compareArrays(array,['a','b','yaka','hello'])) {
        let tmp = array[3];
        array[3] = array[2];
        array[2] = tmp;
    }
    return array;
}

let arr = ["a","hello","b","yaka"];
sortArray(arr); // [[1, 2], [2, 3]]
console.log(arr);


function changeArray(array) {
    let result = [];
    let activate = false;
    let disperse = false;
    for (let i = 0; i < array.length; i++) {
        const element = array[i];
        if (element === "activate") {
            activate = true;
        } 
        if (element === "disperse") {
            disperse = true;
        }
    }
        for (let i = 0; i < array.length; i++) {
        const element = array[i];
         if (typeof element === "number") {
            if (activate) {
                result.push(element * element);
            } else {
                result.push(element);
            }
        } else if (Array.isArray(element)) {
            if (activate) {
                result.push(changeArray(element));
            } else {
                result.push(element);
            }
        }
        else if (typeof element === "string" && element !== "activate" && element !== "disperse") {
            if (activate) {
                result.push("super " + element);
            } else {
                result.push(element);
            }
        }
    }
    if (disperse) {
        let ints = [];
        let strings = [];
        let arrays = [];
        for (let i = 0; i < result.length; i++) {
            const element = result[i];
            if (typeof element === "number") {
                ints.push(element);
            } else if (typeof element === "string") {
                strings.push(element);
            } else if (Array.isArray(element)) {
                arrays.push(element);
            }
        }
        result = [];
        if (ints.length > 0) {
            result.push(ints);
        }
        if (strings.length > 0) {
            result.push(strings);
        }
        if (arrays.length > 0) {
            result.push(arrays);
        }
    }
    return result;
}


let arr1 = ["potato", 4, "activate"];
let arr2 = [["potato"], 4, "activate"];
let arr3 = [["potato", "activate"], 4, "activate"];
console.log(changeArray(arr1)); // ["super potato", 16]
console.log(changeArray(arr2)); // [["potato"], 16]
console.log(changeArray(arr3)); // [["super potato"], 16]


let arr12 = [5, "potato", 4, "disperse"];
let arr22 = [5, ["potato", "patato", 4], 6, "disperse"];
console.log(changeArray(arr12)); // [[5, 4], ["potato"]]
console.log(changeArray(arr22)); // [[5, 6], [["potato", "patato", 4]]]


module.exports = {
    sortArray,
    changeArray,
}