package fr.epita.assistants.pizzastreams;

import java.util.List;
import java.util.stream.Stream;

import fr.epita.assistants.pizzastreams.Topping.*;

// import comparotors
import java.util.Comparator;
import java.util.stream.Collectors;

public class PizzaStreams {
    /**
     * @return The sum of the prices of all the pizzas in the stream
     */

    public static Integer getTotalPrice(Stream<Pizza> pizzaStream) {
        // i want to get the price of each pizza and sum them

        // i got an error cannot find symbol method sum()
        // i need to convert the stream to int stream
        // i need to map the stream to get the price of each pizza
        // i need to sum the prices

        return pizzaStream.mapToInt(pizza -> pizza.getPrice()).sum();
    }

    /**
     * @return The average price of the pizzas in the stream, or the
     * double NaN if the stream is empty
     */
    public static Double getAveragePrice(Stream<Pizza> pizzaStream) {
        Double avg = pizzaStream.mapToDouble(pizza -> pizza.getPrice())
                .average().orElse(Double.NaN);
        return avg;

    }

    /**
     * @return Names of the pizzas, sorted by price in ascending order
     */
    public static List<String> sortByPrice(Stream<Pizza> pizzaStream) {

        List<String> li = pizzaStream.sorted(Comparator.comparingDouble(Pizza::getPrice))
                .map(pizza -> pizza.getName()).collect(Collectors.toList());
        return li;
    }

    /**
     * @return The Pizza object that has the lowest price, or null by default
     */
    public static Pizza getCheapest(Stream<Pizza> pizzaStream) {
    

         Pizza pi= pizzaStream.min(Comparator.comparingDouble(Pizza::getPrice))
                .orElse(null); 
        return pi;
    }

    /**
     * @return Names of the pizzas with meat (Protein)
     */
     // pizza have one topping so i need to be attention of gettopping.stream because it's a class not a list

    public static List<String> getCarnivorous(Stream<Pizza> pizzaStream) {
        List<String> ss = pizzaStream.filter(pizza -> pizza.getTopping().getProtein().isPresent())
        .map(pizza -> pizza.getName())
        .collect(Collectors.toList());
        return ss;
    }
      

    /**
     * @return Names of the pizzas with at least one Vegetable and no Proteins
     */
    public static List<String> getVeggies(Stream<Pizza> pizzaStream) {
       
        // let's try to return the name of the pizza that have at least one vegetable and no protein
        

        List<String> tt =pizzaStream.filter(pizza -> !pizza.getTopping().getProtein().isPresent()
        && !pizza.getTopping().getVegetableList().isEmpty()).map(pizza -> pizza.getName()).collect(Collectors.toList());


        return tt;

        
    }

    /**
     * @return true if all the pizzas with a nature dough are based with tomato
     * and mozzarella (italian pizza criteria), false otherwise
     */
    public static boolean areAllNatureItalians(Stream<Pizza> pizzaStream) {
        // we can't do getTopping().stream()
        // because getTopping() is a class not a list
        return pizzaStream.filter(pizza -> pizza.getDough() == Dough.NATURE)
                .allMatch(pizza -> pizza.getTopping().getSauce() == Sauce.TOMATO
                        && pizza.getTopping().getCheese() == Cheese.MOZZARELLA);        
    }
}
