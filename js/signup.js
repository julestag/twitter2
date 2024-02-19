function sendData(){
  var lastname = document.getElementById("signupLastname").value;
  var firstname =document.getElementById("signupFirstname").value;
  var birthdate =document.getElementById("signupBirhtDate").value;
  var email =document.getElementById("signupEmail").value;
  var pwd =document.getElementById("signupPwd").value;



  $.ajax({
    type: 'post',
    url: '/php/signup.php',
    data: {
      lastname:lastname,
      firstName:firstname,
      birthdate:birthdate,
      email:email,
      pwd:pwd
    },
  });

  return false;
}