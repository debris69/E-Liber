function validate(){
  var regName = /^[a-zA-Z]+ [a-zA-Z]+$/;
  var name = document.getElementById('reg-name').value;
  var email = document.getElementById('reg-email').value;
  var pwd = document.getElementById('reg-pwd').value;



  if(!regName.test(name)){
    alert('Please enter your full name (first & last name).');
    return false;
  }

  else{
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
    {
      if(pwd.value.length==0){
        alert('Password cannot be blank!');
        return false;
      }
      else{
        document.getElementById('register-form').submit();
      }

    }
    else{
      alert("You have entered an invalid email address!");
      return false;
    }
  }

}
