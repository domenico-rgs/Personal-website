function exists(input){
    var flag = false;
    if(input){
        for(var i=0; i<input.length; i++){
            if(input.charAt(i)!=" "){
                flag=true;
                break;
            }
        }
    }
    return flag;
}

function noIntegerNumber(input){
    var noNumber = true;
    for(var i = 0; i<input.length; i++){
        if(!parseInt(input.charAt(i))){
            noNumber=false;
            break;
        }
    }
    return noNumber;
}

function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function checkForm() {
    var message = "";
    if (!exists(document.contact_form.name.value) || noIntegerNumber(document.contact_form.name.value)) 
        message += "Name entered is not valid<br>";
    if (!exists(document.contact_form.surname.value) || noIntegerNumber(document.contact_form.surname.value)) 
        message += "Surname entered is not valid<br>";
    if(!validateEmail(document.contact_form.email.value))
        message += "Email entered is not valid<br>";
    if (!exists(document.contact_form.message.value) ) 
        message += "Please add your message to me";
   			
    if ( message != "" ) 
       Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: message })
    else
        document.contact_form.submit();
    }