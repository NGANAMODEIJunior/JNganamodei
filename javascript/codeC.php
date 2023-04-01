// ConsoleApplication9.cpp : Ce fichier contient la fonction 'main'. L'exécution du programme commence et se termine à cet endroit.
//
#include <vector> //Ne pas oublier !
#include <iostream>
#include <string>
using namespace std;

double carre(double x)
{
	double resultat;
	resultat = x * x;
	return resultat;
}

void dessineRectangle(int l, int h)
{
	for (int ligne(0); ligne < h; ligne++)
	{
		for (int colonne(0); colonne < l; colonne++)
		{
			cout << "*";
		}
		cout << endl;
	}
}

double  decimale(double x, double y)
{
	double m;
	m = (x + y) / 2;

	return m;
}
const int n = 4;
void saisir(int t[n])
{
	int i;
	for (i = 0; i < n; i++) {
		cout << "tapez un entier " << i << endl;
		cin >> t[i];
	}
	

}
void affich(int t[n])
{
	int i;
	for (i = 0; i < n; i++) cout << "la valeur de l'entier est : " << i << endl;
}



int main()
{
	for (int i(1); i <= 20; i++)
	{
		cout << "Le carre de " << i << " est : \n" << carre(i) << endl;
	}



	int largeur, hauteur;
	cout << "Largeur du rectangle : \n"<<endl;
	cin >> largeur;
	cout << "Hauteur du rectangle : \n"<<endl;
	cin >> hauteur;

	dessineRectangle(largeur, hauteur);

	double a;
	a = decimale(3.2, 4.2);
	cout << "la valeur vaut" << a << endl;

	int g[n];
	saisir(g);
	affich(g);



	vector<double> notes; //Un tableau vide

	notes.push_back(12.5);  //On ajoute des cases avec les notes
	notes.push_back(19.5);
	notes.push_back(6);
	notes.push_back(12);
	notes.push_back(14.5);
	notes.push_back(15);

	double moyenne(0);
	for (int i(0); i < notes.size(); ++i)
		//On utilise notes.size() pour la limite de notre boucle
	{
		moyenne += notes[i];   //On additionne toutes les notes
	}

	moyenne /= notes.size();
	//On utilise à nouveau notes.size() pour obtenir le nombre de notes

	cout << "Votre moyenne est : \n" << moyenne << endl;

	
	
		string maChaine("Bonjour !");
		cout << "Longueur de la chaine : " << maChaine.size(); // demander la longueur de la chaine

		string chaine("bonour");
		chaine.erase();
		cout << "La chaine contient : " << chaine << endl;// supprimer le contenu de la chaine

		string chain("Bonjour !");
		cout << chaine.substr(3) << endl; // On a demandé à couper à partir du troisième caractère, soit la lettre "j" (étant donné que la première lettre correspond au caractère n° 0).

		string chane("Bonjour !");
		cout << chaine.substr(3, 4) << endl;//On a demandé à prendre 4 caractères en partant du caractère n° 3, ce qui fait qu'on a récupéré "jour".

		string chae("Bonjour !");
		cout << chaine[3] << endl;  //Affiche la lettre 'j'


	

	return 0;
}

// Exécuter le programme : Ctrl+F5 ou menu Déboguer > Exécuter sans débogage
// Déboguer le programme : F5 ou menu Déboguer > Démarrer le débogage

// Astuces pour bien démarrer : 
//   1. Utilisez la fenêtre Explorateur de solutions pour ajouter des fichiers et les gérer.
//   2. Utilisez la fenêtre Team Explorer pour vous connecter au contrôle de code source.
//   3. Utilisez la fenêtre Sortie pour voir la sortie de la génération et d'autres messages.
//   4. Utilisez la fenêtre Liste d'erreurs pour voir les erreurs.
//   5. Accédez à Projet > Ajouter un nouvel élément pour créer des fichiers de code, ou à Projet > Ajouter un élément existant pour ajouter des fichiers de code existants au projet.
//   6. Pour rouvrir ce projet plus tard, accédez à Fichier > Ouvrir > Projet et sélectionnez le fichier .sln.
