package fr.epita.assistants.forkjoin;

import java.util.concurrent.RecursiveTask;

public class MyRecursiveTask extends RecursiveTask<Double> {

  private final double[][] matrix;
  private final int xlb;
  private final int xub;
  private final int ylb;
  private final int yub;

  public MyRecursiveTask(
    double[][] matrix,
    int xlb,
    int xub,
    int ylb,
    int yub
  ) {
    this.matrix = matrix;
    this.xlb = xlb;
    this.xub = xub;
    this.ylb = ylb;
    this.yub = yub;
  }

  @Override
  protected Double compute() {
    // test if the matrix is emtpy
    if (matrix.length == 0) {
      return 0.0;
    }
    if (xub - xlb <= 5 || yub - ylb <= 5) {
      double sum = 0.0;
      for (int i = ylb; i < yub; i++) {
        for (int j = xlb; j < xub; j++) {
          sum += matrix[i][j];
        }
      }
      return sum / (xub * yub - xub * ylb - xlb * yub + xlb * ylb);
    } else {
      int xMid = (xlb + xub) / 2;
      int yMid = (ylb + yub) / 2;

      MyRecursiveTask ts1 = new MyRecursiveTask(matrix, xlb, xMid, ylb, yMid);
      MyRecursiveTask ts2 = new MyRecursiveTask(matrix, xMid, xub, ylb, yMid);
      MyRecursiveTask ts3 = new MyRecursiveTask(matrix, xlb, xMid, yMid, yub);
      MyRecursiveTask ts4 = new MyRecursiveTask(matrix, xMid, xub, yMid, yub);

      ts2.fork();
      ts3.fork();
      ts4.fork();
      double result = ts1.compute();

      return (ts2.join() + ts3.join() + ts4.join() + result) / 4;
    }
  }
}
