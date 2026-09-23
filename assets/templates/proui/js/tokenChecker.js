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
            if (countDiv) countDiv.innerHTML = 'Refreshing...';
            $.ajax({
                url: (typeof BASE_URL !== 'undefined' ? BASE_URL : '') + 'manajemen/Config/refresh_token',
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(response) {
                    if (response.status) {
                        sec = 180;
                    } else {
                        clearInterval(countDown);
                        if (countDiv) countDiv.innerHTML = 'Token Expired';
                        location.reload();
                    }
                },
                error: function() {
                    clearInterval(countDown);
                    if (countDiv) countDiv.innerHTML = 'Token Expired';
                    location.reload();
                }
            });
        }
    }
})