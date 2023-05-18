const bodyUntouched = window.document.body.cloneNode(true);
const productsArray = Array.from(
  window.document.querySelectorAll("#menu > .product"),
);

const productDescription = productsArray.map((product) => ({
  name: product.querySelector(".name").textContent,
  price: parseFloat(product.querySelector(".priceTag > .spanNb").textContent),
  description: product.querySelector(".description").textContent,
}));

let table = window.document.getElementById("recap");
let tableRows = Array.from(
  window.document.querySelectorAll("#recap > tbody > tr"),
);

const total = table.querySelector("#orderTotal .spanNb");

window.document.querySelectorAll("#menu > .product .order").forEach((btn) => {
  btn.addEventListener("click", (event) => {
    window.document.getElementById("validationBtn").hidden = false;

    const product = event.target.closest(".product");
    const productIndex = productsArray.indexOf(product);

    console.log(productDescription[productIndex].name + " added to the cart");

    const productRecord = tableRows.find(
      (row) =>
        row.querySelector(".name")?.textContent ===
        productDescription[productIndex].name,
    );

    if (!productRecord) {
      console.error("Product not found in recap table");
      return;
    }

    const quantity = ++productRecord.querySelector("td.quantity > input").value;
    const price = productRecord.querySelector(".priceTag > .spanNb");
    const previousPrice = parseFloat(price.textContent);
    const newPrice = productDescription[productIndex].price * quantity;
    price.textContent = newPrice.toFixed(2);

    total.textContent = (
      parseFloat(total.textContent) +
      newPrice -
      previousPrice
    ).toFixed(2);
  });
});

window.document
  .querySelectorAll("#recap .product td.quantity > input")
  .forEach((quantity) => {
    // only triggered on user input
    quantity.addEventListener("change", (event) => {
      const product = event.target.closest(".product");
      const productIndex = tableRows.indexOf(product);
      console.log(productDescription[productIndex].name + " quantity changed");

      const price = product.querySelector(".priceTag > .spanNb");
      const previousPrice = parseFloat(price.textContent);
      const newPrice =
        productDescription[productIndex].price * event.target.value;
      price.textContent = newPrice.toFixed(2);
      total.textContent = (
        parseFloat(total.textContent) +
        newPrice -
        previousPrice
      ).toFixed(2);

      window.document.getElementById("validationBtn").hidden =
        total.textContent === "0.00";
    });
  });

function openPopup(text, timeout) {
  const popup = window.open("", "popup", "width=300,height=200");
  popup.document.body.innerHTML = `<h1>${text}</h1>`;
  return new Promise((resolve) =>
    setTimeout(() => {
      popup.close();
      resolve();
    }, timeout),
  );
}

const resetfunction = () => {
  console.log("Order reset");
  window.document.body.replaceWith(bodyUntouched);
  location.replace(location.href);
};

window.document
  .getElementById("validationBtn")
  .addEventListener("click", async (event) => {
    window.document
      .querySelectorAll("button:not(#reset)")
      .forEach((btn) => (btn.hidden = true));
    await openPopup("Your order has been validated", 2000)
      .then(() => openPopup("Your order is being prepared", 3000))
      .then(() => openPopup("Your order is ready", 1000));
    resetfunction();
  });

window.document
  .getElementById("reset")
  .addEventListener("click", resetfunction);
