/* When needed makes the menu hamburger */
function hamburger() {
  var x = document.getElementById("menu");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

/* Display or not restricted area block */
function openForm() {
  document.getElementById("accessForm").style.display = "block";
}

function closeForm() {
  document.getElementById("accessForm").style.display = "none";
}