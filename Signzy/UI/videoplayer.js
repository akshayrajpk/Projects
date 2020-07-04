window.onload = async function () {
    fetch("/time")
        .then(async (response) => {
            data = await response.json();
            // document.getElementById("uname").innerHTML = data.name;
            console.log(data.time[0].time);
            var d = document.getElementById("vid");
            d.currentTime = data.time[0].time;
        });
    //document.getElementById("uname").placeholder = name, name;
};

function myFunction(event) {
    time = event.currentTime;
}

var time;
function pauser() {
    console.log(time);
}

async function statesave() {
    console.log("BA");
    await fetch("/sessionsave/" + time + "/" + "video1");

}

function runr() {
    //alert("BAK");
    console.log("Back");
    window.setTimeout(statesave(), 50000);
}