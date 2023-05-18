
class InvalidPasswordError extends Error {
  constructor() {
    super();
    this.name = "InvalidPasswordError";
    this.message = "Password is invalid";
  }
}

class InvalidUsernameError extends Error {
  constructor() {
    super();
    this.name="InvalidUsernameError";
    this.message = "Username is invalid";
  }
}

class InvalidYearOfBirthError extends Error {
  constructor() {
    super();
    this.name="InvalidYearOfBirthError"
    this.message = "Year of birth is invalid";
  }
}

module.exports = {
    InvalidPasswordError,
    InvalidUsernameError,
    InvalidYearOfBirthError,
}

