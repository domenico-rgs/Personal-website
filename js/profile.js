/* Play/Pause and hidden audio onclick */
function playAudio() {
    var myAudio = document.getElementById('audio');
        if (!myAudio.paused) {
            myAudio.pause();
        } else {
            myAudio.play();
        }
}

/* Change a string with the name of the social selected */
function showMore(name){
    var mainContent = document.getElementById("social-intro");
    mainContent.style.opacity = 0;
    window.setTimeout(function () {
                        mainContent.innerHTML = name;
                        mainContent.style.opacity = 1;
                        },250);
}