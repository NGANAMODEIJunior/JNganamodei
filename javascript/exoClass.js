var toto = "titi";

function mafunction() {

    setInterval(function () {

        let valeur = document.getElementById("DonneAEnvoyer").value;
        //name est donne2 pour $_POST["donne"] 
        fetch('DonneMoiLeContenuDeMonCompte.php?donne='+valeur).then((resp) => resp.json()).then(
            function (respJsonData) {
                // data est la reÌponse http de notre API.
                console.log(respJsonData);
                UpdateDiv("NumCompte", respJsonData[0]);
            }).catch(function (error) {
                // This is where you run code if the server returns any errors
                console.log(error);
            });

    }, 2000)


    setInterval(function () {

        let valeur = document.getElementById("DonneAEnvoyer").value;
        //name est donne2 pour $_POST["donne2"] 
        let data = { "donne2": valeur };
        const urlEncodedData = new URLSearchParams(data);
        fetch('DonneMoiLeContenuDeMonCompte.php', {
          method: 'POST',
          body: urlEncodedData,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          }
        })
          .then(response => response.json())
          .then(respJsonData => {
            console.log(respJsonData);
            UpdateDiv("NumCompte", respJsonData[0]);
          })
          .catch(error => {
            console.error('erreur post', error);
          });

    }, 2000)





}


function UpdateDiv(id, text) {
    var e = document.getElementById(id).innerHTML = text;
}
