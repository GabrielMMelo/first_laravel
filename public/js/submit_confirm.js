var submit = document.querySelector("button[type=submit]");
  
/* set onclick on submit input */   
submit.setAttribute("onclick", "return submit_confirm()");

//submit.addEventListener("click", test);

function submit_confirm() {

  if (confirm('Você tem certeza desta ação? \u{1F914}')) {         
    return true;         
  } else {
    return false;
  }

}