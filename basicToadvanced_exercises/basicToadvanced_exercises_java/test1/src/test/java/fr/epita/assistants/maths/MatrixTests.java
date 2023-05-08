package fr.epita.assistants.maths;

/*You must test the following methods:
// Matrix constructor
// Must have at least 4 tests public Matrix(int[][] matrix);
// Check if two matrices are equal // Must have at least 4 tests public boolean equals(Object obj);
// Multiply two matrices
// Must have at least 2 tests public Matrix multiply(Matrix mat2);
We expect you to write a minimum number of tests for each method as listed above to test all the different edge cases possible.
 */

import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.*;


/* */


class MatrixTests {
    @Test
    void testEmptyConstructor() {
        Matrix matrix = new Matrix(new int[][]{});
        assertArrayEquals(new int[][]{}, matrix.getMatrix());
    }

    @Test
    void testMatrixConstructor() {
        int[][] m = {{4, 3, 3}, {4, 4, 4, 7}};
        Matrix matrix = new Matrix(m);
        assertArrayEquals(m, matrix.getMatrix());
    }

    @Test
    void testMatrixConstructorNotEqual() {
        int[][] m = {{4, 3, 3}, {4, 4, 4, 7}};
        Matrix matrix = new Matrix(m);
        assertNotEquals(m, matrix.getMatrix());
    }

    @Test
    void testEmptyConstructorNull() {
        Matrix matrix = new Matrix(null);
        assertArrayEquals(new int[][]{{5, 0, 2}, {6, -4, 4}, {1, 4, 1}}, matrix.getMatrix());
    }

    // equals

    @Test
    void testEqualsWithDifferentClass() {
        Matrix matrix = new Matrix(new int[][]{{5, 0, 2}, {6, -4, 4}, {1, 4, 1}});
        assertFalse(matrix.equals(4));
    }

    @Test
    void testEqualsWithNull() {
        Matrix matrix = new Matrix(null);
        assertTrue(matrix.equals(new Matrix(new int[][]{{4, 1, 0}, {4, -4, 3}, {2, -8, 1}})));
    }

    @Test
    void testEquals() {
        Matrix matrix1 = new Matrix(new int[][]{{5, 0, 2}, {6, -4, 4}, {1, 4, 1}});
        Matrix matrix2 = new Matrix(new int[][]{{4, 1, 0}, {4, -4, 3}, {2, -8, 1}});
        assertTrue(matrix1.equals(matrix2));
    }

    @Test
    void testEqualsReflexive() {
        Matrix matrix1 = new Matrix(new int[][]{{5, 0, 2}, {6, -4, 4}, {1, 4, 1}});
        assertTrue(matrix1.equals(matrix1));
    }

   //  not equals

    @Test
    void testEqualsSymmetric() {
        Matrix matrix1 = new Matrix(new int[][]{{5, 0, 2}, {6, -4, 4}, {1, 4, 1}});
        Matrix matrix2 = new Matrix(new int[][]{{4, 1, 0}, {4, -4, 3}, {2, -8, 1}});
        assertTrue(matrix1.equals(matrix2));
        assertTrue(matrix2.equals(matrix1));
    }
    //  equals transitive

    @Test
    void testNotEquals() {
        Matrix matrix1 = new Matrix(new int[][]{{5, 0, 2}, {6, -4, 4}, {1, 4, 1}});
        Matrix matrix2 = new Matrix(new int[][]{{4, 1, 0}, {4, -4, 3}, {2, -4, 1}});
        assertFalse(matrix1.equals(matrix2));
    }

    // let's implement not equals reflexive

    @Test
    void testNotEqualsReflexive() {
        Matrix matrix1 = new Matrix(new int[][]{{5, 0, 2}, {6, -4, 4}, {1, 4, 1}});
        assertFalse(matrix1.equals(matrix1));
    }

    // let's implement not equals symmetric

    @Test

    void testNotEqualsSymmetric() {

        Matrix matrix1 = new Matrix(new int[][]{{5, 0, 2}, {6, -4, 4}, {1, 4, 1}});

        Matrix matrix2 = new Matrix(new int[][]{{4, 1, 0}, {4, -4, 3}, {2, -8, 1}});

        assertFalse(matrix1.equals(matrix2));

        assertFalse(matrix2.equals(matrix1));

    }

    // let's test multiply 

    @Test
    void testMultiply() {
        Matrix matrix1 = new Matrix(new int[][]{{5, 0, 2}, {6, -4, 4}, {1, 4, 1}});
        Matrix matrix2 = new Matrix(new int[][]{{4, 1, 0}, {4, -4, 3}, {2, -8, 1}});
        Matrix matrix3 = new Matrix(new int[][]{{14, -32, 11}, {24, -40, 24}, {10, -4, 7}});
        assertEquals(matrix3, matrix1.multiply(matrix2));
    }

    // let's test multiply with null

    @Test
    void testMultiplyWithNull() {
        Matrix matrix1 = new Matrix(null);
        Matrix matrix2 = new Matrix(new int[][]{{4, 1, 0}, {4, -4, 3}, {2, -8, 1}});
        Matrix matrix3 = new Matrix(new int[][]{{14, -32, 11}, {24, -40, 24}, {10, -4, 7}});
        assertEquals(matrix3, matrix1.multiply(matrix2));
    }

    // let's test with different dimensions

    @Test
    void testMultiplyWithDifferentDimensions() {
        Matrix matrix1 = new Matrix(new int[][]{{5, 0, 2}, {6, -4, 4}, {1, 4, 1}});
        Matrix matrix2 = new Matrix(new int[][]{{4, 1, 0}, {4, -4, 3}});
        Matrix matrix3 = new Matrix(new int[][]{{14, -32, 11}, {24, -40, 24}, {10, -4, 7}});
        assertEquals(matrix3, matrix1.multiply(matrix2));
    }



}

    
