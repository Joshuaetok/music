


<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Ajala Africa - Playlist</title>
        <script src="main.js" defer></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Merienda:wght@300&family=Miltonian+Tattoo&display=swap" rel="stylesheet">     
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />       
<style>
        /*STYLE.CSS IS COPIED here*/
        /*CSS Style for Music Player "index.html"*/

/******************************************************************************
	Table of Contents
	-----------------
	1. Global Styles
		1.1 -- :root
        1.2 -- :is(*, ::before, ::after)
        1.3 -- body
            1.3.1 -- body * + *
        1.4 -- footer
        1.5 -- span

	2. Class Specific Selectors
        2.1 -- .player
        2.2 -- .title
        2.3 -- .control-panel
        2.4 -- .track-info
        2.5 -- .track-name
        2.6 -- .song-tracker
        2.7 -- .button--prev, .button--next, .button--repeat, .button--pause, .button--shuffle, 
            .volume-section
        2.8 -- Buttons special states @media (min-width: 40em)
        2.9 -- .button, .volume-control
        2.10 -- .button--play, .button--pause
        2.11 -- .button--repeat, .button--shuffle
        2.12 -- .repeat, .shuffle
        2.13 -- .infinity, .shuffle-active, .one
        2.14 -- .infinity
        2.15 -- .volume-section
        2.16 -- .volume-control
        2.17 -- .volume-control::-moz-range-thumb, .volume-control::-webkit-slider-thumb
        2.18 -- .volume-change
        2.19 -- .progress
        2.20 -- .progress::-moz-range-thumb, .progress::-webkit-slider-thumb

*******************************************************************************/

/******************************************************************************
1. Global Styles
******************************************************************************/

/* 1.1 */

  
:root {
    box-sizing: border-box;
    font-family: "Arial", cursive;
    --grow-size-one: calc(0.9em + 0.5vw);
    --size-one: 1em;
    --size-half: 0.5em;
    --position-center: center;
    --primary-orange: black;
    --primary-purple: #b027ff;
    --white: hsl(0, 0%, 100%);
    --white-80: hsl(0, 0%, 80%);
    --black: hsl(0, 0%, 20%);
}

/* 1.2 */
:is(*, ::before, ::after) {
    box-sizing: inherit;
    font-family: inherit;
    font-size: var(--grow-size-one);
}

/* 1.3 */
body {
  font-family: '<link category="BRANDS">Lobster</link>', cursive;
    margin: 0 auto;
    *min-height: 100vh;
    color: var(--white);
    background-image: linear-gradient(
        135deg,
        var(--primary-orange),
        var(--primary-purple)
    );
    background-repeat: no-repeat;
    position: relative; /* footer is absolutely positioned to this element */
}

custom/* 1.3.1 */
body * + * {
    margin: 0;
}

/* 1.4 */
footer {
    display: flex;
    width: 100%;
    position: absolute;
    bottom: 4em;
    justify-content: center;
}
/*
@media (orientation: landscape) {
    body {
        padding-bottom: 4em;
    }
    footer {
        bottom: 0;
    }
}

/* 1.5 */
span {
    font-size: 0.5em;
}

/******************************************************************************
2. Class Specific Selectors
******************************************************************************/

/* 2.1 */
.player {
    display: grid;
    grid-template-rows: repeat(4, auto);
    gap: var(--size-one);
    background-color: transparent;
}

/* 2.2 */
.title {
    text-align: var(--position-center);
    font-size: calc(2 * var(--size-one));
}

/* 2.3 */
.control-panel {
    display: flex;
    justify-content: space-around;
}

/* 2.4 */
.track-info {
    margin-top: var(--size-half);
    display: none;
    justify-content: var(--position-center);
    align-items: var(--position-center);
    padding: 0 var(--size-one);
}

/* 2.5 */
.track-name {
    display: none;
    justify-content: var(--position-center);
    align-items: center;
    font-size: var(--size-one);
    margin-top: -2em;
}

/* 2.6 */
.song-tracker {
    margin-right: var(--size-half);
}

/* 2.7 All buttons expect for the initial play button are hidden by default*/
.button--prev,
.button--next,
.button--repeat,
.button--pause,
.button--shuffle,
.volume-section {
    display: none;
}

/* 2.8 Sets up special states of the buttons when hovered/active -- used in desktop only*/
/*
@media (min-width: 40em) {
    .button:hover {
        color: var(--white);
        transition: ease-out 0.5s;
    }

    .button--prev:active {
        transform: translateX(-1em);
    }

    .button--next:active {
        transform: translateX(1em);
    }

    .button--shuffle:active {
        transform: rotateX(180deg);
        transition: box-shadow 0.5s ease-out;
    }
    .button--repeat:active {
        transform: rotateZ(-180deg);
        transition: box-shadow 0.5s ease-out;
    }
}

/* 2.9 */
.button,
.volume-control {
    font-size: 0.8em;
    padding: 0.75em 1.75em;
    background-color: transparent;
    color: var(--white);
    border: none;
    border-radius: 0.4em;
    cursor: pointer;
}
/*
@media (min-width: 40em) {
    .button,
    .volume-control {
        font-size: 1em;
        color: var(--white-80);
    }
}
/*
@media (orientation: landscape) {
    .button,
    .volume-control {
        font-size: 1em;
        color: var(--white);
    }
}*/

