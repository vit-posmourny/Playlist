let play_icon_path = 'images/play_circle_FILL0_wght300_GRAD0_opsz24.svg';
let pause_icon_path = 'images/pause_circle_FILL0_wght300_GRAD0_opsz24.svg';
let first_entry = true;
let id_current = '';
let id_prev = '';
let my_audios = document.getElementsByClassName('audio_class');
let icons = document.getElementsByClassName('list-play-icon');
let tdTTs = document.getElementsByClassName('td-track-time');


// ZACHYTAVANI KLIK EVENTU Z PLAY TL. A NASLEDNE ZPRACOVANI - SWITCHOVANI DVOU TL.

function getElementId(evnt)
{
    if (first_entry)
    {
        let element = evnt.target;
        id_current = element.id;
        
        my_audios[id_current].addEventListener('ended', myEndCurrent);
        
        id_prev = id_current;
        currentPlay(stateCheckCurrent());
        
        first_entry = false;
    }
    else {
        
        id_prev = id_current;
        
        let element = evnt.target;
        id_current = element.id;
        
        my_audios[id_current].addEventListener('ended', myEndCurrent);
        
        if (id_current === id_prev)
        {
            currentPlay(stateCheckCurrent());
        }
        else
        {
            switchPlay(stateCheckPrev());
        }
    }
}


function currentPlay(state)
{
    if (state === 'state_pause')
    {
        icons[id_current].src = play_icon_path;
        
        my_audios[id_current].play();
        setStateOnPlayCurrent();
    }
    else if (state == 'state_play')
    {
        icons[id_current].src = pause_icon_path;
        
        my_audios[id_current].pause();
        setStateOnPauseCurrent();
    }
    
}


function switchPlay(state)
{
    if (state === 'state_pause')
    {
        icons[id_current].src = play_icon_path;
        
        my_audios[id_current].play();
        setStateOnPlayCurrent();
    }
    else if (state == 'state_play')
    {
        icons[id_prev].src = pause_icon_path;
        my_audios[id_prev].pause();
        setStateOnPausePrev();
        
        icons[id_current].src = play_icon_path;
        
        my_audios[id_current].play();
        setStateOnPlayCurrent();
        
    }
}


function stateCheckCurrent()
{
    if (my_audios[id_current].classList.contains('state_pause'))
    {
        return 'state_pause';
    }
    else if (my_audios[id_current].classList.contains('state_play'))
    {
        return 'state_play';
    }
}


function stateCheckPrev()
{
    if (my_audios[id_prev].classList.contains('state_pause'))
    {
        return 'state_pause';
    }
    else if (my_audios[id_prev].classList.contains('state_play'))
    {
        return 'state_play';
    }
}


function setStateOnPlayCurrent()
{
    my_audios[id_current].classList.remove('state_pause');
    my_audios[id_current].classList.add('state_play');
}


function  setStateOnPauseCurrent()
{
    my_audios[id_current].classList.remove('state_play');
    my_audios[id_current].classList.add('state_pause');
}


function setStateOnPlayPrev()
{
    my_audios[id_prev].classList.remove('state_pause');
    my_audios[id_prev].classList.add('state_play');
}


function  setStateOnPausePrev()
{
    my_audios[id_prev].classList.remove('state_play');
    my_audios[id_prev].classList.add('state_pause');
}


function myEndCurrent()
{
    my_audios[id_current].classList.remove('state_play');
    my_audios[id_current].classList.add('state_pause');
    
    icons[id_current].src = pause_icon_path;
    
    setStateOnPauseCurrent();
}


// ELAPSED TIME / DURATION

function updateTrackTime(audio)
{
    let currTime = Math.floor(audio.currentTime).toString();
    let duration = Math.floor(audio.duration).toString();
    
    currTime = formatSecondsAsTime(currTime);
    duration = formatSecondsAsTime(duration);
    
    tdTTs[id_current].innerHTML = currTime +'/'+ duration;
}

function formatSecondsAsTime(secs) {
    
    let hr  = Math.floor(secs / 3600);
    let min = Math.floor((secs - (hr * 3600))/60);
    let sec = Math.floor(secs - (hr * 3600) -  (min * 60));
    
    if (min < 10){
        min = "0" + min;
    }
    if (sec < 10){
        sec  = "0" + sec;
    }
    return min + ':' + sec;
}