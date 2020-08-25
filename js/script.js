$( document ).ready(function() {
    $("#register").on('click', function(e){
      e.preventDefault();
      var username = $("#username").val();
      var email = $("#email").val();
      var pass = $("#pass").val();
      var cpass = $("#cpass").val();

      if (username == "" || email == "" || pass == "" | cpass =="") {
        alert('Fill in all the necessarry details');
        return false;
      }
      if (pass != cpass) {
        alert('Password and Confirmed Passwords need to be similar');
        return false;
      }
      $.post("RegistrationPost.php",
        //JS Object to be posted to the orders.php file
          {username:username, email:email, password:pass},
          //Callback
          function(result){
            alert(result);
            if (result=="ok") {
              alert('Account Created and Setup');
              window.location.href = 'setup.php';
            }
       /* var p = JSON.parse(result);
        console.log(result);
        alert(p.name);*/
      });

    });
});
