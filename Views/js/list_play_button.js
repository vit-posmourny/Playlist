let audio = document.getElementById('myAudio');
const button = document.getElementsByClassName('list_play_button')[0];
const icon = document.getElementsByClassName('list_play_icon')[0];

audio.addEventListener("play", iconCheck);
audio.addEventListener("pause", iconCheck);
audio.addEventListener('ended', myEnd);
button.addEventListener('click', playCheck);


function iconCheck()
{
    if (audio.classList.contains('state_pause'))
    {
        audio.classList.remove('state_pause');
        audio.classList.add('state_play');
        icon.setAttribute('src', "/Playlist/images/pause_circle_FILL0_wght300_GRAD0_opsz24.svg");
    }
    else if (audio.classList.contains('state_play'))
    {
        audio.classList.remove('state_play');
        audio.classList.add('state_pause');
        icon.setAttribute('src', "/Playlist/images/play_circle_FILL0_wght300_GRAD0_opsz24.svg");
    }
    
}

function playCheck()
{
    if (audio.classList.contains('state_pause'))
    {
        // audio.classList.remove('state_pause');
        // audio.classList.add('state_play');
        // icon.setAttribute('src', "/Playlist/images/pause_circle_FILL0_wght300_GRAD0_opsz24.svg");
        return audio.play();
    }
    else if (audio.classList.contains('state_play'))
    {
        // audio.classList.remove('state_play');
        // audio.classList.add('state_pause');
        // icon.setAttribute('src', "/Playlist/images/play_circle_FILL0_wght300_GRAD0_opsz24.svg");
        return audio.pause();
    }

}

function myEnd(){
    alert('konec stopy');
    button.classList.remove('state_play');
    button.classList.add('state_pause');
    icon.setAttribute('src', "/Playlist/images/play_circle_FILL0_wght300_GRAD0_opsz24.svg");
}