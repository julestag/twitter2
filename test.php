<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/skeleton/normalize.css">
    <link rel="stylesheet" href="/skeleton/skeleton.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        function sendData()
{
  var name = document.getElementById("name").value;
  var mail =document.getElementById("mail").value;
  if (mail == )
  $.ajax({
    type: 'post',
    url: 'insert.php',
    data: {
      name:name,
      age:age
    },
    success: function (response) {
      $('#res').html("Vos données seront sauvegardées");
    }
  });
    
  return false;
}
    </script>
</head>
<body>
    <div class="container">
        <div class="row">
        <form method="POST" onsubmit="return sendData();">
        <label for="name">Name&nbsp;:</label>
     <input type="text" name="name" id="name">
     <label for="mail">mail&nbsp;:</label>
     <input type="text" name="mail" id="mail">
     <input type="submit" name="submit_form" value="Submit">
  </form>
        </div>
    </div>
</body>
</html>