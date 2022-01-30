// valid input
let inputs = document.querySelectorAll('.form-control');
let login = document.querySelectorAll('.login');

inputs.forEach(input => {

input.addEventListener('input', function () {
if (this.value && this.value.length > 0) {
    
  $(login).addClass("toggle");
} 
else {

   $(login).removeClass("toggle");
  
 }
 
 });
});