/* 2.10 Make this button a bit bigger than the rest to highlight its importance */
.button--play,
.button--pause {
    font-size: 1.5em;
    padding: 0 1em;
}
/*
@media (dth: 40em) {
    .button--play,
    .button--pause {
        font-size: 2em;
        padding: 0 1em;
    }
}

/* 2.11 */
.button--repeat,
.button--shuffle {
    position: relative;
}

/* 2.12 Both classes are applied to notification markers on the repeat and shuffle buttons respectively to show to the user if either functionally is in effect. */
.repeat,
.shuffle {
    display: none;
}

/* 2.13 Applies classes to the repeat and shuffle notifications */
.infinity,
.shuffle-active,
.one {
    font-size: 0.5em;
    display: block;
    margin-left: auto;
    margin-right: auto;
    right: 0;
    left: 0;
    padding-top: 3em;
    position: absolute;
}

/* 2.14 */
.infinity {
    font-size: 1em;
    padding-top: 1.2em;
}

/* 2.15 */
.volume-section {
    align-items: center;
    margin-left: 6em;
}

/* 2.16 The volume slider doesn't show on small screens, but does have a media query to display when a mobile device is in landscape orientation*/
.volume-control {
    width: 8em;
    height: 2vh;
    background-color: transparent;
    border-radius: var(--size-one);
    border: var(--white) solid 2px;
    padding: 0;
    margin-left: 0.5em;
}
/*
@media (min-width: 40em) {
    .volume-control {
        opacity: 0.7;
    }
    .volume-control:hover {
        opacity: 1;
    }
}
/*
@media (orientation: landscape) {
    .volume-control {
        opacity: 0.7;
        height: 4vh;
    }
    .volume-control:hover {
        opacity: 1;
    }
}
*/
/* 2.17 This is to style the input slider for the volume on firefox, chrome and safari*/
.volume-control::-moz-range-thumb,
.volume-control::-webkit-slider-thumb {
    cursor: pointer;
    border-radius: 100%;
    width: 1.5vh;
    height: 1.5vh;
    background: var(--white);
    -webkit-appearance: none;
    appearance: none;
    border: var(--white) solid 2px;
}
/*
@media (orientation: landscape) {
    .volume-control::-moz-range-thumb,
    .volume-control::-webkit-slider-thumb {
        width: 3vh;
        height: 3vh;
    }
}
*/
/* 2.18 The icon used to show if a song is muted or not */
.volume-change {
    border: none;
    background-color: transparent;
    color: var(--white);
    cursor: pointer;
    font-size: 1.25em;
    max-width: 1em;
    padding: 1.25em;
}

/* 2.19 */
.progress {
    width: 100%;
    max-height: 1.5vh;
    background-color: transparent;
    border-radius: var(--size-one);
    border: var(--white) solid 2px;
    padding: 0;
    margin: 0 2em;
}
/*
@media (min-width: 40em) {
    .progress {
        max-height: 4.5vh;
        opacity: 0.7;
    }
    .progress:hover {
        opacity: 1;
    }
}
*/

/*
@media (orientation: landscape) {
    .progress {
        opacity: 0.7;
        height: 4vh;
    }
    .progress:hover {
        opacity: 1;
    }
}
*/

