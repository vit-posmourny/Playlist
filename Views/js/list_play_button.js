let audio = document.getElementById('myAudio');
const button = document.getElementsByClassName('list_play_button')[0];
const icon = document.getElementsByClassName('list_play_icon')[0];

button.addEventListener("click", myPlay);
audio.addEventListener('ended', myEnd);


function myPlay()
{
    if (button.classList.contains('state_pause'))
    {
        button.classList.remove('state_pause');
        button.classList.add('state_play');
        icon.setAttribute('src', "/Playlist/images/pause_circle_FILL0_wght300_GRAD0_opsz24.svg");
        return audio.play();
    }
    else if (button.classList.contains('state_play'))
    {
        button.classList.remove('state_play');
        button.classList.add('state_pause');
        icon.setAttribute('src', "/Playlist/images/play_circle_FILL0_wght300_GRAD0_opsz24.svg");
        return audio.pause();
    }

}

function myEnd(){
    alert('konec stopy');
    button.classList.remove('state_play');
    button.classList.add('state_pause');
    icon.setAttribute('src', "/Playlist/images/play_circle_FILL0_wght300_GRAD0_opsz24.svg");
}