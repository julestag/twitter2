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
                var formData = document.getElementById("tweet").value
        
              
                $.post("./connexion.php",{tweet: formData},function(response){
                    
                })
        
        var tab2Div = document.getElementById("tab2");
        
        

            if(document.querySelector('input[type=file]').value !== ""){
                var img = document.querySelector('input[type=file]').files[0];
                var reader = new FileReader();
                
                reader.addEventListener("load", function () {
                   console.log(reader.result);
                  var key =  Math.floor(Math.random() * 9000)
                    localStorage.setItem("image_" + key, reader.result);


                    $.post("model.php",{key: "image_"+key},function(){});


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
 
   function printTweets(){
    var print = true;
    $.ajax({
        type: 'GET',
        url: 'feed.php',
        data: {
            print:print,
        },
        success: function(response){
            let tweets = JSON.parse(response);
            console.log(tweets);
            var tweetsDiv = document.getElementById("tweetsDiv");
            tweetsDiv.innerHTML = '';
            tweets.forEach((element) => {
                var p = document.createElement('p');
                var content = element['content'].replace(/#(\w+)/g, `<a href='printHashtag.php?hashtag=$1'>#$1</a>`);
                if(element['content'].includes("image_")){
                    //alert("ok");
                    var img = document.createElement("img");
                    img.setAttribute("src",localStorage.getItem(element['content']));
                    p.innerHTML = element['at_user_name'] + " : ";
                   // tweetsDiv.appendChild(p);
                    tweetsDiv.appendChild(img);
                }else{
                    p.innerHTML = element['at_user_name'] + " : " + content;
                    tweetsDiv.appendChild(p);
                    console.log(element['content']);
                }
            });
        },
        error: function() {
            console.log("error");
        }
    });
}
printTweets();
setInterval(printTweets, 5000);


   document.getElementById("post_tweet").addEventListener("submit",function(e){
    //alert("ok");
    e.preventDefault();
    max_char();

    
       //Partie photo//

   })





   

