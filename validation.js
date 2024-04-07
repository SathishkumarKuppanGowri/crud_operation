function nameValid(inputElement) {
      
    var nameInput = inputElement.value.trim();
      
    var pattern= /^[a-zA-Z\s]+$/;
if(pattern.test(nameInput)){
    document.getElementById('name_error').innerHTML =  ""  ;
}else{
    document.getElementById('name_error').innerHTML = "Name - alphabet & space only"  ;
}
   
}

function emailValidat(inputElement){
    var emailInput= inputElement.value.trim()
    var pattern=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(pattern.test(emailInput)){
        document.getElementById('email_error').innerHTML =  ""  ;
    }else{
        document.getElementById('email_error').innerHTML = "Enter valid email address"  ;
    }
}

function phoneValidat(inputElement){
var phoneInput=inputElement.value;
var pattern=/^\d{10}$/;
if(pattern.test(phoneInput)){
    document.getElementById('phone_error').innerHTML =  ""  ;
}else{
    document.getElementById('phone_error').innerHTML = "Only digits allowed"  ;
}
}
function pinValidat(inputElement){
    var pinInput=inputElement.value;
    var pattern=/^\d{6}$/;
    if(pattern.test(pinInput)){
        document.getElementById('pin_error').innerHTML =  ""  ;
    }else{
        document.getElementById('pin_error').innerHTML = "Only digits allowed"  ;
    }
    }
