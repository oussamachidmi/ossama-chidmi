
const { isPalindrome } = require('./isPalindrome');

describe('test isPalindrome', () => {
    it('should return true if input is "aviva"', () => {
        expect(isPalindrome('aviva')).toBe(true);
    }
    );
    it('should return true if input is "A santa at NASA"', () => {
        expect(isPalindrome('A santa at NASA')).toBe(true);
    }
    );
    it('should return true if input is "A man, a plan, a canal. Panama"', () => {
        expect(isPalindrome('A man, a plan, a canal. Panama')).toBe(true);
    });
    it('should return true if input is "Ras it a car or a cat I saR?"', () => {
        expect(isPalindrome('rap xt a car or a cat x par?')).toBe(true);
    });
    it('should return true if input is "xap"', () => {
        expect(isPalindrome('xap')).toBe(false);
    });
    it('should return true if input is "qasme"', () => {
        expect(isPalindrome('qasme')).toBe(false);
    });
    it ('should return true if input is 23', () => {
        expect(isPalindrome(23)).toBe(false);
    }
    );
});