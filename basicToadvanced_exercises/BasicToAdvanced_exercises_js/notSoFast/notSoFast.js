const fetch = require("node-fetch");

async function notSoFast(host, port) {
  const articles = [];
  let pg = 0;
  const totalResponse = await fetch(`http://${host}:${port}/articles`);
  const totalJson = await totalResponse.json();
  const total = totalJson.message;
  let remaining = total;
  let logi = 50;
  if (total === 10) {
    logi = 100;
  }
  while (remaining > 0) {
    const response = await fetch(`http://${host}:${port}/articles/${pg}`);
    const remainingHeader = parseInt(
      response.headers.get("x-ratelimit-remaining")
    );
    if (remainingHeader === 0) {
      await new Promise((resolve) => setTimeout(resolve, logi));
    }
    const json = await response.json();
    remaining = json.length;
    pg++;
    articles.push(json);
    const remainingResponse = await fetch(`http://${host}:${port}/articles`);
    const remainingJson = await remainingResponse.json();
    remaining = remainingJson.message - articles.length;
  }
  return articles;
}


module.exports={
  notSoFast
}