var N = prompt("entrez un nombre: ");

var resultat = 1;
for(let i = 1; i <= N; N++)
{
    resultat *=i;
}
alert("le factoriel de " + N + "est " + resultat);