/* 2.20 This is to style the input slider for the song seeker. This is only for firefox, chrome and safari*/
.progress::-moz-range-thumb,
.progress::-webkit-slider-thumb {
    cursor: pointer;
    border-radius: 100%;
    width: 2vh;
    max-height: 2vh;
    -webkit-appearance: none;
    appearance: none;
    border: var(--white) solid 2px;
    background-color: var(--white);
}
/*
@media (min-width: 40em) {
    .progress::-moz-range-thumb,
    .progress::-webkit-slider-thumb {
        width: 4vh;
        max-height: 4vh;
    }
}
*/
        /**STYLES.CSS ENDS HERE*/
        
            /*********For Scrolling************/
            .scroll-container {
                white-space: nowrap;
                overflow: hidden;
            }

            .scroll-item {
                display: inline-block;
                white-space: nowrap;
                animation: normal;
                color: white;
                margin: 0;
            }

            @keyframes scroll {
                0%,
                30% {
                    transform: translateX(0%);
                }
                100% {
                    transform: translateX(-80%);
                }
            }
            .player-nav{
              display:flex;
              justify-content: space-between;
              width:100%;
              max-width: 100vw;
              height:auto;
            }
            .player-nav{
              background-color: #1e1e66;
              height:5em;
              *position: absolute;
              bottom:0;
              padding: 1em;
            }

            .contain {
              height:100vh;
                margin: 0;
                font-family: "Merienda", sans-serif;
                *background-color: #3c0101;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .title {
             font-family: "Miltonian Tattoo", sans-serif;
                width: 80vw;
                margin:0 auto;
                *background-color: magenta;
                
            }
            #song-title {
                font-size: 0.6em;
            }
            
           
            .carusel-container .player {
              font-family: "Merienda", sans-serif;
                width: 100%;
                display: inline-block;
                margin: 0;
            }

            .carusel-container {
                *width: 100%;
                height: 55vh;
                overflow: hidden;
                position: relative;
            }
            
            .player {
              *background-color: magenta;
              margin:auto;
              width: fit-content;
            }

            .list-container {
                width: 100%;
                height: 45vh;
                overflow-y: auto;
                margin-top: 10px;
                border-top: 5px solid white;
                border-radius: 10px;
                margin-left: 5px;
                margin-right: 5px;
            }

            .item-list {
                list-style: none;
                padding: 0;
                margin: 0;
                display: flex;
                flex-direction: column;
                flex-wrap: wrap;
                justify-content: space-around;
                width: 100%;
            }

            .item {
                *background-color: #3498db;
                margin-left: 0px;
                margin-right: 0px;
                padding-left: 5px;
                border-radius: 8px;
                padding-right: 5px;
                text-align: left;
                color: white;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                transition: background-color 0.3s ease;
                min-width: 200px;
                flex: 1 0 calc(33.33% - 20px);
                font-size: 35px;
                display: flex;
                justify-content: space-between;
            }
            .item-details {
                width: 250px;
                white-space: nowrap;
                overflow: hidden;
                padding: 10px;
            }
            .item-icons {
                width: 20%;
                padding-right: 0px;
            }

            .item:hover {
                background-color: #1e1e66;
                opacity:0.7;
            }
            .item-playing{
              background-color: #5759c2;
            }
            .control-panel{
              margin-top: 0;
              height: 2em;
              *background-color: magenta;
              font-size: 0.7em;
            }
            .track-info{
              margin-top:0;
              height:4.3em;
              font-size: 0.6em;
              *background-color: magenta;
            }
            .track-name{
              height:1.5em;
              width:80%;
              margin-top: 0em;
              font-size: 0.4em;
              *padding: 0;
              *background-color: blue;
            }
            .track-title {
                font-size: 0.4em;
            }
            .track-artiste {
                font-size: 0.3em;
                *background-color: magenta;
            }

            @media (min-width: 768px) {
                .item {
                    flex: 1 0 calc(50% - 20px);
                }
            }
            .circle {
              box-sizing: content-box;
                width: 10em;
                margin: auto;
                margin-bottom: 10px;
                margin-top: 10px;
                height: 10em;
                background-color: #3e3ea6;
                border-style: solid;
                border-width: 2px;
                border-color: lightgray;
                border-radius: 50%;
                *transform: scale(0.5, 0.5);
                position: relative;
                *background-image: conic-gradient(
                    #ffe0e9 0deg 20deg,
                    #ffc2d4 20deg 40deg,
                    #ff9ebb 40deg 60deg,
                    #ff7aa2 60deg 80deg,
                    #e05780 80deg 100deg,
                    #b9375e 100deg 120deg,
                    #8a2846 120deg 140deg,
                    #602437 140deg 160deg,
                    #522e38 160deg 180deg,
                    #ffe0e9 180deg 200deg,
                    #ffc2d4 200deg 220deg,
                    #ff9ebb 220deg 240deg,
                    #ff7aa2 240deg 260deg,
                    #e05780 260deg 280deg,
                    #b9375e 280deg 300deg,
                    #8a2846 300deg 320deg,
                    #602437 320deg 340deg,
                    #522e38 340deg 360deg
                );
                background-image: url("<?= ROOT ?>/assets/images/ajala2.jpg");
                
    background-size:     cover;                      /* <------ */
    background-repeat:   no-repeat;
    background-position: center center;              /* optional, center the image */

            }

            .inner1 {
              box-sizing: content-box;
                margin: auto;
                height: 4em;
                width: 4em;
                border-style: solid;
                border-width: 2px;
                border-color: white;
                border-radius: 50%;
                background-color: black;
                position: absolute;
                top: 3em;
                left: 3em;
                opacity: 0.6;
            }
            .inner2 {
              box-sizing: content-box;
                height: 1em;
                width: 1em;
                border-radius: 50%;
                border-style: solid;
                border-width: 2px;
                border-color: white;
                background-color: black;
                position: absolute;
                top: 4.5em;
                left: 4.5em;
                opacity: 1;
            }
            .artiste {
                *background-color: blue;
                text-align: center;
            }

            #artiste {
                *background-color: magenta;
                font-size: 1rem;
                margin: auto;
                margin-top: 20px;
            }
            @media (min-width: 600px) {
               .contain{
                 flex-direction: row;
                 justify-items: space-between;
                 width:100vw;
               }
               .carusel-container{
                 height:100vh;
                 width:55ww;
                 *position: relative;
                 *background-color:green;
               }
               .list-container {
                 height:100vh;
                 width: 45vw;
                 margin-top: 2em;
                 
               }
               .title{
                 width:50vw;
               }
               #song-title {
                font-size: 0.5em;
            }
            .player{
              height: 100vh;
              scale: 1;
              *position: absolute;
              top:0;
              left:0;
              margin:0;
            }
            .circle {
                width: 5em;
                margin-bottom: 0.5em;
                margin-top:0.3em;
                height: 5em;
                border-width: 1px;
            }
             .inner1 {
                height: 2em;
                width: 2em;
                top: 1.5em;
                left:1.5em;
                border-width: 1px;
            }
            .inner2 {
                height: 0.5em;
                width: 0.5em;
                border-radius: 50%;
                border-width: 1px;
                top: 2.25em;
                left: 2.25em;
            }
            .control-panel{
              scale: 1 0.7;
              *background-color:red;
              height:2.5em;
              font-size: 0.8em;
            }
            .track-info{
              margin-left: 1.5em;
              margin-right: 1.5em;
              margin-top:0.5em;
              height:1.5em;
              font-size:0.5em;
              *background-color: green;
            }
            
            .track-name, .volume-section{
              height:1.5em;
              *margin-left:0.1em;
              *margin-right:0.1em;
              margin-top:0;
              margin-bottom: 0.2em;
              padding-top:0;
              *padding-bottom: 0.5em;
              *background-color: magenta;
            }
            .track-name{
              *margin-left: 0.2em;
              width: 100%;
              text-align: left;
              *background-color: magenta;
            }
            .volume-section{
              *margin-right: 0.2em;
            }
            
            
            .volume-section>input{
              margin-top: 1.2em;
              *font-size: 0.5em;
            }
            .volume-section>button{
              margin-top:0.5em;
              font-size:0.5em;
            }
            
            .artiste{
              width:4em;
            }
            
            
            
            button{
              height:1.8em;
              border:none;
            }
            button:hover{
              border:none;
              pointer-events:none;
            }
          }
          /**SEARCH AND SEARCH BOX STYLES***/
          .search-container{
            display: none;
            position:absolute;
            *z-index:1;
            bottom:5em;
            height:60vh;
            width:100vw;
            background-color: magenta;
            padding: 1em;
          }
          .search{
            *position: absolute;
            *z-index:2;
            background-color: dodgerblue;
            *top:0;
            height: 1.5em;
            display: flex;
            justify-content: space-between;
          }
          .search-results{
            z-index:3;
            background-color: lightgray;
          }
            
        </style>
            </head>
    <body>
      
      

        <div class="contain">
            <div class="carusel-container">
                <div class="player">
                    <h1 class="title scroll-container" id="title">
                        <span id="song-title" class="scroll-item"
                            >Ajala Africa - Playlist</span
                        >
                    </h1>
                    <div id="rotatingCircle" class="circle rotatingCircle">
                        <div class="inner1"></div>
                        <div class="inner2"></div>
                    </div>

                    <div class="control-panel">
                        <button class="button button--repeat" title="Repeat">
                            <i class="fas fa-retweet"></i>
                            <i class="repeat"></i>
                        </button>
                        <button class="button button--prev" title="Previous">
                            <i class="fas fa-step-backward"></i>
                        </button>
                        <button class="button button--play" title="Play">
                            <i class="fas fa-play"></i>
                        </button>
                        <button class="button button--pause" title="Pause">
                            <i class="fas fa-pause"></i>
                        </button>
                        <button class="button button--next" title="Next">
                            <i class="fas fa-step-forward"></i>
                        </button>
                        <button class="button button--shuffle" title="Shuffle">
                            <i class="fas fa-random"></i>
                            <i class="shuffle"></i>
                        </button>
                    </div>
                    <div class="track-info">
                        <p class="track-time track-time__start">0:00</p>
                        <input
                            type="range"
                            class="progress"
                            value="0"
                            title="Seek"
                        />
                        <p class="track-time track-time__end">0:00</p>
                    </div>
                    <div class="track-name">
                        <div class="artiste scroll-container">
                            <span id="artiste" class="track-number scroll-item">
                            </span>
                        </div>
                        <div class="volume-section">
                            <button class="volume-change">
                                <i class="fas fa-volume-down"></i>
                            </button>
                            <input
                                type="range"
                                class="volume-control"
                                value="50"
                                step="1"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <div class="list-container">
                <ul class="item-list playlist">
                  		<?php //$rows = db_query("select * from songs where featured = 1 order by id desc limit 16");

