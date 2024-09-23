$(document).ready(function() {
    var sec = 180, // 3 menit
        // var sec = 1800, // 30 menit
        countDiv = document.getElementById("time_token"),
        secpass,
        countDown = setInterval(function() {
            'use strict';
            secpass();
        }, 1000);

    function secpass() {
        'use strict';
        var min = Math.floor(sec / 60),
            remSec = sec % 60;
        if (remSec < 10) {
            remSec = '0' + remSec;
        }
        if (min < 10) {
            min = '0' + min;
        }
        countDiv.innerHTML = min + ":" + remSec;
        if (sec > 0) {
            sec = sec - 1;
        } else {
            clearInterval(countDown);
            countDiv.innerHTML = 'Token Expired';
        }
    }
})