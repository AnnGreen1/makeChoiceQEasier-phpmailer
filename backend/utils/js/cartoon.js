var str = '';
time = 0;
//var source='这是一个传说中的打字动画';
var source = ["","m","a","k","e","C","h","o","i","c","e","Q","E","a","s","i","e","r"," ","让","选","择","题","更","容","易",""];

function sleep(numberMillis)
{
    var now = new Date();
    var exitTime = now.getTime() + numberMillis;
    while (true) 
    {
        now = new Date();
        if (now.getTime() > exitTime)
            return;
    }
}

var ele = document.getElementById('txt');

window.setInterval
    (
        function () {
            str += source[time % source.length];
            time++;
            ele.innerHTML = str+'_';
            //sleep(500);

            if ((time % source.length) == 0) {
                sleep(5000);
                str = '';
            }
        },
        100
    );