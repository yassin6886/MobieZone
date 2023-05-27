function check() 
      {
        if (document.getElementById('newpwd').value ==
        document.getElementById('cnfmpwd').value) 
        {
          document.getElementById('message').style.color = 'lime';
          document.getElementById('message').innerHTML = 'matching';
        } 
        else 
        {
          document.getElementById('message').style.color = 'tomato';
          document.getElementById('message').innerHTML = 'not matching';
        }
      }
      function CheckPassword() 
      { 
        var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,}$/;
        if(document.getElementById('newpwd').value.match(decimal)) 
        { 
          document.getElementById('pwdmessage').style.color = 'lime';
          document.getElementById('pwdmessage').innerHTML = 'Valid Password';
        }
        else
        { 
          document.getElementById('pwdmessage').style.color = 'tomato';
          document.getElementById('pwdmessage').innerHTML = 'Should contain minimum 8 characters with at least a numeric, uppercase ,lowercase and special character';
        }
      }
      function disfunc()
      {
        if(document.getElementById('message').style.color == 'lime' &&
          document.getElementById('pwdmessage').style.color == 'lime')
          {
          document.getElementById("reset").removeAttribute("disabled");
        }
        else{
          document.getElementById("reset").setAttribute("disabled", "disabled");
        }
      }