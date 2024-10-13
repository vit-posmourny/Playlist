let play_icon_path = 'images/play_circle_FILL0_wght300_GRAD0_opsz24.svg';
let pause_icon_path = 'images/pause_circle_FILL0_wght300_GRAD0_opsz24.svg';
let first_entry = true;
let id_current_track = '';
let id_prev_track = '';
let audio_slots = document.getElementsByClassName('slot_class');
let icons = document.getElementsByClassName('list-play-icon');
let tdTTs = document.getElementsByClassName('td-track-time');


// ZACHYTAVANI KLIK EVENTU Z PLAY TL. A NASLEDNE ZPRACOVANI - SWITCHOVANI DVOU TL.

function getListPlayIconId(evnt)
{
    if (first_entry)
    {
        let element = evnt.target;
        id_current_track = element.id;
        
        audio_slots[id_current_track].addEventListener('ended', CurrTrackEnd);
        
        id_prev_track = id_current_track;
        currTrackPlay(currTrackCheckState());
        
        first_entry = false;
    }
    else {
        
        id_prev_track = id_current_track;
        
        let element = evnt.target;
        id_current_track = element.id;
        
        audio_slots[id_current_track].addEventListener('ended', CurrTrackEnd);
        
        if (id_current_track === id_prev_track)
        {
            currTrackPlay(currTrackCheckState());
        }
        else
        {
            switchPlay(prevTrackCheckState());
        }
    }
}


function currTrackPlay(state)
{
    if (state === 'state_pause')
    {
        icons[id_current_track].src = pause_icon_path;
        
        audio_slots[id_current_track].play();
        setCurrStateOnPlay();
    }
    else if (state == 'state_play')
    {
        icons[id_current_track].src = play_icon_path;
        
        audio_slots[id_current_track].pause();
        setCurrTrackStateOnPause();
    }
    
}


function switchPlay(state)
{
    if (state === 'state_pause')
    {
        icons[id_current_track].src = play_icon_path;
        
        audio_slots[id_current_track].play();
        setCurrStateOnPlay();
    }
    else if (state == 'state_play')
    {
        icons[id_prev_track].src = play_icon_path;
        audio_slots[id_prev_track].pause();
        setPrevTrackStateOnPause();
        
        icons[id_current_track].src = pause_icon_path;
        
        audio_slots[id_current_track].play();
        setCurrStateOnPlay();
        
    }
}


function currTrackCheckState()
{
    if (audio_slots[id_current_track].classList.contains('state_pause'))
    {
        return 'state_pause';
    }
    else if (audio_slots[id_current_track].classList.contains('state_play'))
    {
        return 'state_play';
    }
}


function prevTrackCheckState()
{
    if (audio_slots[id_prev_track].classList.contains('state_pause'))
    {
        return 'state_pause';
    }
    else if (audio_slots[id_prev_track].classList.contains('state_play'))
    {
        return 'state_play';
    }
}


function setCurrStateOnPlay()
{
    audio_slots[id_current_track].classList.remove('state_pause');
    audio_slots[id_current_track].classList.add('state_play');
}


function setCurrTrackStateOnPause()
{
    audio_slots[id_current_track].classList.remove('state_play');
    audio_slots[id_current_track].classList.add('state_pause');
}


function setPrevStateOnPlay()
{
    audio_slots[id_prev_track].classList.remove('state_pause');
    audio_slots[id_prev_track].classList.add('state_play');
}


function setPrevTrackStateOnPause()
{
    audio_slots[id_prev_track].classList.remove('state_play');
    audio_slots[id_prev_track].classList.add('state_pause');
}


function CurrTrackEnd()
{
    audio_slots[id_current_track].classList.remove('state_play');
    audio_slots[id_current_track].classList.add('state_pause');
    
    icons[id_current_track].src = play_icon_path;
    
    setCurrTrackStateOnPause();
}


// ELAPSED TIME / DURATION

function updateTrackTime(audio)
{
    let currTime = Math.floor(audio.currentTime).toString();
    let duration = Math.floor(audio.duration).toString();
    
    currTime = formatSecondsAsTime(currTime);
    duration = formatSecondsAsTime(duration);
    
    tdTTs[id_current_track].innerHTML = currTime +'/'+ duration;
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