package fr.epita.assistants.mykitten;

import java.io.IOException;
import java.nio.charset.StandardCharsets;
import java.nio.file.Files;
import java.nio.file.Paths;
import java.util.stream.Collectors;
import java.util.stream.Stream;

/* In this exercise you will be able to practice Streams and IO in Java. We will test your static method miaou following this prototype:
public static void miaou(String srcPath, String destPath, String wordToReplace);
This method will read the contents of the source file given by the path srcPath and will, for each line: 1. Prepend the line number to each line, followed by a space, starting with 1.
2. Replace all the occurrences of wordToReplace with “miaou”.
The processed result will be written in the file given by the path destPath.
To do so, you will first have to implement the constructor and methods of the MyKitten class. This will
make implementing the static method miaou straightforward.
  
Be careful!
You must thoroughly follow the given architecture since it will be tested. Do not add any method or attribute. Those provided are sufficient. */

public class MyKitten {

  /**
   * Initializer.
   *
   * @param srcPath Source file path.
   */

  // let's initialize the streamContent field with the content of the file

  public Stream<String> streamContent;
  public int lineNumber;

  public MyKitten(String srcPath) {
     // let's initialize the streamContent field with the content of the file

    this.lineNumber = 1;
    try {
        // this is not working i got expetion 
         this.streamContent = Files.lines(Paths.get(srcPath));
        // this is working
    } catch ( IOException e ) {
        System.out.println("error constroctor    XX     " + e.getMessage()); 
        }
  }

  /**
   * Use the streamContent to replace `wordToReplace` with "miaou". Don't forget
   * to add the line number beforehand for each line. Store the new
   * result directly in the streamContent field.
   *
   * @param wordToReplace The word to replace
   */

  public void replaceByMiaou(String wordToReplace) {

    // Conditional branching and loops are not allowed, you must use the streams API!
    try {

    this.streamContent= this.streamContent
    .map(line -> (line.replaceAll(wordToReplace, "miaou")))
    .map(line -> (lineNumber++ + " " + line));

    } catch ( Exception e ) {
        System.out.println("error " + e.getMessage()); 
    }
  }

  /**
   * Use the streamContent to write the content into the destination file.
   *
   * @param destPath Destination file path.
   */
  public void toFile(String destPath) {

    // let's Use the streamContent to write the content into the destination file.
    try {
      Files.write(Paths.get(destPath), (Iterable<String>) this.streamContent::iterator);
    } catch ( IOException e ) {
      System.out.println("error " + e.getMessage()); 
    }
  }

  /**
   * Creates an instance of MyKitten and calls the above methods to do it
   * straightforwardly.
   *
   * @param srcPath       Source file path
   * @param destPath      Destination file path
   * @param wordToReplace Word to replace
   */
  public static void miaou(
    String srcPath,
    String destPath,
    String wordToReplace
  ) {
    System.out.println("Miaouing ossama" + srcPath + " to " + destPath);
    MyKitten myKitten = new MyKitten(srcPath);
    myKitten.replaceByMiaou(wordToReplace);
    myKitten.toFile(destPath);
  }
}
