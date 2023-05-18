function armstrongNumber(number){
    if (number < 0 || number == null) return false;
    let s = 0 ,tmp = number;
    let r = 0;
    let sti = number.toString();
    let len = sti.length;
    while (tmp > 0){
        var rm = tmp % 10;
        s += Math.pow(rm, len);
        tmp = Math.floor(tmp / 10);
    }
    if (s === number) return true;
    return false;
}

module.exports = {
  armstrongNumber,
}