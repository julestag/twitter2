<?php session_start() ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/output.css">
    <title>Fil d'actualité - tweet_academy</title>
</head>
<body>
    <div class="grid grid-col-8">
    <div class="menu col-span-2 w-10 text-align mx-3">
        <img class="w-10" src="images/logonoir.png" alt="Logo twitter noir">
        <br>
        <div class="flex items-center">
        <img class="w-8" src="images/home.png" alt="Logo twitter noir">

        <a class="text-align mx-6" href="#">Home</a>
</div>
<br>
<div class="flex items-center">
    <img class="w-8" src="images/messages.png" alt="Logo twitter noir">

    <button class="text-align mx-6 data-target" id="message"><a href="#">Messages</a></button>
</div>
<br>
<div class="flex items-center">
    <img class="w-8" src="images/profile.png" alt="Logo twitter noir">

    <a class="text-align mx-6" href="#">Profile</a>
    
</div>
<div class="flex items-center mx-1 my-5">
  
    <a href="#_" class="inline-block px-12 py-0 mx-auto text-white bg-blue-500 rounded-full hover:bg-blue-700 md:mx-0">POST</a>
</div>

    </div>

  
    

    <div class="col-span-4 mb-4 w-1/2 p-4 mx-auto text-center border">
        <ul class="tab-list flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
            <li class="me-2" role="presentation">
                <button data-target="tab1" href="#" aria-current="page" class="inline-block p-4 border-b-2 rounded-t-lg hover:border-blue-300 dark:hover:text-blue-300">Suggestion</button>
            </li>
            <li class="me-2">
                <button data-target="tab2" href="#" class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-blue-300 dark:hover:text-blue-300">Following</button>
            </li>
        </ul>

        <form id="post_tweet">
            <textarea placeholder="Write your tweet here.." id="tweet" maxlength="140"></textarea>
            <hr class="hr_post w-9/12 ml-20">


            <label for="file-input">
           <img class="img-photo" src="images/img.png" alt="logo ajout image">
            </label>

            
           <input type="file" id="file-input">
            <button type="submit" class="post inline-block px-5 py-0 mx-auto text-white bg-blue-500 rounded-full hover:bg-blue-700 md:mx-0">Post</button>
        </form>

        <hr class="w-full mt-5">
        <div class="tab-pane h-screen flex justify-center grid-cols-2 mb-4 w-1/2 p-4 ">
            <div data-content id="tab1" class="tab-content">
                <p>gdzdhhihuizhuiah</p>
            </div>
    
            <div data-content id="tab2" class="tab-content">
                <p>test2</p>
            </div>

    </div>
</div>


    <div class="col-span-2 w-10 text-align mx-3">
    <input class="search mt-5 mr-5 bg-gray-100 p-1 rounded-full"type="text" placeholder="Search">
</div>

    </div>

    


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/client.js?onload=load"></script>
    <script src="script_feed.js"></script>
</body>
</html>