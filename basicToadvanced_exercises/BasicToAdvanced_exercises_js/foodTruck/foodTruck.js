
const { recipes, stocks } = require("./data");


function preparePizza(recipePizza, name) {
  console.log(`Preparing ${recipePizza.sauce}`);
    // we need to prepare the toppings
    if (stocks[recipePizza.sauce] < 1) {
      console.log(
        `Not enough ingredients for ${name} because there is no more ${recipePizza.sauce}`
      );
      return false;
    }
    stocks[recipePizza.sauce] -= 1;
    let toppings = Object.keys(recipePizza.toppings);
    let i = 0;
    function prepareNextTopping() {
      let topping = toppings[i];
      console.log(`Preparing ${topping}`);
      if (stocks[topping] < recipePizza.toppings[topping]) {
        console.log(
          `Not enough ingredients for ${name} because there is no more ${topping}`
        );
        return false;
      }
      stocks[topping] -= recipePizza.toppings[topping];
      i++;
      if (i < toppings.length) {
        setTimeout(prepareNextTopping, 1000);
      } else {
        setTimeout(() => {
          // we need to prepare the cheese
          let cheeses = Object.keys(recipePizza.cheese);
          console.log(`Preparing ${Object.keys(recipePizza.cheese).join(", ")}`);
          for (let j = 0; j < cheeses.length; j++) {
            let cheese = cheeses[j];
            if (stocks[cheese] < recipePizza.cheese[cheese]) {
              console.log(
                `Not enough ingredients for ${name} because there is no more ${cheese}`
              );
              return false;
            }
            stocks[cheese] -= recipePizza.cheese[cheese];
          }
          setTimeout(() => {
            console.log(`All ingredients have been prepared`);
            setTimeout(() => {
              console.log(`Cooking ${name}`);
              setTimeout(() => {
                console.log(`Delivering ${name}`);
                return true;
              }, 5000);
            }, 2000);
          }, 1000);
        }, 1000);
      }
    }
    setTimeout(prepareNextTopping, 1000);
}


function prepareBurger(recipeBurger, recipeName) {
  // we need to prepare the recipeBurger
  let ingredients = Object.keys(recipeBurger);
  let i = 0;
  function prepareIngredient() {
    let ingredient = ingredients[i];
    console.log(`Preparing ${ingredient}`);
    if (stocks[ingredient] < recipeBurger[ingredient]) {
      console.log(
        `Not enough ingredients for ${recipeName} because there is no more ${ingredient}`
      );
      return false;
    }
    stocks[ingredient] -= recipeBurger[ingredient];
    i++;
    if (i < ingredients.length) {
      setTimeout(prepareIngredient, 1000);
    } else {
      setTimeout(() => {
        console.log(`All ingredients have been prepared`);
        setTimeout(() => {
          console.log(`Cooking ${recipeName}`);
          setTimeout(() => {
            console.log(`Delivering ${recipeName}`);
            return true;
          }, 5000);
        }, 2000);
      }, 1000);
    }
  }
  prepareIngredient();
}

// i should not wotk with promises
// my function should not be recursive
function order(recipeName) {
  console.log(`Ordering ${recipeName}`);
  setTimeout(() => {
    if (!recipes["pizza"][recipeName] && !recipes["burger"][recipeName]) {
      console.log(`Recipe ${recipeName} does not exist`);
      return;
    }
    console.log(`Production has started for ${recipeName}`);
    setTimeout(() => {
      if (!recipes["pizza"][recipeName]) {
        // it's a burger
        if (!prepareBurger(recipes["burger"][recipeName], recipeName)) {
          clearTimeout();
        }
      } else {
        // it's a pizza
        if (!preparePizza(recipes["pizza"][recipeName], recipeName)) {
          clearTimeout();
        }
      }
    }, 1000);
  }, 2000);
}


module.exports = { stocks, order };
