$("#chatbox").submit(function(e){
    e.preventDefault();
    message = $(this).find("input[name=message]").val();

    $.post("model.php",{message: message},function(response){
        var div = document.getElementById("div_message");
        var p = document.createElement("p");
        p.innerHTML = message;
        div.append(p);
    })

    setInterval(function(){
        $.post("time_chat.php",{message:message},function(response){
            
        var div = document.getElementById("div_message");
        var p = document.createElement("p");
        p.innerHTML = response;
        div.append(p);
        })
    })
})

