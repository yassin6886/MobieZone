function hidefunc()
    {
        if(document.getElementById('dropdown').value == "1")
            document.getElementById('profilepic').style.display="inline";
        else
            document.getElementById('profilepic').style.display="none";
    }
    function userCheck()
    {
      var regex=  /^[A-Za-z0-9_@.|-]*$/;
      if (document.getElementById('cus_name').value.match(regex)) 
      {
        document.getElementById('usermessage').style.color = 'green';
        document.getElementById('usermessage').innerHTML = 'Valid Username';
      } 
      else 
      {
        document.getElementById('usermessage').style.color = 'red';
        document.getElementById('usermessage').innerHTML = 'Only special characters   _ @ . | -  are allowed';
      }
    }
    function disfunc()
    {
      if(document.getElementById('usermessage').style.color == 'green')
        {
        document.getElementById("submit").removeAttribute("disabled");
      }
      else{
        document.getElementById("submit").setAttribute("disabled", "disabled");
      }
    }



    
    var submit = document.querySelector("#submit");
    var expandBg = document.querySelector("#expand");

    submit.onclick = function() {
      expandBg.style.background = "#fcd25a";
}