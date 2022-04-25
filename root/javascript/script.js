function erPassordLike(){
  let passord1 = document.getElementById('password1').value;
  let passord2 = document.getElementById('password2').value;
  if(passord1 !== passord2 )
    alert("like passord");
  else{
    alert("passord er ikke like");
  }
}

function logData(){
  console.log(document.getElementById('password1').value);
  console.log(document.getElementById('password2').value);
}