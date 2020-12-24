function myFunction() {
  var x = document.getElementById("menu");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

function openForm() {
  document.getElementById("accessForm").style.display = "block";
}

function closeForm() {
  document.getElementById("accessForm").style.display = "none";
}