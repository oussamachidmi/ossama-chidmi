
const { factorial } = require('./factorial');

describe('test factorial', () => {
    it(`should return 1 if input 0`, () => {
        expect(factorial(0)).toBe(1);
    });
    it(`should return 1 if input 1`, () => {
        expect(factorial(1)).toBe(1);
    }
    );
    it(`should return 2 if input 2`, () => {
        expect(factorial(2)).toBe(2);
    }
    );
    it(`should return 6 if input 3`, () => {
        expect(factorial(3)).toBe(6);
    }
    );
    it(`should return 24 if input 4`, () => {
        expect(factorial(4)).toBe(24);
    }
    );
    it(`should return 120 if input 5`, () => {
        expect(factorial(5)).toBe(120);
    }
    );
    it(`should return 720 if input 6`, () => {
        expect(factorial(6)).toBe(720);
    }
    );
    it(`should return if input is negative`, () => {
        expect(factorial(-1)).toBe(-1);
    }
    );

    it(`should return if input is negative`, () => {
        expect(factorial(20)).toBe(2432902008176640000);
    }
    );
    it(`should return if input is negative`, () => {
        expect(factorial(-20)).toBe(-1);
    }
    );
    it(`should return if input is negative`, () => {
        expect(factorial("sdq")).toBe(-1);
    }
    );
    it(`should return if input is flotant`, () => {
        expect(factorial(1.2)).toBe(-1);
    }
    );
    it(`should return if input is flotant`, () => {
        expect(factorial(111.2221)).toBe(-1);
    }
    );
    // do i need to test for null and undefined?
    it(`should return if input is null`, () => {
        expect(factorial(null)).toBe(-1);
    }
    );
    it(`should return if input is undefined`, () => {
        expect(factorial(undefined)).toBe(-1);
    }
    );
});

// command to run those tests: npm run test factorial.test.js