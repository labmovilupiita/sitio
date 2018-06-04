
function muestraFecha(){
    var d = new Date();
    alert(d.getDay()+'-'+d.getMonth()+'-'+d.getYear());
}

function muestraPrompt(){
    var nombre = prompt("Ingresa tu nombre:",'nombre');

if (nombre != null && nombre != '') {
    document.getElementById("nombre").innerHTML =
    "Hola " + nombre + "!";
}
    else{
        document.getElementById("nombre").innerHTML =
    "Hola desconocido !";
    }
    
}

        // Global variable to track current file name.
        var currentFile = "";
        function playAudio() {
            // Check for audio element support.
            if (window.HTMLAudioElement) {
                try {
                    var oAudio = document.getElementById('myaudio');
                    var btn = document.getElementById('play'); 
                    var audioURL = document.getElementById('audiofile'); 

                    //Skip loading if current file hasn't changed.
                    if (audioURL.value !== currentFile) {
                        oAudio.src = audioURL.value;
                        currentFile = audioURL.value;                       
                    }

                    if (oAudio.paused) {
                        oAudio.play();
                        btn.textContent = "Pausa";
                    }
                    else {
                        oAudio.pause();
                        btn.textContent = "Reproducir";
                    }
                }
                catch (e) {
                     if(window.console && console.error("Error:" + e));
                }
            }
        }

        function rewindAudio() {
            if (window.HTMLAudioElement) {
                try {
                    var oAudio = document.getElementById('myaudio');
                    oAudio.currentTime -= 30.0;
                }
                catch (e) {
                     if(window.console && console.error("Error:" + e));
                }
            }
        }


        function forwardAudio() {
            if (window.HTMLAudioElement) {
                try {
                    var oAudio = document.getElementById('myaudio');
                    oAudio.currentTime += 30.0;
                }
                catch (e) {
                     if(window.console && console.error("Error:" + e));
                }
            }
        }

        function restartAudio() {
            if (window.HTMLAudioElement) {
                try {
                    var oAudio = document.getElementById('myaudio');
                    oAudio.currentTime = 0;
                }
                catch (e) {
                     if(window.console && console.error("Error:" + e));
               }
            }
        }
            
            