/**
 * Variables
 **/

const CLOCK = document.getElementsByClassName('clock')[0];
const LIST = document.getElementsByClassName('this-m-start')[0];
const START = document.getElementsByClassName('start')[0];
const LIST_WRAPPER = document.getElementsByClassName('this-m-start-wrapper')[0];
const OPEN_NAVBAR = document.getElementsByClassName("open-navbar")[0];



/**
 * Functions
 **/

function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    var timer = hmsToSeconds(CLOCK.innerHTML);

    m = checkTime(m);
    s = checkTime(s);
    removeStartedHumans();

    CLOCK.innerHTML = h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}

startTime();



function checkTime(i) {
    if (i < 10) { i = "0" + i }; // додає нуль перед числами меншими 10
    return i;
}

function hmsToSeconds(s) {
    var b = s.split(':');
    return b[0] * 3600 + b[1] * 60 + (+b[2] || 0); // кількість секунд старту учасника
}

function sortByKey(array, key) {
    return array.sort(function(a, b) {
        var x = a[key];
        var y = b[key];
        return ((x < y) ? -1 : ((x > y) ? 1 : 0));
    });
}

function showStart() {
    START.innerHTML = "";
    document.body.style.background = "#4bf542";

    var audio = new Audio('/dist/startcloc/2.wav');
    audio.play();
}

function delStart() {
    START.innerHTML = " ";
    document.body.style.background = "#ffffff";
}

function removeStartedHumans() {
    LIST.innerHTML = '';
    showThisMinuteUsers(users, LIST);

}

var x = 0;


function showThisMinuteUsers(users, list) {
    for (let item of users) {
        let time = hmsToSeconds(CLOCK.innerHTML);




        if (hmsToSeconds(item.start) > time && hmsToSeconds(item.start) - time < 61) { //якщо стартова хвилина учасника не минула
            LIST.innerHTML += '<span><span itemprop="' + item.start + '">' + item.start + '</span><span>' + item.name + '</span><span>' + item.club + '</span><span>' + item.grup + '</span>';
        }

        if (hmsToSeconds(item.start) == time) {
            x = 0;

            delStart();
        }
        if (hmsToSeconds(item.start) - time - 3 == 0 && x == 0) {
            x = x + 1;

            showStart();
        }
    }
}



function usersHandler(results) {
    users = results;
    sortByKey(users, 'start'); //сортує учасників за стартовою хвилиною
    users = users.filter(item => item.start !== '') //видаляє учасників з порожнім значенням старту
    showThisMinuteUsers(users, LIST);
}

/**
 * Event Listeners
 **/

startTime(); //starts clock

//when file will load then uses it
document.getElementById('input').onchange = () => {
    var selectedFile = document.getElementById('input').files[0];
    Papa.parse(selectedFile, {
        header: true,
        complete: function(results, file) {
            LIST.innerHTML = ''; //очищує список
            usersHandler(results.data);
            OPEN_NAVBAR.parentNode.classList.add("closed");
        },
        skipEmptyLines: true
    });
}

//if file was loaded then uses it
window.onload = () => {
    var selectedFile = document.getElementById('input').files[0];
    if (selectedFile) {
        Papa.parse(selectedFile, {
            header: true,
            complete: function(results, file) {
                usersHandler(results.data);
            },
            skipEmptyLines: true
        })
    } else OPEN_NAVBAR.parentNode.classList.remove("closed");
}

OPEN_NAVBAR.onclick = function() {
    this.parentNode.classList.toggle("closed");
}