//$rows = db_query("select * from songs where featured = 1 order by id desc limit 16");
                    //$rows = db_query("select * from songs where featured = 1 order by id desc limit 16");
                    //$rows = db_query("select * from songs where featured = 1 order by id desc limit 16");
                    //$rows = db_query("select * from songs where featured = 1 order by id desc limit 16");
                    //$rows = db_query("select * from songs where featured = 1 order by id desc limit 16");
                    //$rows = db_query("select * from songs where featured = 1 order by id desc limit 16");
                    //$rows = db_query("select * from songs where featured = 1 order by id desc limit 16");
                    $rows = db_query(
                      "select * from songs order by id desc limit 16"
                    ); ?>
                      <?php if (!empty($rows)): ?>
        <?php foreach ($rows as $row): ?>
                    <li id="<?= ROOT ?>/<?= $row["file"] ?>" class="item">
                        <div
                            class="item-details"
                            id=""
                            onclick="playClickedSong(this)"
                        >
                            <div class="track-title">
                                <?= esc(ucwords($row["title"])) ?>
                            </div>
                            <div
                                class="track-artiste"
                                id="<?= ROOT ?>/<?= $row["image"] ?>"
                                style="color: lightgray"
                            > 
                                <?= esc(
                                  ucwords(get_artist($row["artist_id"]))
                                ) ?>
                            </div>
                        </div>
                        <div class="item-icons">
                            <span class="track-page-link"
                                ><a href="<?= ROOT ?>/song/<?= $row["slug"] ?>"
                                    ><i class="fa fa-external-link"></i></a
                            ></span>
                            <span class="track-page-share"
                                ><a href="#"><i class="fa fa-share-alt"></i></a
                            ></span>
                        </div>
                    </li>
                    			<?php endforeach; ?>

		<?php else: ?>
		<?php endif; ?>
                </ul>
            </div>
        </div>
        <br>
       
        <!--  SEARCH AREA  -->
        
        <div class="search-container">
          <div class="search"><input class="search-box" placeholder="Search in Playlist"/><i class="fas fa-times"></i></div>
          <div class="search-results"></div>
        </div>
       
        
        <!--  FOOTER NAVIGATION  -->
        <div class="player-nav">
        <div class=""style="margin:auto 0;"><a href="<?= ROOT ?>"style="color: white;"><i class="fas fa-home"></a></i></div>
        <div class=""><img style="height:2em;width:auto;" src="<?= ROOT ?>/assets/images/logo1.png"/></div>
        <!-- <div class=""style="margin:auto 0;color: white;"><i class="fas fa-search"></i></div> -->
      </div>
        
        
        
        
        <script>
          /*JS file for Music Player "index.html"*/

