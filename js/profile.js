 function playAudio() {
    var myAudio = document.getElementById('audio');
        if (!myAudio.paused) {
            myAudio.pause();
        } else {
            myAudio.play();
        }
}