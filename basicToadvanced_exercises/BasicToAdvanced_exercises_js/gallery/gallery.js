const fs = require("fs");

function extract(directoryPath) {
    if (!fs.existsSync(directoryPath)) {
        throw new Error("The directory does not exist");
    }
    let fls = fs.readdirSync(directoryPath);
    let emails = [];
    for (let i = 0; i < fls.length; i++) {
        let file = fls[i];
        let content = fs.readFileSync(directoryPath + "/" + file, "utf8");
        let matches = content.match(/([a-z0-9_\.\+\-]+)@([a-z0-9\-]+\.[a-z0-9\-\.]+)/g);
        if (matches) {
            for (let j = 0; j < matches.length; j++) {
                emails.push(matches[j]);
            }
        }
    }
    return emails;
}

module.exports = {
    extract
};