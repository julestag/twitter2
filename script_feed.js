var xhr = new XMLHttpRequest();       
    xhr.open("GET", "images/profil-image.png", true); 
    xhr.responseType = "blob";
    xhr.onload = function (e) {
            console.log(this.response);
            var reader_img = new FileReader();
            reader_img.onload = function(event) {
               var res = event.target.result;
               localStorage.setItem("image_00", res);
            }
            var file = this.response;
            reader_img.readAsDataURL(file)
    };
    xhr.send()


function tabs (nav){
    var tabs = nav.querySelectorAll("*[data-target]");
    console.log(tabs);
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

   function like(dataId)
   {
    $.post("./like.php",{tweetid: dataId},function(response){
                    
    })        

          
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
                var div = document.createElement('div');
                div.id = 'test';
                var h1 = document.createElement('h1');
                var p = document.createElement('p');
                var p1 = document.createElement('p');
                var img = document.createElement('img');
                var br = document.createElement('br');
                var br1 = document.createElement('br');


                var key_ls_picture = element['profile_picture'];

                p.id = 'pseudo';
                p1.id = 'letweet';
                img.src =localStorage.getItem(key_ls_picture);
                var content = element['content'].replace(/#(\w+)/g, `<a href='printHashtag.php?hashtag=$1'>#$1</a>`);
                if(element['content'].includes("image_")){
                    //alert("ok");
                    var img = document.createElement("img");
                    img.id = 'image';
                    img.setAttribute("src",localStorage.getItem(element['content']));
                    p.innerHTML = element['at_user_name'] + " : ";
                   // tweetsDiv.appendChild(p);
                    tweetsDiv.appendChild(img);
                }else{
                    if(element['content'].includes("#")){
                        let temp = element['content'].replace(/#/g, "%§!%#");
                        let words = temp.split(/\s|%§!%/);
                        let hashtags = words.filter((word) => word.startsWith("#"));
                        // console.log(hashtags);
                        if(hashtags){
                            hashtags.forEach(function(elementBis) {
                                $.ajax({
                                    type: 'POST',
                                    url: 'printHashtag.php',
                                    data: {
                                      saveHashtag:elementBis
                                    }
                                });
                            });
                        }
                    
                    var content = element['content'].replace(/#(\w+)/g, `<a href='printHashtag.php?hashtag=$1'>#$1</a>`);
                    console.log(content);
                                                                // console.log(element['content']);
                    //console.log(element);
                    h1.innerHTML = element['username'];
                    p.innerHTML = element['at_user_name'];
                    p1.innerHTML = content;
                    tweetsDiv.appendChild(div);
                    div.appendChild(img);
                    div.appendChild(br);
                    div.appendChild(h1);
                    div.appendChild(p);
                    div.appendChild(p1);
                    div.appendChild(br1);
                    console.log(element['content']);
                    }else{
                                            // console.log(element['content']);
                    //console.log(element);
                    h1.innerHTML = element['username'];
                    p.innerHTML = element['at_user_name'];
                    p1.innerHTML = content;
                    tweetsDiv.appendChild(div);
                    div.appendChild(img);
                    div.appendChild(br);
                    div.appendChild(h1);
                    div.appendChild(p);
                    div.appendChild(p1);
                    div.appendChild(br1);
                    console.log(element['content']);
                    }

                }
            });
        },
        error: function() {
            console.log("error");
        }
    });
}
printTweets();
setInterval(printTweets, 5900);


   document.getElementById("post_tweet").addEventListener("submit",function(e){
    //alert("ok");
    e.preventDefault();
    max_char();

    
       //Partie photo//

   })
   
   const search = document.getElementById("search");
   search.addEventListener("keyup", function(){
       let searchDiv = document.getElementById("searchDiv");
       if (search.value === "") {
           searchDiv.innerHTML = "";
       } 
       if(search.value.startsWith("#")){
           $.ajax({
               type: 'POST',
               url: 'search.php',
               dataType: 'json',
               data: {
                 hashtag:search.value
               },
               success: function(response){
                   console.log(response);
                   searchDiv.innerHTML = "";
                   if(response !== "error"){
                       response.forEach((element) => {
                           var p = document.createElement('p');
                           var content = element['hashtag'].replace(/#(\w+)/g, `<a href='printHashtag.php?hashtag=$1'>#$1</a>`);
                           p.innerHTML = content;
                           searchDiv.appendChild(p);
                       });
                   }
               }
           });
           return false;
       }else if (search.value.substring(0, 1) === "@") {
           $.ajax({
               type: 'POST',
               url: 'search.php',
               dataType: 'json',
               data: {
                 at:search.value
               },
               success: function(response){
                   console.log(response);
                   let searchDiv = document.getElementById("searchDiv");
                   searchDiv.innerHTML = "";
                   if(response !== "error"){
                       response.forEach((element) => {
                           var p = document.createElement('p');
                           p.innerHTML = element["at_user_name"];
                           searchDiv.appendChild(p);
                       });
                   }
               }
           });
           return false;  
       }
   });


   