/******************************************************************************
	Table of Contents
	-----------------
	1. Global Variables and App Initialization Measures
	2. Event Listeners
	3. UI-specific Functions
        3.1 -- playTrack()
        3.2 -- pauseTrack()
        3.3 -- nextTrack()
        3.4 -- prevTrack()
        3.5 -- repeatTrack()
        3.6 -- shuffleTrack()
        3.7 -- inputCurrentTime()
        3.8 -- showCurrentTime()
        3.9 -- showHidden()
        3.10 -- showVolumeControl()
        3.11 -- changeVolumeIcon()
    4. Global Functions
        4.1 -- getCurrentTime()
        4.2 -- setVolume()
        4.3 -- playlistLogic()
        4.4 -- updateTrack()
        4.5 -- checkEndOfSong()
        4.6 -- shufflePlaylist()
        4.7 -- formatTime(time)
        
*******************************************************************************/

/******************************************************************************
1. Global Variables and App Initialization Measures
******************************************************************************/

// Global variables for DOM manipulation
const buttonPlay = document.querySelector(".button--play");
const buttonPause = document.querySelector(".button--pause");
const buttonNext = document.querySelector(".button--next");
const buttonPrev = document.querySelector(".button--prev");
const buttonShuffle = document.querySelector(".button--shuffle");
const buttonRepeat = document.querySelector(".button--repeat");
const track = document.querySelector(".track-number");
const trackName = document.querySelector(".track-name");
const headersWithinTrackName = document.querySelectorAll(".track-name > h3");
const trackInfo = document.querySelector(".track-info");
const trackTimeStart = document.querySelector(".track-time__start");
const trackTimeEnd = document.querySelector(".track-time__end");
const progress = document.querySelector(".progress");
const volumeChange = document.querySelector(".volume-change");
const volumeControl = document.querySelector(".volume-control");
const volumeSection = document.querySelector(".volume-section");
// MY MODIFIATIONS for track details
const tracksFrom = document.getElementsByTagName("li");
const titleTo = document.getElementById("song-title");
const artisteTo = document.getElementById("artiste");
const coverTo = document.getElementById("rotatingCircle");
const clickedSong = document.getElementsByClassName("item-details");

