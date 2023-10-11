<?php
// enregistrement du fichier uploadé
/* if ($imgFile != null) {
     $tmpName = $imgFile['tmp_name'][$compt];
     $imgName = $imgFile['name'][$compt];

     $extention = pathinfo($imgName,PATHINFO_EXTENSION);
     $new_name = md5(uniqid());

     // $imgName = urlencode(htmlspecialchars($imgName));

     $dirname = $GLOBALS['PHP_DIR'] . self::INGREDIENT_DIR;
     if (!is_dir($dirname)) mkdir($dirname);
     $uploaded = move_uploaded_file($tmpName, $dirname.$new_name .".".$extention );
     if (!$uploaded) die("NOT UPLOADED");
 } else {
     echo "NO IMAGE !!!!";
 }*/