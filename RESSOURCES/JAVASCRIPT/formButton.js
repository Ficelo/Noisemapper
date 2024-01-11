function showValue(button) {
    var buttonValue = button.value;
    document.getElementById('buttonValue').value = buttonValue;
    mettreBleu(button);
    //alert("La valeur du bouton est : " + buttonValue);
}

const MOIS =["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre"];
var listeElementsBleu = [];


function changerMoisGauche(mois) {
    var moisAnnee = document.getElementById('moisAnnee').innerText;
    var splitee = moisAnnee.split(" ");
    var mois = splitee[0];
    var annee = parseInt(splitee[1]);
    var index = MOIS.indexOf(mois);

    if(index > 0) {
        index -= 1
    } else {
        index = 11;
        annee -= 1;
    }
    mois = MOIS[index];
    
    document.getElementById('moisValue').value = mois;
    document.getElementById('moisAnnee').innerText = (mois + " " + annee);
    document.getElementById('anneeValue').value = annee;
}

function changerMoisDroite(mois) {
    var moisAnnee = document.getElementById('moisAnnee').innerText;
    var splitee = moisAnnee.split(" ");
    var mois = splitee[0];
    var annee = parseInt(splitee[1]);
    var index = MOIS.indexOf(mois);

    if(index <= 10) {
        index += 1
    } else {
        index = 0;
        annee += 1;
    }
    mois = MOIS[index];
    
    document.getElementById('moisValue').value = mois;
    document.getElementById('moisAnnee').innerText = (mois + " " + annee);
    document.getElementById('anneeValue').value = annee;    
}

function mettreBleu(element) {

    element.style.background = "blue";
    element.style.color = "#FFF";
    element.style.borderRadius = "7px";

    
    listeElementsBleu.map(mettreBlanc);


    listeElementsBleu.push(element);
    console.log(listeElementsBleu);

}

function mettreBlanc(element) {

    element.style.background = "white";
    element.style.color = "#000";
    element.style.borderRadius = "7px";

}