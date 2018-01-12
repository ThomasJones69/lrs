
// creeer popup element
function myPopup() {
//                alert('werkt' + " " + img.id + " " +    img.src );
    var popup = document.createElement("div");
    var form = document.createElement("form");
    form.setAttribute("action", "invoerenLeerling.php");
    form.setAttribute("id", "myForm");
    form.setAttribute("method", "get");


    var naam = document.createElement("input");
    naam.setAttribute("name", "naam");
    naam.setAttribute("placeholder", "Naam");

    var adres = document.createElement("input");
    adres.setAttribute("name", "adres");
    adres.setAttribute("placeholder", "Adres");


    var woonplaats = document.createElement("input");
    woonplaats.setAttribute("name", "woonplaats");
    woonplaats.setAttribute("placeholder", "Woonplaats");

    var tel = document.createElement("input");
    tel.setAttribute("name", "tel");
    tel.setAttribute("placeholder", "telefoonnummer");

    var telNood = document.createElement("input");
    telNood.setAttribute("name", "telnood");
    telNood.setAttribute("placeholder", "tel.bij noodgeval");
    telNood.setAttribute("class", "popupForm");
    telNood.style.margin = "5px";

    var telOuders = document.createElement("input");
    telOuders.setAttribute("name", "telouders");
    telOuders.setAttribute("placeholder", "Telefoon ouders");

    var klasnr = document.createElement("input");
    klasnr.setAttribute("name", "klas");
    klasnr.setAttribute("placeholder", "Klasnummer");
    klasnr.setAttribute("type", "number");

    //submitknop
    var submit = document.createElement("input");
    submit.setAttribute("type", "button");
    submit.setAttribute("value", "submit");
    submit.setAttribute("id", "submitKnop");
    submit.addEventListener("click", mySubmit);

//                var afb = document.createElement("img");
//                afb.setAttribute("class", "classafb");
//                afb.setAttribute("src", img.src );

    //sluitknop
    var sluitknop = document.createElement("button");
    var t = document.createTextNode("X");
    sluitknop.appendChild(t);
    //toevoegen child aan parent        
    form.appendChild(naam);
    form.appendChild(adres);

    form.appendChild(woonplaats);
    form.appendChild(tel);
    form.appendChild(telNood);
    form.appendChild(telOuders);
    form.appendChild(klasnr);


    popup.appendChild(sluitknop);
    popup.appendChild(form);
    popup.appendChild(submit);
    popup.setAttribute("class", "popupnaam");
    var popupvak = document.getElementById("afbContainer");
    popupvak.appendChild(popup);


}
//submit form in popup
function mySubmit() {
    alert("ben bij addEvent");
    document.getElementById("myForm").submit();
}

//Function voor het registeren van de leerling
function aanwezig(leerling) {
    console.log(leerling.id);

    $.post("registreerAanwezigheid.php", {leerlingID: leerling.id}, function (data, status) {
//			$.post("./registreerAanwezigheid.php",  function(data){                                          
//				alert("Data: " + data + "\nStatus: " + status);
//				$('#somediv').html(data);
    });
}

