let pKeys = document.querySelectorAll('.key');
let prevSongBtn = document.getElementById("prevSongBtn");
let nextSongBtn = document.getElementById("nextSongBtn");
let playSongbtn = document.getElementById("playSongBtn");
let pauseSongbtn = document.getElementById("pauseSongBtn");
var songAudio = document.getElementById('song');
let currSongId = document.getElementById("currSongId").value;
let songTitle = document.getElementById("songTitle");
let songSheetPic = document.getElementById("songSheetPic");
let errorText = document.getElementById("errorText");
var xhr = new XMLHttpRequest();
var i = 0;
var paused = false;

//click event on Piano keys
pKeys.forEach((key)=>{
    key.addEventListener('click', ()=> playNoteAudio(key));
});

//click event on song play button, plays the song
playSongbtn.addEventListener('click', ()=> playSong());
// previous song button
prevSongBtn.addEventListener('click', ()=>{
    errorText.style.display= "none";
    errorText.classList.remove("errorMsgHide");
    currSongId--
    xhr.onload = function(){
        if(this.status == 200){
            let songDatas= JSON.parse(this.responseText);
            successResponse(songDatas);
        }
        else if(this.status == 404){
            failedResponse()
            currSongId++;
        }
    };
    xhr.open("GET", "/zongora?dal_id="+ currSongId);
    xhr.send();
});
// next song button
nextSongBtn.addEventListener('click', ()=>{
    errorText.style.display= "none";
    errorText.classList.remove("errorMsgHide");
    currSongId++
    xhr.onload =  function(){
        if(this.status == 200){
            let songDatas= JSON.parse(this.responseText);
            successResponse(songDatas);
        }
        else if(this.status == 404){
            failedResponse()
            currSongId--;
        }
    };
    xhr.open("GET", "/zongora?dal_id="+ currSongId);
    xhr.send();
});

//on successful response
function successResponse(data){
    songTitle.textContent = data.song_title;
    songSheetPic.src = data.song_sheet_path;
    song.src = data.song_file_path;
    i = 0;
    playSongbtn.firstElementChild.classList.remove("bi-arrow-clockwise");
    playSongbtn.firstElementChild.classList.add("bi-play-fill");
    pauseSongbtn.style.display= "none";
    pauseSongbtn.firstElementChild.classList.add("bi-pause-fill");
    pauseSongbtn.firstElementChild.classList.remove("bi-play-fill");
    paused= false;
}

//on failed response
function failedResponse(){
    errorText.style.display= "block";
    setTimeout( hideErrorMsg, 1500);
}
//change the play song button icon
songAudio.addEventListener('ended', ()=>{
    playSongbtn.firstElementChild.classList.remove("bi-arrow-clockwise");
    playSongbtn.firstElementChild.classList.add("bi-play-fill");
    pauseSongbtn.style.display= "none";
})
// show or hide song pause button
pauseSongbtn.addEventListener('click', ()=>{
    if(!paused){
        songAudio.pause();
        pauseSongbtn.firstElementChild.classList.remove("bi-pause-fill");
        pauseSongbtn.firstElementChild.classList.add("bi-play-fill");
        paused = true;
    }
    else{
        songAudio.play();
        pauseSongbtn.firstElementChild.classList.add("bi-pause-fill");
        pauseSongbtn.firstElementChild.classList.remove("bi-play-fill");
        paused= false;
    }

})
//hide error msg
function hideErrorMsg() {
    setTimeout(() => {
        errorText.style.display= "none";
    }, 500);
    errorText.classList.add("errorMsgHide");
  }

//play the right note on button click
function playNoteAudio(key){
    let noteAudio = document.getElementById(key.dataset.note);
    noteAudio.currentTime= 0;
    noteAudio.play();
}

//plays the current song
function playSong(){
    songAudio.currentTime= 0;
    songAudio.play();
    playSongbtn.firstElementChild.classList.remove("bi-play-fill");
    playSongbtn.firstElementChild.classList.add("bi-arrow-clockwise");
    pauseSongbtn.firstElementChild.classList.add("bi-pause-fill");
    pauseSongbtn.firstElementChild.classList.remove("bi-play-fill");
    paused = false;
    pauseSongbtn.style.display= "block";
}