// ROTATING CIRCLE variables
const circle = document.getElementById("rotatingCircle");
let rotationDegree = 0;
let rotationSpeed = 0.5; // Speed in degrees per frame
let isPaused = false;

// Initialized variables -- some of these can be changed depending on the number of tracks to be added to the playlist over time
let playlist = [];
// MY MODIFICATIONS
let titles = [];
let artistes = [];
let covers = [];
const playlistLength = tracksFrom.length - 1;
let currentTrack = 0;
track.textContent = 1;

// Build the array of audio tracks
for (i = 0; i <= playlistLength; i++) {
    let source = tracksFrom[i].id;
    let trackTitle = tracksFrom[i].children[0].children[0].innerHTML;
    let trackArtiste = tracksFrom[i].children[0].children[1].innerHTML;
    let trackCover = tracksFrom[i].children[0].children[1].id;
    clickedSong[i].id = i;
    let track = new Audio(source);
    track.classname="audioPlayer"
    playlist.push(track);
    titles.push(trackTitle);
    artistes.push(trackArtiste);
    covers.push(trackCover);
}
// MY CUSTOM FUNCTIONS
function trackDetails(j) {
    titleTo.innerHTML = titles[j];
    artisteTo.innerHTML = artistes[j];
    coverTo.style.backgroundImage = `url(${covers[j]})`;
    console.log(titleTo.innerHTML);
    console.log(artisteTo.innerHTML);
    console.log(coverTo.style.backgroundImage);
}
// DEFINE A FUNCTION TO PLAY CLICKED SONG
function playClickedSong(element) {
  playlistLogic()
    currentTrack = element.id;
    playTrack();
}

// DEFINE FUNCRIONS TO ROTATE, PAUSE AND RESUME rotationSpeed
function rotateCircle() {
    if (!isPaused) {
        rotationDegree += rotationSpeed;
        circle.style.transform = "rotate(" + rotationDegree + "deg)";
        requestAnimationFrame(rotateCircle);
    }
}

function pauseRotation() {
    isPaused = true;
}

function resumeRotation() {
    isPaused = false;
    rotateCircle();
}

// Start the rotation
// rotateCircle();
// Function to get the actual width of the span element
function scrollAnimation() {
    // to use this function a div must rap a span
    //assigned a class of scroll-container so the parents and a class of scroll-item to the child
    //there must be only one child element
    // the style set must be used as shown below
    /*<style>
    .scroll-container {
                width: 250px;
                white-space: nowrap;
                overflow: hidden;
            }

            .scroll-item {
                display: inline-block;
                white-space: nowrap;
                animation: normal;
                color: white;
                margin: 0;
            }
    </style> */
    let scrollContainers = document.getElementsByClassName("scroll-container");
    let scrollItems = document.getElementsByClassName("scroll-item");
    //loop theough all available instances
    for (let i = 0; i < scrollContainers.length; i++) {
        let containerWidth = scrollContainers[i].offsetWidth;
        let itemWidth = scrollItems[i].offsetWidth;
        if (itemWidth > containerWidth) {
            scrollItems[i].style.animation = "scroll 15s linear infinite";
            console.log(`${itemWidth} ${containerWidth}`);
        } else {
            scrollItems[i].style.animation = "none";
        }
    }
}
// Call the function and start the scrolling animati
scrollAnimation();

// Call this function when starting up the app
loadEventListeners();

/******************************************************************************
2. Event Listeners
******************************************************************************/

// Loads all event listeners
function loadEventListeners() {
    buttonPlay.addEventListener("click", playTrack);
    buttonPause.addEventListener("click", pauseTrack);
    buttonNext.addEventListener("click", nextTrack);
    buttonPrev.addEventListener("click", prevTrack);
    buttonShuffle.addEventListener("click", shuffleTrack);
    buttonRepeat.addEventListener("click", repeatTrack);
    progress.addEventListener("input", inputCurrentTime);
    volumeChange.addEventListener("click", changeVolumeIcon);
    volumeControl.addEventListener("input", setVolume);
    window.addEventListener("resize", showVolumeSection);
}

/******************************************************************************
3. UI-specific Functions
******************************************************************************/

//******************************

// 3.1 Handles a lot of logic when staring the app as well as when any song needs to play: sets the volume for the currentTrack; replaces the play button with the pause button; displays all other buttons and the volume control; defines the trackEndTime to display; defines the current time of the song to display, and checks what the next song played will be.
function playTrack() {
    playlist[currentTrack].play();
    buttonPlay.replaceWith(buttonPause);
    buttonPause.style.display = "block";
    showHidden();
    showVolumeSection();
    trackTimeEnd.textContent = formatTime(playlist[currentTrack].duration);
    trackTimeStart.textContent = "0:00";
    showCurrentTime();
    checkEndOfSong();
    setVolume();
    trackDetails(currentTrack);
    clickedSong[currentTrack].parentElement.classList.add("item-playing");
    scrollAnimation();
    pauseRotation();
    setTimeout(resumeRotation, 1000);
}

