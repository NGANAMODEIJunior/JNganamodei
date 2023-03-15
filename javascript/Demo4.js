function Appel(){
    fetch('http://192.168.65.204/junior/javascript/Demo3.php',{method: 'get'}).then(response=>response.json()).then(data=>{
    document.getElementById("reponse").innerHTML="la donnée est "+data;
})
} setInterval(Appel, 2000);