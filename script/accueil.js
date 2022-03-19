const userAgent = navigator.userAgent
const timeStart = new Date
const cookie = document.cookie
const form = document.forms['accueilForm']

let getPosition = () => {
    return new Promise((resolve, reject) => {
        navigator.geolocation.getCurrentPosition(
            // Success
            (pos) => {
                let crd = pos.coords
                position = "latitude : " + crd.latitude + " | longitude " + crd.longitude
            },
            // Error
            (err) => {
                position = err.code + " " + err.message
            },
            // Options
            {
                "enableHighAccuracy": true
            })
        });
  }

let getJSON = (url, callback) => {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.responseType = 'json';
    xhr.onload = function() {
        var status = xhr.status;
        if (status === 200) {
            callback(null, xhr.response);
        } else {
            callback(status, xhr.response);
        }
    };
    xhr.send();
};

window.addEventListener("load", (event) => {
    getPosition()
        .then((position) => {
            console.log(position);
            form.elements["position"].value = position
        })
        .catch((err) => {
            console.error(err.message)
            form.elements["position"].value = err.message
        })


    form.elements["userAgent"].value = userAgent
    form.elements["timeStart"].value = timeStart
    form.elements["cookies"].value = cookie

    console.log(userAgent)
    console.log(timeStart)
    console.log(cookie)

    getJSON('http://country.io/names.json', (err, data) => {
        if (err !== null) {
            console.log('Something went wrong: ' + err);
        } else {
            console.log('Your query count: ' + data.query.count);
        }
    });

})
