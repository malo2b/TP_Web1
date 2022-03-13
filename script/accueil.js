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
})
