function addToken() {
    const token = document.getElementById("inputJWT").value;
    if (token === "") {
      document.getElementById("error").innerHTML = "Invalid token";
      document.getElementById("userInfo").style.display = "none";
      return;
    }
    
    const parsedToken = parseJwt(token);
    if (parsedToken === null) {
      document.getElementById("error").innerHTML = "Invalid token";
      document.getElementById("userInfo").style.display = "none";
      return;
    }
    
    localStorage.setItem("token", token);
    
    document.getElementById("name").innerHTML = parsedToken.name ? parsedToken.name : "No name";
    document.getElementById("email").innerHTML = parsedToken.email ? parsedToken.email : "No email";
    document.getElementById("age").innerHTML = parsedToken.age ? parsedToken.age : "No age";
    
    document.getElementById("error").innerHTML = "";
    document.getElementById("userInfo").style.display = "block";
  }
  


function parseJwt(token) {
    try {
        return JSON.parse(atob(token.split('.')[1]));
    } catch (e) {
        return null;
    }
}


function displayUserInfo() {
    let token = localStorage.getItem("token");
    if (token === null) {
        document.getElementById("error").innerHTML = "Invalid token";
        document.getElementById("userInfo").style.display = "none";
        return;
    }
    let parsedToken = parseJwt(token);
    if (parsedToken === null) {
        document.getElementById("error").innerHTML = "Invalid token";
        document.getElementById("userInfo").style.display = "none";
        return;
    }
    document.getElementById("name").innerHTML = parsedToken.name ? parsedToken.name : "No name";
    document.getElementById("email").innerHTML = parsedToken.email ? parsedToken.email : "No email";
    document.getElementById("age").innerHTML = parsedToken.age ? parsedToken.age : "No age";
    document.getElementById("error").innerHTML = "";
    document.getElementById("userInfo").style.display = "block";
}


function clearUserInfo() {
    localStorage.clear();
    document.getElementById("userInfo").style.display = "none";
}


function init() {
    if (localStorage.getItem("token") !== null) {
        displayUserInfo();
    }
}


