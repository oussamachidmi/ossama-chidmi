"use strict";

const {
  InvalidUsernameError,
  InvalidPasswordError,
  InvalidYearOfBirthError,
} = require("./accountError");

class Account {
  constructor(username, password, yearOfBirth) {
    let regpas = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,100}/ ;
    let regus = /^[a-zA-Z0-9_-]+$/ ;
    if (typeof username != 'string' || username == null || username.length < 1   || !regus.test(username)) {
      throw new InvalidUsernameError();
    }
    else {
      this.username = username;
    }
    if (typeof username != 'string'|| password == null || password.length > 100 || !regpas.test(password) ) {
      throw new InvalidPasswordError();
    }
    else {
      this.password = password;
    }
    if (yearOfBirth < 1800 || yearOfBirth > new Date().getFullYear() || yearOfBirth == null || !Number.isInteger(yearOfBirth)) {
      throw new InvalidYearOfBirthError();
    }
    else
    {
      this.yearOfBirth = yearOfBirth;
    }
  }
}



module.exports = {
  Account,
};
