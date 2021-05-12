/* Change a string with the name of the social selected */
function showMore(name){
	if(window.innerWidth < 800){ return; }
	
    var mainContent = document.getElementById("social-intro");
    mainContent.style.opacity = 0;
    window.setTimeout(function () {
                        mainContent.innerHTML = name;
                        mainContent.style.opacity = 1;
                        },250);
}