function showValue(button) {
    var buttonValue = button.value;
    document.getElementById('buttonValue').value = buttonValue;
    mettreBleu(button);
    //alert("La valeur du bouton est : " + buttonValue);
}

const MOIS = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre"];
const JOURSMOIS = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]
var listeElementsBleu = [];


function changerMoisGauche(mois) {
    var moisAnnee = document.getElementById('moisAnnee').innerText;
    var splitee = moisAnnee.split(" ");
    var mois = splitee[0];
    var annee = parseInt(splitee[1]);
    var index = MOIS.indexOf(mois);

    var trente = document.getElementById("30");
    var trenteUn = document.getElementById("31");

    if(index > 0) {
        index -= 1
    } else {
        index = 11;
        annee -= 1;
    }
    mois = MOIS[index];
    var nbJoursMois = JOURSMOIS[index];
    
    document.getElementById('moisValue').value = mois;
    document.getElementById('moisAnnee').innerText = (mois + " " + annee);
    document.getElementById('anneeValue').value = annee;

    if (nbJoursMois == 31) {
        trente.style.display = "table-cell";
        trenteUn.style.display = "table-cell";
    }
    else if (nbJoursMois == 30) {
        trente.style.display = "table-cell";
        trenteUn.style.display = "none";
    } else {
        trente.style.display = "none";
        trenteUn.style.display = "none";
    }
}

function changerMoisDroite(mois) {
    var moisAnnee = document.getElementById('moisAnnee').innerText;
    var splitee = moisAnnee.split(" ");
    var mois = splitee[0];
    var annee = parseInt(splitee[1]);
    var index = MOIS.indexOf(mois);

    var trente = document.getElementById("30");
    var trenteUn = document.getElementById("31");

    if(index <= 10) {
        index += 1
    } else {
        index = 0;
        annee += 1;
    }
    mois = MOIS[index];
    var nbJoursMois = JOURSMOIS[index];
    
    document.getElementById('moisValue').value = mois;
    document.getElementById('moisAnnee').innerText = (mois + " " + annee);
    document.getElementById('anneeValue').value = annee;

    if (nbJoursMois == 31) {
        trente.style.display = "table-cell";
        trenteUn.style.display = "table-cell";
    }
    else if (nbJoursMois == 30) {
        trente.style.display = "table-cell";
        trenteUn.style.display = "none";
    } else {
        trente.style.display = "none";
        trenteUn.style.display = "none";
    }

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

function changerConcert(params) {

    var nouvelIndex;

    var taille = params[0];
    var direction = params[1];
    var index = parseInt(params[2]);
;
    console.log(params[0], params[1], params[2]);

    if (direction == 0) {
        if (index <= 0) {
            index = taille - 1;
        } else {
            index = index - 1;
        }
    } else {
        if (index >= taille - 1) {
            index = 0;
        } else {
            index = index + 1;
        }
    }

    nouvelIndex = index;
    console.log(nouvelIndex);

    $.ajax({
        type:'POST',
        url: 'artiste.php',
        data: {nouvelIndex : nouvelIndex}
    });

    
}

