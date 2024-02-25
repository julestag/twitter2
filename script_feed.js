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

   // TEST TWEET // 
   var i = 0
   function max_char()
   {
       var area_length=document.getElementById("tweet").value.length;
       if(area_length>140)
       {
            alert("140 caractères autorisé dépassé, Veuillez raccourcir votre texte puis réessayer.");
            return false;
       }
       else
       {
            const para = document.createElement("p");
            var tmp = document.getElementById("tweet").value;
            para.innerHTML = tmp;
            document.getElementById("tab2").appendChild(para);

            if(document.querySelector('input[type=file]').value !== ""){
                var img = document.querySelector('input[type=file]').files[0];
                var reader = new FileReader();
                
                reader.addEventListener("load", function () {
                   
                   console.log(reader.result);
                    localStorage.setItem("image_" + i, reader.result);
                    i++;
                }, false);
                
                if (img) {
                    reader.readAsDataURL(img);
                }

               var img_element =  document.createElement("img");
               img_element.setAttribute("src", localStorage.getItem("image_" + i));
               document.getElementById("tab2").appendChild(img_element);
            }
            
           return true;
       }
   }
 
   document.getElementById("post_tweet").addEventListener("submit",function(e){
    e.preventDefault();
    max_char();

    
       //Partie photo//

   })





   

