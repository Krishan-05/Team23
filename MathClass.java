//CREATE YOUR OWN BRANCH AND GIT PULL BEFORE!!!

import java.util.Scanner;

public class MathClass{
    public class DivisionCalculator {
        public static void main(String[] args) {
            Scanner Scanner  = new Scanner(System.in);
            System.out.print("Enter the numerator: ");
            double numerator = Scanner.nextDouble();
            System.out.print("Enter the numerator: ");
            double denominator = Scanner.nextDouble();

            if (denominator ==0){
                System.out.println("erroe cannot divide by zero");
            }else{
                System.out.println("result: " + (numerator / denominator));
            }
            Scanner.close();
            }

            
        }
    
        
    }
    

    
