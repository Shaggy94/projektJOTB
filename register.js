var myInput = document.getElementById("pwd");
var myInput2 = document.getElementById("pwd2");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
var repwd = document.getElementById("repwd");
var truetable[]={false,false,false,false,false};
var ok=document.getElementById("sub");
// When the user clicks on the password field, show the message box
// myInput.onfocus = function() {
//     document.getElementById("message").style.display = "block";
// }
//
// // When the user clicks outside of the password field, hide the message box
// myInput.onblur = function() {
//     document.getElementById("message").style.display = "none";
// }
// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
    truetable[0]=true;
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
    truetable[0]=false;
  }

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
    truetable[1]=true;
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
    truetable[1]=false;
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
    truetable[2]=true;
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
    truetable[2]=false;
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
    truetable[3]=true;
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
    truetable[3]=false;
  }
}

myInput2.onkeyup = function(){
  if(myInput.value==myInput2.value){
    repwd.classList.remove("invalid");
    repwd.classList.add("valid");
    truetable[4]=true;
  }
  else {
    repwd.classList.remove("valid");
    repwd.classList.add("invalid");
    truetable[4]=false;
  }
}
  // for(var i=0;i<5;i++){
  //   if(truetable[i]){
  //     ok.classList.remove("disabled");
  //   }else{
  //     ok.classList.add("disabled");
  //   }
  // }
