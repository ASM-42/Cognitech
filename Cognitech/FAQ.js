


var btnPopup = document.getElementById('btnPopup');
var overlay = document.getElementById('overlay');
concole.log(overlay.style.display);
btnPopup.onclick = function() {
    overlay.style.display = "block";
}

var btnClose = document.getElementById('btnClose');
btnClose.onclick = function() {
    overlay.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == overlay) {
        overlay.style.display = "none";
    }
}