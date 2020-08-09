function submitContact(e){
    e.preventDefault();

    $("#submit").html("chargement ...")
    console.log($("#email").val())
    $.ajax({
        url : "index.php?class=contact&action=addContact",
        type: "post",
        dataType: "json",
        data: {
            email: $("#email").val(),
            sujet: $("#sujet").val(),
            contenue: $("#contenue").val()
        }
    }).done(function(r){
        if(r.result == "success")
            $("#contact").html("<p> votre message a été bien envoyé </p>")
        else
        {
            alert("réessayer")
            $('#submit').html("<input id='submit' type='submit' value='Envoyer message'>")
        }

    }).fail(function(x){
        console.log(x);
        alert("contactez l'administrateur")
    })
}