// 3.2 Pauses the currentTrack and replaces the pause button with the play button
function pauseTrack() {
    playlist[currentTrack].pause();
    pauseRotation();
    buttonPause.replaceWith(buttonPlay);
    buttonPlay.style.display = "block";
}

// 3.3 Checks if the current song is at the end of the playlist. If it is then the next song cycles back to the beginning, otherwise its simply the next song in the array. If the shuffle function is active, a random track is chosen as the next track. If the user explicitly clicks the next button while a repeat function is in affect, it is removed.
function nextTrack() {
    playlistLogic();
    if (buttonShuffle.children[1].classList.contains("shuffle-active")) {
        shufflePlaylist();
    } else if (currentTrack < playlistLength) {
        currentTrack++;
    } else {
        currentTrack = 0;
    }
    buttonRepeat.children[1].classList.remove(
        "fas",
        "one",
        "fa-circle",
        "infinity",
        "fa-infinity"
    );
    buttonRepeat.children[1].classList.add("repeat");
    updateTrack();
}

// 3.4 Checks if the current song is at the beginning of the playlist, if it is then the next song played (ie. the "previous" one in the playlist) cycles back to the end of the playlist. If the previous button is clicked while the repeat function is enabled, it is removed instead.
function prevTrack() {
    playlistLogic();
    if (currentTrack > 0) {
        currentTrack--;
    } else if (currentTrack <= 0) {
        currentTrack = playlistLength;
    }
    buttonRepeat.children[1].classList.remove(
        "fas",
        "one",
        "fa-circle",
        "infinity",
        "fa-infinity"
    );
    buttonRepeat.children[1].classList.add("repeat");
    updateTrack();
}

// 3.5 Repeats the current song in the playlist only once if the button is clicked once. It replays the song infinitely if clicked once more. Clicked a third time re-sets it back to the default (ie. repeat is removed).
function repeatTrack() {
    if (buttonRepeat.children[1].classList.contains("repeat")) {
        buttonRepeat.children[1].classList.remove("repeat");
        buttonRepeat.children[1].classList.add("one", "fas", "fa-circle");
    } else if (buttonRepeat.children[1].classList.contains("one")) {
        buttonRepeat.children[1].classList.remove("one", "fa-circle");
        buttonRepeat.children[1].classList.add(
            "infinity",
            "fas",
            "fa-infinity"
        );
    } else if (buttonRepeat.children[1].classList.contains("infinity")) {
        buttonRepeat.children[1].classList.remove(
            "infinity",
            "fas",
            "fa-infinity"
        );
        buttonRepeat.children[1].classList.add("repeat");
    }
}

// 3.6 Enables the shuffling feature by adding an "active" class to the button.
function shuffleTrack() {
    if (buttonShuffle.children[1].classList.contains("shuffle")) {
        buttonShuffle.children[1].classList.add(
            "fas",
            "fa-circle",
            "shuffle-active"
        );
        buttonShuffle.children[1].classList.remove("shuffle");
    } else {
        buttonShuffle.children[1].classList.remove(
            "fas",
            "fa-circle",
            "shuffle-active"
        );
        buttonShuffle.children[1].classList.add("shuffle");
    }
}

// 3.7 Allows the user to seek through the song by using the slider bar
function inputCurrentTime() {
    progress.max = 99; //stop the user from seeking to the limit of 100, otherwise songs go into a crazy looping state
    let sliderInput = (playlist[currentTrack].duration * progress.value) / 100;
    playlist[currentTrack].currentTime = sliderInput;
}

// 3.8 Displays the current time of the current track. Updates every 100ms.
function showCurrentTime() {
    setInterval(() => {
        progress.value =
            (getCurrentTime() / playlist[currentTrack].duration) * 100;
        trackTimeStart.textContent = formatTime(getCurrentTime());
    }, 100);
    console.log(trackTimeStart.textContent);
}

// 3.9 The first time a user clicks on the play button to start the music player app, all other buttons of the original html with "display:none" are then changed to be shown.
function showHidden() {
    trackName.style.display = "flex";
    trackInfo.style.display = "flex";
    buttonRepeat.style.display = "block";
    buttonShuffle.style.display = "block";
    buttonPrev.style.display = "block";
    buttonNext.style.display = "block";
}

// 3.10 Makes sure that the volume section element only shows on non-mobile displays.
function showVolumeSection() {
    // The number 640 is used as the limiter because it is 40em divided by 16 in pixels. 40em is the breakpoint in the CSS file from mobile to larger displays, so its used here for consistency, and 16 is the default calculated value used in the CSS too, as determined by the global font-size.
    // Check a button's current display before showing the volume control element -- if it is still not showing, neither should volume control (buttonShuffle is picked here, but any of the major buttons would do).
    // But if the button is showing, then the innerWidth of the page must not be mobile device for the control to show, too.
    if (window.innerWidth > 639 && buttonShuffle.style.display === "block") {
        volumeSection.style.display = "flex";
    } else {
        volumeSection.style.display = "none";
    }
}

