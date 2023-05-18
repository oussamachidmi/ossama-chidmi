function makePromise() {
    return new Promise((resolve, reject) => {
        const creationTime = Date.now();
        const interval = setTimeout(() => {
                reject(-1);
        }, 10000);
        const d =document.getElementById("resolve-promise").addEventListener("click", () => {
        clearTimeout(interval);
        const timeSinceCreation = Math.floor(Date.now() - creationTime/ 1000);
        const result = Date.now() - creationTime;
        document.getElementById("resolve-promise").removeEventListener("click", d);
        if (timeSinceCreation % 2 === 0) {
            resolve(result/1000);
        } else {
            reject(result/1000);
        }
        });        
    });
}


document.getElementById("make-promise").addEventListener("click", () => {
    console.log("create clicked");
    makePromise()
    .then((value) => console.log("Promise resolved with value " + value))
    .catch((value) => console.log("Promise rejected with value " + value));
});


module.exports = {
    makePromise,
}