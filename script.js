function tabs (nav){
    var tabs = nav.querySelectorAll("*[data-target]");
    var i = 0;
    for(i= 0 ; i< tabs.length; i++){
        var tab = tabs[i];
        tab.addEventListener("click", (e) =>{
            var id = e.target.dataset.target;
            var pane = document.getElementById(id);
            console.log(pane);
            pane.classList.add("active");

            var next = pane.nextElementSibling;
            while(next){
                next.classList.remove("active");
                next = next.nextElementSibling;
            }
            next = pane.previousElementSibling;
            while(next){
                next.classList.remove("active");
                next = next.previousElementSibling;
            }
        });
    }
   }
   var list = document.querySelectorAll(".tab-list");
   for(var j = 0; j< list.length; j++ ){
       tabs(list[j]);
   } 

   var message = document.getElementById("message");

   message.addEventListener("click",function(){
    openForm();
   })
   function openForm() {
    document.getElementById("popupForm").style.display = "block";
  }

  function closeForm() {
    document.getElementById("popupForm").style.display = "none";
  }
  function postForm(){
    const lol = document.createElement("div");
    lol.id    = "tweet1";
    var tmp = document.getElementById("tweet").value;
    lol.innerHTML = tmp;


    document.getElementById("tab2").appendChild(lol);


    
  }
  $(document).ready(function() {
    $('#tweet-form').submit(function(e) {
        e.preventDefault();
        
   
        var formData = $(this).serialize();

      
        $.ajax({
            type: 'GET',
            url: 'connexion.php',
            data: formData,
            success: function(response) {
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    });
});

var tab2Div = document.getElementById("tab2");