// 3.11 If the button is clicked, then mute it, otherwise turn it back to the last volume level. Change the icon to me mute if its silent, little volume if its quiet-ish, and loud icon when its over 70%.
function changeVolumeIcon() {
    if (!volumeChange.children[0].classList.contains("fa-volume-mute")) {
        volumeChange.children[0].classList.remove(
            "fa-volume-up",
            "fa-volume-down"
        );
        volumeChange.children[0].classList.add("fas", "fa-volume-mute");
        //set the volume to zero
        playlist[currentTrack].volume = 0;
    } else if (volumeChange.children[0].classList.contains("fa-volume-mute")) {
        volumeChange.children[0].classList.remove("fa-volume-mute");
        setVolume();
    }
}

/******************************************************************************
4. Global Functions
******************************************************************************/

// 4.1 get the current time of the current track playing
function getCurrentTime() {
    return playlist[currentTrack].currentTime;
}

// 4.2 Gathers the value of the volumeControl element and sets the current track's volume to that number. If the volume is at zero, display the volumeChange button as muted; if its between 1 and 70%, show the volume-down icon; if its higher than 70%, show the volume-up icon.
function setVolume() {
    let volume = volumeControl.value / 100;
    if (volume === 0) {
        volumeChange.children[0].classList.add("fas", "fa-volume-mute");
        volumeChange.children[0].classList.remove(
            "fa-volume-down",
            "fa-volume-up"
        );
    } else if (volume > 0 && volume < 0.7) {
        volumeChange.children[0].classList.add("fas", "fa-volume-down");
        volumeChange.children[0].classList.remove(
            "fa-volume-mute",
            "fa-volume-up"
        );
    } else if (volume >= 0.7) {
        volumeChange.children[0].classList.add("fas", "fa-volume-up");
        volumeChange.children[0].classList.remove(
            "fa-volume-mute",
            "fa-volume-down"
        );
    }
    playlist[currentTrack].volume = volume;
}

// 4.3 Pauses the currentTrack and resets its currentTime back to the beginning (used in conjunction with other functions). This function is paramount in making sure audio tracks don't produce overlapping audio.
function playlistLogic() {
    playlist[currentTrack].pause();
    playlist[currentTrack].currentTime = 0;
    clickedSong[currentTrack].parentElement.classList.remove("item-playing");
}

// 4.4 Updates the currentTrack number for the display, and also calls the playTrack() function to have the song start playing (used in conjunction with other functions).
function updateTrack() {
    track.textContent = currentTrack + 1;
    playTrack();
}

// 4.5 This function decides what happens to the next played song in the playlist, depending on the current states of the shuffle and repeat buttons.
function checkEndOfSong() {
    setInterval(() => {
        //check if the current song duration has reached its end (this is checked every three seconds)
        if (
            playlist[currentTrack].currentTime ===
            playlist[currentTrack].duration
        ) {
            //check status of repeat button
            if (buttonRepeat.children[1].classList.contains("one")) {
                playlistLogic();
                playTrack();
                buttonRepeat.children[1].classList.remove(
                    "one",
                    "fas",
                    "fa-circle"
                );
                buttonRepeat.children[1].classList.add("repeat");
            } else if (
                buttonRepeat.children[1].classList.contains("infinity")
            ) {
                playlistLogic();
                playTrack();
            }
            //check status of shuffle button
            else if (
                buttonShuffle.children[1].classList.contains("shuffle-active")
            ) {
                playlistLogic();
                shufflePlaylist();
                updateTrack();
            }
            //default is to play the next song
            else if (buttonRepeat.children[1].classList.contains("repeat")) {
                nextTrack();
            }
        }
    }, 3000);
}

// 4.6 Finds a random number between 0 and the playlistLength (inclusive) to return as the next currentTrack. If the number returned is the same as the currentTrack, the function is recalled recursively until a unique random track is returned.
function shufflePlaylist() {
    function randomize() {
        return Math.floor(Math.random() * (playlistLength - 0 + 1));
    }
    let randomTrack = randomize();
    if (randomTrack !== currentTrack) {
        currentTrack = randomTrack;
        return currentTrack;
    } else {
        shufflePlaylist();
    }
}

// 4.7 This formats the currentTime of each audio object into a more readable format to display to the user.
function formatTime(time) {
    let min = Math.floor(time / 60);
    if (min < 10) {
        min = `${min}`;
    }
    let sec = Math.floor(time % 60);
    if (sec < 10) {
        sec = `0${sec}`;
    }
    return `${min}:${sec}`;
}

        </script>
     </body>
</html>

