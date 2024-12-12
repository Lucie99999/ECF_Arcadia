document.getElementById("loginForm").addEventListener("submit",function(event){
    event.preventDefault();

    //Récupération des données
    const form = document.getElementById("loginForm")
    const mail = document.getElementById("mail").value;
    const password = document.getElementById("pwd").value;
    const errorElement = document.getElementById("error");

    //Détermination des regex rattachés aux 2 champs
    const mailRegex = new RegExp('/[a-z]+-?[a-z]*.[a-z]+-?[a-z]*@arcadia.fr/');
    const passwordRegex = new RegExp(/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.* ).{8,}$/);

    //Vérification des entrées utilisateurs
    if ((!mailRegex.test(mail)) && (!passwordRegex.test(password))) {
        errorElement.textContent = "Veuillez entrer des données valides.";
        errorElement.setAttribute('class','alert alert-danger');
        errorElement.setAttribute('role','alert');
    } else {
        form.submit();
    }
    document.getElementById("loginForm").reset();
});


