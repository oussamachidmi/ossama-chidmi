// let's test power function

const { power } = require('./power');

describe('test power', () => {
    
    it(`should return 1 if input is 1, 0`, () => {
        expect(power(1, 0)).toBe(1);
    });   
    it(`should return 1 if input is -1, 2`, () => {
        expect(power(-1, 2)).toBe(1);
    });   
    it(`should return 1 if input is -1, 2`, () => {
        expect(power(-2, -2)).toBe(0.25);
    });   
    it(`should return 1 if input is -1, 2`, () => {
        expect(power(3, -2)).toBe(0.1111111111111111);
    });   
    it(`should return 4 if input is -2, 2`, () => {
        expect(power(-2, 2)).toBe(4);
    });   
    it(`should return 4 if input is 2, 2`, () => {
        expect(power(2,2)).toBe(4);
    });   
    it(`should return 77 if input is 77, 1`, () => {
        expect(power(77, 1)).toBe(77);
    });
    it(`should return 0 if input is 0, 0`, () => {
        expect(power(0, 0)).toBe(1);
    });
    it(`should return 0 if input is 0, 1`, () => {
        expect(power(0, 1)).toBe(0);
    }
    );
    it(`should return 10240000000000 if input is 20, 10`, () => {
        expect(power(20, 10)).toBe(10240000000000);
    }
    );
    it(`should return 10240000000000 if input is 20, 10`, () => {
        expect(power("s", 10)).toBe(-1);
    }
    );
    it(`should return 10240000000000 if input is 20, 10`, () => {
        expect(power(1, "s")).toBe(-1);
    }
    );
    it(`should return 10240000000000 if input is 20, 10`, () => {
        expect(power("sq", "s")).toBe(-1);
    }
    );
    it(`should return if input is flotant`, () => {
        expect(power(1.2, 1)).toBe(1.2);
    }
    );
    it(`should return if input is flotant`, () => {
        expect(power(1, 1.2)).toBe(1);
    }
    );
    it(`should return if input is flotant`, () => {
        expect(power(1.2, 1.2)).toBe(1.2445647472039776);
    }
    );
    it(`should return if input is flotant`, () => {
        expect(power(-1.2, 1.2)).toBe(NaN);
    }
    );

    // do i need to test for null and undefined?
    it(`should return if input is null`, () => {
        expect(power(null, 1)).toBe(-1);
    }
    );
    it(`should return if input is null`, () => {
        expect(power(1, null)).toBe(-1);
    }
    );
    it(`should return if input is null`, () => {    
        expect(power(null, null)).toBe(-1);
    }
    );
    it(`should return if input is undefined`, () => {
        expect(power(undefined, 1)).toBe(-1);
    }
    );
    it(`should return if input is undefined`, () => {
        expect(power(1, undefined)).toBe(-1);
    }
    );
    it(`should return if input is undefined`, () => {
        expect(power(undefined, undefined)).toBe(-1);
    }
    );
    it(`should return if input is NaN`, () => {
        expect(power(NaN, 1)).toBe(-1);
    }
    );
    it(`should return if input is NaN`, () => {
        expect(power(1, NaN)).toBe(-1);
    }
    );
    it(`should return if input is NaN`, () => {
        expect(power(NaN, NaN)).toBe(-1);
    }
    );

});
