function menuClick(x) {
    "use strict";
    x.classList.toggle("change");
}
    
function showMenu(x) {
    "use strict";
    if (document.getElementById("menublock").style.display == "block") {
        document.getElementById("menublock").style.display = "none";
        document.getElementById("hiddenmenu").style.display = "none";
        document.body.style.overflow = "auto";
    } else {
        document.getElementById("menublock").style.display = "block";
        document.getElementById("hiddenmenu").style.display = "block";
        document.body.style.overflow = "hidden";
    }
}