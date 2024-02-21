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
   var navs = document.querySelectorAll(".tab-list");
   for(var j = 0; j< navs.length; j++ ){
       tabs(navs[j]);
   } 