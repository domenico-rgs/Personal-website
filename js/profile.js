 function playAudio() {
    var myAudio = document.getElementById('audio');
        if (!myAudio.paused) {
            myAudio.pause();
        } else {
            myAudio.play();
        }
}

function showMore(name){
    var mainContent = document.getElementById("social-intro");
    mainContent.style.opacity = 0;
    window.setTimeout(function () {
                        mainContent.innerHTML = name;
                        mainContent.style.opacity = 1;
                        },250);
}