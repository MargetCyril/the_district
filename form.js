function checkform1() {
    let filtre1 = new RegExp(/^[a-z]+$/);
    let filtre2 = new RegExp(/^[a-z0-9.-]?+@[a-z0-9.-]{2}.[a-z]{2,4}$/);
    let filtre3 = new RegExp(/^[a-zA-Z0-9]+$/);
    let filtre4 = new RegExp(/^[0-9]+$/);
    let nom = document.getElementById("nom").value;
    nom = filtre1.test(nom);
    let adresse = document.getElementById("adresse").value;
    adresse = filtre3.test(adresse);
    let mail = document.getElementById("email").value;
    mail = filtre2.test(mail);
    let telephone = document.getElementById("telephone").value;
    telephone = filtre4.test(telephone);
    let question = document.getElementById("question").value;

        if (question == "") {
        document.getElementById("question").innerHTML = "Veuillez formulez votre commentaire"
        question = false
        }
    else {
        question = filtre5.test(question)
    }
    if (nom && adresse && mail && question && telephone) {
        console.log("ok")
        return true
    }
    if (nom == false) {
        document.getElementById("erreur_nom").innerHTML = "champ incorrect"
        return false           
    }
    if (adresse == false) {
        document.getElementById("erreur_adresse").innerHTML = "champ incorrect"
        return false
    }
    if (mail == false) {
        document.getElementById("erreur_mail").innerHTML = "champ incorrect"
        return false
    }
    if (telephone == false) {
        document.getElementById("erreur_telephone").innerHTML = "champ incorrect"
        return false           
    }
}

function checkform2() {
    let filtre1 = new RegExp(/^[a-z]+$/);
    let filtre3 = new RegExp(/^[a-z0-9.-]?+@[a-z0-9.-]{2}.[a-z]{2,4}$/);
    let filtre2 = new RegExp(/^[a-zA-Z0-9]+$/);
    let filtre4 = new RegExp(/^[0-9]+$/);
    let nom = document.getElementById("nom").value;
    nom = filtre1.test(nom);
    let adresse = document.getElementById("adresse").value;
    adresse = filtre3.test(adresse);
    let mail = document.getElementById("email").value;
    mail = filtre2.test(mail);
    let telephone = document.getElementById("telephone").value;
    telephone = filtre4.test(telephone);

    if (nom && adresse && mail && telephone) {
        console.log("ok")
        return true
    }
    if (nom == false) {
        document.getElementById("erreur_nom").innerHTML = "champ incorrect"
        return false           
    }
    if (adresse == false) {
        document.getElementById("erreur_adresse").innerHTML = "champ incorrect"
        return false
    }
    if (mail == false) {
        document.getElementById("erreur_mail").innerHTML = "champ incorrect"
        return false
    }
    if (telephone == false) {
        document.getElementById("erreur_telephone").innerHTML = "champ incorrect"
        return false           
    }
}

