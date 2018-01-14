
// creeer popup element
function myPopup() {
//                alert('werkt' + " " + img.id + " " +    img.src );
    var popup = document.createElement("div");
    popup.setAttribute("id", "test")

    var form = document.createElement("form");
    form.setAttribute("action", "invoerenLeerling.php");
    form.setAttribute("id", "myForm");
    form.setAttribute("method", "post");
    form.setAttribute("enctype", "multipart/form-data")


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


//  Uploaden foto
    var loadAfb = document.createElement("input");
    loadAfb.setAttribute("type", "hidden");
    loadAfb.setAttribute("name", "MAX_FILE_SIZE");
    loadAfb.setAttribute("value", "40000");

    var fotoText = document.createElement("p");
    var fotoInnerText = document.createTextNode("Foto ophalen:");
    fotoText.appendChild(fotoInnerText);

    var userFile = document.createElement("input");
    userFile.setAttribute("name", "userfile");
    userFile.setAttribute("type", "file");


    //sluitknop
    var sluitknop = document.createElement("button");
    var t = document.createTextNode("X");
    sluitknop.appendChild(t);
    sluitknop.addEventListener("click", cancelPopup);

    //toevoegen child aan parent 
    form.appendChild(loadAfb);
    form.appendChild(fotoText);
    form.appendChild(userFile);
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
//    alert("ben bij addEvent");
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
// popup absentie
function myPopup_absentie(img) {
    var afbinhoud = img;

    var popup = document.createElement("div");
    popup.setAttribute("id", "test")

    var form = document.createElement("form");
    form.setAttribute("action", "BasTest.php");
    form.setAttribute("id", "myFormAbsent");
    form.setAttribute("method", "get");
    form.setAttribute("enctype", "multipart/form-data");

    var id = document.createElement("input");
    id.setAttribute("type", "hidden");
    id.setAttribute("name", "leerlingID");
    id.setAttribute("value", afbinhoud.id);
    
    var textbox = document.createElement("p");
    var innerbox = document.createTextNode("Selecteer reden");
    textbox.appendChild(innerbox);

    //submitknop
    var submit = document.createElement("input");
    submit.setAttribute("type", "button");
    submit.setAttribute("value", "submit");
    submit.setAttribute("id", "submitKnop");
    submit.addEventListener("click", mySubmitAbsent);

    var afb = document.createElement("img");
    afb.setAttribute("class", "classafb");
    afb.setAttribute("id", "afb_absentie");
    afb.setAttribute("src", afbinhoud.src);

    //sluitknop
    var sluitknop = document.createElement("button");
    var t = document.createTextNode("X");
    sluitknop.appendChild(t);
    sluitknop.addEventListener("click", cancelPopup);

    //droplist
    var select = document.createElement("select");
    var option1 = document.createElement("option");
    option1.setAttribute("value", "ziek");
    var txt1 = document.createTextNode("ziek");
    option1.appendChild(txt1);
    select.appendChild(option1);

    var option2 = document.createElement("option");
    option2.setAttribute("value", "verslapen");
    var txt2 = document.createTextNode("verslapen");
    option2.appendChild(txt2);
    select.appendChild(option2);


    //toevoegen child aan parent 
    form.appendChild(afb);
    form.appendChild(id);
    form.appendChild(textbox);
    form.appendChild(select);

    popup.appendChild(sluitknop);
    popup.appendChild(form);
    id

    popup.appendChild(submit);
    popup.setAttribute("class", "popupnaam");
    var popupvak = document.getElementById("afbContainer");
    popupvak.appendChild(popup);


}
//submit form in popup
function mySubmit() {
    document.getElementById("myForm").submit();
    document.getElementById("test").parentNode.removeChild(document.getElementById("test"));
}
function mySubmitAbsent() {
    document.getElementById("myFormAbsent").submit();
    document.getElementById("test").parentNode.removeChild(document.getElementById("test"));
}














// popup deleten
function cancelPopup() {
    document.getElementById("test").parentNode.removeChild(document.getElementById("test"));
}
