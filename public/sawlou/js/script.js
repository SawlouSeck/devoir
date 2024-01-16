// public/js/script.js
function changerCouleur() {
    var select = document.getElementById("couleurSelect");
    var texteColore = document.getElementById("texteColore");
    var couleurSelectionnee = select.value;
    texteColore.style.color = couleurSelectionnee;
}
