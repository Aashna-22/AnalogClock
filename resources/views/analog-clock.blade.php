<!DOCTYPE html>
<html lang="en-US">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>A Digital Analog Clock</title>
        <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

        <style>
            body {
                background: #f0ecec;
                }
            .main {
                display: flex;
                padding: 2em;
                height: 90vh;
                justify-content: center;
                align-items: middle;
            }
            .clockbox,
            #clock {
                width: 100%;
            }
            /* Clock styles */
            .circle {
                stroke: #282828;
                background: #282828;
                stroke-width: 9;
                stroke-miterlimit: 10;
                box-shadow: 4px -4px 10px rgba(67,67,67,0.5),
                            inset 4px 4px 10px rgba(0,0,0,0.5),
                            inset -4px -4px 10px rgba(67,67,67,0.5),
                            4px 4px 10px rgba(0,0,0,0.3);
            }
            
            .mid-circle {
                fill: #434040;
            }
            .hour-marks {
                fill: none;
                stroke: #393737;
                stroke-width: 9;
                stroke-miterlimit: 10;
            }
            .hour-arm {
                fill: none;
                stroke: #61afff;
                stroke-width: 17;
                stroke-miterlimit: 10;
                width: 30%;
                z-index: 3;
            }
            .minute-arm {
                fill: none;
                stroke: #61afff;
                stroke-width: 11;
                stroke-miterlimit: 10;
            }
            .second-arm {
                fill: none;
                stroke: #ee791a;
                stroke-width: 4;
                stroke-miterlimit: 10;
            }
            .sizing-box {
                fill: none;
            }
            #hour,
            #minute,
            #second {
                transform-origin: 300px 300px;
                transition: transform .5s ease-in-out;
            }
        </style>
    </head>

    <body>
        <main class="main">
            <div class="clockbox">
                <svg id="clock" xmlns="http://www.w3.org/2000/svg" width="600" height="600" viewBox="0 0 600 600">
                    <g id="face">
                        <circle class="circle" cx="300" cy="300" r="253.9"/>
                        <path class="hour-marks" d="M300.5 94V61M506 300.5h32M300.5 506v33M94 300.5H60M411.3 107.8l7.9-13.8M493 190.2l13-7.4M492.1 411.4l16.5 9.5M411 492.3l8.9 15.3M189 492.3l-9.2 15.9M107.7 411L93 419.5M107.5 189.3l-17.1-9.9M188.1 108.2l-9-15.6"/>
                        <circle class="mid-circle" cx="300" cy="300" r="16.2"/>
                    </g>
                    <g id="hour">
                        <path class="hour-arm" d="M300.5 298V142"/>
                        <circle class="sizing-box" cx="300" cy="300" r="253.9"/>
                    </g>
                    <g id="minute">
                        <path class="minute-arm" d="M300.5 298V67"/>
                        <circle class="sizing-box" cx="300" cy="300" r="253.9"/>
                    </g>
                    <g id="second">
                        <path class="second-arm" d="M300.5 350V55"/>
                        <circle class="sizing-box" cx="300" cy="300" r="253.9"/>
                    </g>
                </svg>
            </div><!-- .clockbox -->
        </main>
        <script async> 
            const HOURHAND = document.querySelector("#hour");
            const MINUTEHAND = document.querySelector("#minute");
            const SECONDHAND = document.querySelector("#second");

            var date = new Date();
            console.log(date);
            let hr = date.getHours();
            let min = date.getMinutes();
            let sec = date.getSeconds();
            console.log("Hour: " + hr + " Minute: " + min + " Second: " + sec);

            let hrPosition = (hr*360/12) + (min*(360/60)/12);
            let minPosition = (min*360/60 )+ (sec*(360/60)/60);
            let secPosition = sec*360/60;

            function setDate() {
                hrPosition = hrPosition+(3/360);
                minPosition = minPosition+(6/60);
                secPosition = secPosition+(6);

            HOURHAND.style.transform = "rotate(" + hrPosition + "deg)";
            MINUTEHAND.style.transform = "rotate(" + minPosition + "deg)";
            SECONDHAND.style.transform = "rotate(" + secPosition + "deg)";
            }

            var interval = setInterval(setDate, 1000);
        </script>
    </body>

</html>