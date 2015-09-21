function toggleImage(id) {
    var lImage = document.getElementById(id);
    lImage.style.display = (lImage.style.display == "table") ? "show" : "table";
}

function hideImage(id) {
    var lImage = document.getElementById(id);
    lImage.style.display = (lImage.style.display == "table") ? "none" : "table";
}
