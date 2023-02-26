import 'bootstrap/dist/css/bootstrap.css';
/*install only singal component*/
import 'bootstrap/js/dist/collapse';
import "./style.css";
function hideme(){
    let id = document.getElementById("hideheading").style.display = "none";
}
var button = document.getElementById("hideme");
button.addEventListener("click", function(){
    hideme();
});

window.onload = function(){
    console.warn("window is loadded");
}
