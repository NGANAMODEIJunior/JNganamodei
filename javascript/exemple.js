class Maison{

    constructor(couleur){
        this.couleur = couleur;
    }
    
    changerCouleur(nouvelleCouleur){
        this.couleur = nouvelleCouleur;
    }

}

let maMaison = new Maison(rouge);
alert(" "+maMaison.couleur+" ") // Donnera “rouge”
maMaison.changerCouleur(bleu)
alert(" "+maMaison.couleur+" ") // Donnera “bleu”