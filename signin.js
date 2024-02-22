function openSigninForm() {
  document.getElementById("signinForm").style.display = "block";
}

function closeSigninForm() {
  document.getElementById("signinForm").style.display = "none";
}

function openSignupForm() {
  document.getElementById("signupForm").style.display = "block";
}

function closeSignupForm() {
  document.getElementById("signupForm").style.display = "none";
}

function sendData(){
  var lastname = document.getElementById("lastname").value;
  var firstname = document.getElementById("firstname").value;
  var birthdate = document.getElementById("birthdate").value;
  var email =document.getElementById("email").value;
  var pwd =document.getElementById("pwd").value;
  $.ajax({
    type: 'POST',
    url: 'signup.php',
    data: {
      lastname:lastname,
      firstname:firstname,
      birthdate:birthdate,
      email:email,
      pwd:pwd
    },
    success: function(response){
      let responseString = JSON.parse(response);
      if(responseString == "error email"){
        alert("Cette adresse mail est déja associée a un compte.");
        console.log(responseString);
      }
      if(responseString == "error birthdate"){
        alert("Vous n'avez pas l'age requis pour créer un compte.");
        console.log(responseString);
      }
    }
  });
    
  return false;
}

function checkData(){
  var email =document.getElementById("emailbis").value;
  var pwd =document.getElementById("pwdbis").value;
  $.ajax({
    type: 'POST',
    url: 'signin.php',
    data: {
      email:email,
      pwd:pwd
    },
    success: function(response){
      let responseString = JSON.parse(response);
      if(responseString == "error no account"){
        alert("Ce compte n'existe pas");
        console.log(responseString);
      } else {
        console.log(responseString);
      }
    }
  });
    
  return false;
}