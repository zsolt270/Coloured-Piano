let submitBtn = document.getElementById("submit");
let regForm = document.getElementById("regForm");
let sendVmailForm = document.getElementById("sendVmailForm");
let getNewPwd = document.getElementById("getNewPwd");
let spinner = document.getElementById("spinner");
let inputs = document.querySelectorAll("input");
var xhr = new XMLHttpRequest();

//tooltip
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
//tooltip

//Error hiding on form, if users type in again
inputs.forEach( (input) =>{
  input.addEventListener('input', ()=>{
    if(input.classList.contains("failed")){
      let errorMsg= input.parentElement.nextElementSibling;
      input.classList.remove("failed");
      if(errorMsg.nodeName == "P" && errorMsg.classList.contains("text-danger")){
        errorMsg.style.display = "none";
      }
    }
    if(document.getElementById("givenMailError").value != null){
      document.getElementById("givenMailError").style.display = "none";
    }
  });
});

//Show spinners
try{
  regForm.addEventListener('submit', ()=>{
    submitBtn.style.display= "none";
    spinner.classList.remove('d-none');
  })

}
catch{
  console.log("regForm Form hiba")
}
try{
  sendVmailForm.addEventListener('submit', ()=>{
    submitBtn.style.display= "none";
    spinner.classList.remove('d-none');
  })
}
catch{
  console.log("sendVmailForm Form hiba")

}
try{
  getNewPwd.addEventListener('submit', ()=>{
    submitBtn.style.display= "none";
    spinner.classList.remove('d-none');
  })
  
}
catch{
  console.log("getNewPwd Form hiba")
}