

// PLAY ONE SONG AT A TIME
document.addEventListener('DOMContentLoaded', function () {

        var audioPlayers = document.querySelectorAll('.audioPlayer');


        audioPlayers.forEach(function (player) {
            player.addEventListener('play', function () {
                pauseOtherPlayers(player);
            });
        });

        function pauseOtherPlayers(currentPlayer) {
            audioPlayers.forEach(function (player) {
                if (player !== currentPlayer) {
                    player.pause();
                    player.parentElement.querySelector('.uil-volume').style.display = "block"        
                    player.parentElement.querySelector('.uil-pause').style.display = "none"  
                    player.parentElement.querySelector('.cd-stop').style.display = "inline-block"  
                    player.parentElement.querySelector('.cd-spin').style.display = "none"  
                }
            });
        }
    });