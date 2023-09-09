const sign_Btn=document.getElementById("signup_btn");
sign_Btn.addEventListener("click",sginFunction)

//email

const input_email = document.getElementById("input_email");
const email_message = document.getElementById("email_message");
email_message.style.display="none";
const email_format = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


    //mobile
    const input_mobile = document.getElementById("input_mobile");
    const message_mobile = document.getElementById("message_mobile");
    message_mobile.style.display="none";
    const format_num= (/077[0-9]{7}/);
    //password
    const input_pass = document.getElementById("input_pass");
    const pass_message = document.getElementById("pass_message");
    pass_message.style.display="none";
    const format_pass = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;

    //check
    const check_terms = document.getElementById("check_terms");
    const check_terms_message = document.getElementById("check_terms_message");
    check_terms_message.style.display="none";
    

function sginFunction() {
    //email
    debugger
 if(input_email.value===""){

    email_message.style.display="block";
    email_message.innerHTML="email is empty";

 }
 else {
    email_message.style.display="none";
    
    if (input_email.value.match(email_format)){
        email_message.style.display="block";
        email_message.innerHTML="email valid";
    }
    else {
        email_message.style.display="block";
        email_message.innerHTML="email not valid";
    }
}


//mobile
  
  if(input_mobile.value===""){
    message_mobile.style.display="block";
    message_mobile.innerHTML="mobile is empty";    
}
else{
    message_mobile.style.display="none"; 

    if(input_mobile.value.match(format_num)){
        message_mobile.style.display="none"; 
    }
    else{
        message_mobile.style.display="block";
        message_mobile.innerHTML="must be orange num";  
    }
}
//pass
if(input_pass.value===""){
    pass_message.style.display="block";
    pass_message.innerHTML="Password is empty ";
}
else{
    pass_message.style.display="none";


    if(input_pass.value.match(format_pass)){
        pass_message.style.display="none"; 
    }
    else{
        pass_message.style.display="block";
        pass_message.innerHTML="Password Not Valid";  
    }
}
//check
if(!check_terms.checked){
    check_terms_message.style.display="block";
    check_terms_message.innerHTML="The Terms & Conditions Not Checked";
}
else{
    check_terms_message.style.display="none";
    check_terms.style.backgroundColor="red";
    
}    

}
