
<?php
function transfert (){
    include ("connexion.php");
    $img_blob = file_get_contents ($_FILES['fic']['tmp_name']);
    $req = "INSERT INTO tweet (" . 
                            "id_user, content" .
                            ") VALUES (" .
                            "'" . 1 . "', " .
                            "'" . $img_nom . "', " .
                            "'" . $img_taille . "', " .
                            "'" . $img_type . "', " .
                            "'" . $img_blob . "') ";
}
?>