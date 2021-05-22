<!DOCTYPE html>
<html>
<head>
    <title>Form Validation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
<style type="text/css">
    /*start adding '*' on required field*/
.required-field::before {
    content: "*";
    color: red;
}
 html {
    box-sizing: border-box;
  }

  *,
  *:before,
  *:after {
      box-sizing: inherit;
  }

  body {
    font-family: "Trebuchet MS", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Tahoma, sans-serif;
    background-color: #ECEFF1;
  }
  form {
    max-width: 300px;
    margin-top: 60px;
    margin-right: auto;
    margin-left: auto;
    text-align: left;
    position: relative;
    padding-top: 80px;
  }
  label,
  input {
      display: block;
  }
  label {
    font-size: 12px;
    text-transform: uppercase;
    color: #B0BEC5;
    margin-bottom: 10px;
  }
  input {
      width: 100%;
      padding: 10px;
      outline: 0;
      border: 2px solid #B0BEC5;
  }
  input.invalid {
      border-color: #DD2C00;
  }

  #notify {
    margin-top: 5px;
    padding: 10px;
    font-size: 12px;
    width: 100%;
    color: #fff;
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
  }
  #notify.error {
    background-color: #DD2C00;
  }
</style>

<body>
<div class="container">
    <form id="form">
  <div>
    <label for="username">Username</label>
    <input name="username" type="text" placeholder="Username" pattern="[a-z]{1,15}" id="username">
  </div>
  
</form> <!-- /form -->

</div>

<!--Form Validation script -->
<script type="text/javascript">
        //getting required elements (input value,form value)
    var input=document.getElementById('username'); 
    var form=document.getElementById('form');
   
   //next we'll create a new element which will contain our message;
    var elem=document.createElement('div');
    elem.id='notify';
    elem.style.display='none';
    form.appendChild(elem);

    //dealing with events (invalid,valid);
    input.addEventListener('invalid',function(event){
        event.preventDefault();
        if(! event.target.validity.valid){
            elem.textContent = 'Username should only contain lowercase letters e.g. john';
            elem.className = 'error'; //add a new class error;
            elem.style.display = 'block'; //show the message by setting display to 'block';

            //also add a invalid class to the input element giving it a red border color in CSS stylesheet;
            input.className = 'invalid animate__animated animate__bounce';
        }
    });

    //now dealing with second event (this event called when the input value is changed). We'll use this event to revert the input to its normal state, as well as hide the popup message.
    //as follows--
    input.addEventListener('input',function(event){
        if('block' === elem.style.display){
            input.className = '';
            elem.style.display = 'none';

            //As you can see above, we are going remove the class names from the input element and hide the popup message.
        }
    })();
</script>

</body>
</html>