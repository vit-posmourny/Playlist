let audio = document.getElementById('myAudio');
const icons = document.getElementsByClassName('list_play_icon');
console.log(icons);

audio.addEventListener("play", iconCheck);
audio.addEventListener("pause", iconCheck);
audio.addEventListener('ended', myEnd);

// icon.addEventListener('click', playCheck);

for (let i = 0; i < icons.length; i++) {
    
    icons[i].tagName + "<br>";
}

function iconCheck()
{
    if (audio.classList.contains('state_pause'))
    {
        audio.classList.remove('state_pause');
        audio.classList.add('state_play');
        icon.setAttribute('src', "/playlist/images/pause_circle_FILL0_wght300_GRAD0_opsz24.svg");
    }
    else if (audio.classList.contains('state_play'))
    {
        audio.classList.remove('state_play');
        audio.classList.add('state_pause');
        icon.setAttribute('src', "/playlist/images/play_circle_FILL0_wght300_GRAD0_opsz24.svg");
    }
    
}

function playCheck()
{
    if (audio.classList.contains('state_pause'))
    {
        // audio.classList.remove('state_pause');
        // audio.classList.add('state_play');
        // icon.setAttribute('src', "/playlist/images/pause_circle_FILL0_wght300_GRAD0_opsz24.svg");
        return audio.play();
    }
    else if (audio.classList.contains('state_play'))
    {
        // audio.classList.remove('state_play');
        // audio.classList.add('state_pause');
        // icon.setAttribute('src', "/playlist/images/play_circle_FILL0_wght300_GRAD0_opsz24.svg");
        return audio.pause();
    }

}

function myEnd(){
    alert('konec stopy');
    audio.classList.remove('state_play');
    audio.classList.add('state_pause');
    icon.setAttribute('src', "/playlist/images/play_circle_FILL0_wght300_GRAD0_opsz24.svg");
}