import java.util.Scanner;

public class Math{
  int firstN;
  int secondN;
    static int answer;

// Developer: Saaid Abdulle
// University ID: 230165283
// Function: This function takes two integers as input, calculates the mod (”%”) the first number by the second number and
// returns the result. For example Mod(8,2) should return 0, whereas Mod(7,2) should return 1

    public static int findAnswer(int firstN,int secondN) {
      answer = (int) Math.pow(firstN, secondN);
      return answer;
    }

}

    
