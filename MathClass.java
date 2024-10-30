//CREATE YOUR OWN BRANCH AND GIT PULL BEFORE!!!

import java.util.Scanner;

public class MathClass {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        
        System.out.print("Enter the numerator: ");
        double numerator = scanner.nextDouble();
        
        System.out.print("Enter the denominator: "); 
        double denominator = scanner.nextDouble();

        if (denominator == 0) {
            System.out.println("Error: cannot divide by zero");
        } else {
            System.out.println("Result: " + (numerator / denominator));
        }
        
        scanner.close(); 
    }
}
    

    
