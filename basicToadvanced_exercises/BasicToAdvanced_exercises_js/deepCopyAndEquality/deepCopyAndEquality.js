
function deepCopy(x) {
  if (x === null || typeof x !== 'object') {
    return x;
  }
  const cp = Array.isArray(x) ? [] : {};
  for (let key in x) {
    if (Object.prototype.hasOwnProperty.call(x, key)) {
      cp[key] = deepCopy(x[key]);
    }
  }
  return cp;
}




function deepEquality(a, b) {
  if (a === b) {
    return true;
  }
  if (a === null || typeof a !== 'object' || b === null || typeof b !== 'object') {
    return false;
  }
  const ka = Object.keys(a);
  const kb = Object.keys(b);
  if (ka.length !== kb.length) {
    return false;
  }
  for (var key of ka) {
    if (!kb.includes(key)) {
      return false;
    }
    if (!deepEquality(a[key], b[key])) {
      return false;
    }
  }
  return true;
}


console.log(deepEquality(1, 1)); // true
console.log(deepEquality(1, "1")); // false
console.log(deepEquality([1, 2], [1, 2])); // true
console.log(deepEquality({ a: 1, b: {c : 2} }, { a: 1, b: {c : 2} })); // true
console.log(deepEquality({ arr: [1, 2] }, { arr: [1, 2] }));
console.log(deepEquality({ x: [1, "hello", [1, 2, 3], {a : "world"}] }, { x: [1, "hello", [1, 2, 3], {a :"world"}] })); // true


let object = { a: "1" , b : 2, c: {d: "3"} }
console.log(deepEquality(object, deepCopy(object))) 


module.exports = {
    deepCopy,
    deepEquality
}
