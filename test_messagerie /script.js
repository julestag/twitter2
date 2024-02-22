$("#chatbox").submit(function(e){
    e.preventDefault();
    message = $(this).find("input[name=message]").val();
    id = $(this).find("input[name=number_id]").val();

    $.post("model.php",{message: message},function(){
        var div = document.getElementById("div_message");
        var p = document.createElement("p");
        p.innerHTML = id + ":" +message;
        div.append(p);
    })

     
})

function affichage(){
    var div = document.getElementById("div_message");
    div.innerHTML = "";
    //alert("ok")
    message = $(this).find("input[name=message]").val();
    $.ajax({
        type: "POST",
        url: "time_chat.php",
        data: {message: message},

        success: function(response){
            var json = JSON.parse(response);
            console.log(Object.keys(json).length)
            for(var i = 0; i < Object.keys(json).length; i++){
                var sotck = (Object.values(json)[i]);
                var div = document.getElementById("div_message");
                var p = document.createElement("p");
                p.innerHTML = "User ID" +" "+ sotck["id_user"] + ":" +sotck["content"];
                div.append(p);
            }
        },
       
    })

}

setInterval(affichage,1000);

