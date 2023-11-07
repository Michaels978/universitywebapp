//Get 'top' button
let button = document.getElementById("top");

//Go to top of the webpage
function topFunction() 
{
  document.body.scrollTop = 0; //Will work if the browser is Safari
  document.documentElement.scrollTop = 0; //Will work if the browser is Chrome, Firefox, IE or Opera
}