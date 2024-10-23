import java.util.Scanner;

// Developer: Saaid Abdulle
// University ID: 230165283
// Function: This function takes two integers as input, calculates the mod (”%”) the first number by the second number and
// returns the result. For example Mod(8,2) should return 0, whereas Mod(7,2) should return 1
public class Math{
  int firstN;
  int secondN;
    static int answer;

    public static int findAnswer(int firstN,int secondN) {
      answer = (int) Math.pow(firstN, secondN);
      return answer;
    }

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        System.out.print("first number: ");
        int firstN = scanner.nextInt();
        System.out.print("second number: ");
        int secondN = scanner.nextInt();

        answer = findAnswer(firstN, secondN);
        System.out.println("answer: " + answer);

    }
    
}

    
