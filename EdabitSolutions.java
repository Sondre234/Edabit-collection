import org.jetbrains.annotations.NotNull;

import java.util.Arrays;
import java.util.Scanner;
import java.util.stream.IntStream;

public class Edabit {

    public static @NotNull String removeVowels(String s) {

        String output = s.replaceAll("[aeiouAEIOU]", "");
        return output;
    }

    public static @NotNull String sevenBoom(int[] arr) {

        String help = Arrays.toString(arr);
        String output;
        if (help.contains("7")) {
            output = "Boom!";
        } else output = "there is no 7 in the array";
        return output;
    }
    public static @NotNull int sum(int[] arr) {

        int sumOfNumbers = IntStream.of(arr).sum();
        return sumOfNumbers;
    }

    public static double add(double a, double b) {

        return a + b;
    }

    public static String tverrSum(String a, String b) {

        return a + b;

    }

    public static void dogBark() {
        System.out.println("Bark bark");
    }

    public static boolean validate(String pin) {

        if (pin.length() > 6 || pin.length() < 4) {
            return false;
        }

        return true;
    }

    public static boolean isEven(int number) {
        if (number % 2 == 0) return true;
        return false;
    }

    public static String convertName(String name) {
        String firstName = name.substring(0, name.indexOf(" "));
        String lastName = name.substring(name.indexOf(" ") + 1); // + 1 to skip the space
        String cName = lastName + ", " + firstName;  //Add a comma and space
        return cName;
    }


    public static void whichIsBigger(int x, int y) {

        // int x = 10;
        // int y = x + 5;
        for (var i = 1; i < 100; i++) {

            if (x > y) {
                System.out.println(i + " It's bigger!");
                x += 1;
            } else if (x == y) {
                System.out.println("It's not bigger anymore. It stopped being bigger after " + i + " loops");
                break;
            }
        }
    }

        public static void fizzBuzz (int turns) {

            String output = "";
            for (var i = 1; i <= turns; i++) {

                if (i % 3 == 0 ) output += "Fizz";
                if (i % 5 == 0) output += "Buzz";

                if (output == "") output += i;
                System.out.println(output);
                output = "";


            }
        }

    public static void main(String[] args) {

        System.out.println(removeVowels("I wonder what this sentence would look like without vowels."));
        int[] yo = {1, 2, 3, 4, 5, 6, 7};
        System.out.println(sevenBoom(yo));
        System.out.println(sum(yo));
        System.out.println(add(4, 0));
        dogBark();
        System.out.println(validate("abc"));
        System.out.println(isEven(42));
        System.out.println(tverrSum("12", "1"));
        System.out.println(convertName("Sondre Myrmel"));

    }
}
