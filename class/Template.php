<?php

class Template
{
  public static function render(string $content){?>
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Kitchen Comoros</title>
                    <link rel="stylesheet" href="<?php echo $GLOBALS['CSS_DIR'] ?>main.css">
                    <link rel="stylesheet" href="<?php echo $GLOBALS['CSS_DIR'] ?>login.css">
                    <link rel="stylesheet" href="<?php echo $GLOBALS['CSS_DIR'] ?>recette.css">
                    <link rel="stylesheet" href="<?php echo $GLOBALS['CSS_DIR'] ?>admin.css">
                    <link rel="stylesheet" href="<?php echo $GLOBALS['CSS_DIR'] ?>display.css">
                    <link rel="stylesheet" href="<?php echo $GLOBALS['CSS_DIR'] ?>edition.css">
                    <link rel="stylesheet" href="<?php echo $GLOBALS['CSS_DIR'] ?>style.css">
                </head>
            <body>

                <?php include $GLOBALS['PHP_DIR']."pages/header.php" ?>
                <div id="main" class="injected-content">
                    <?php echo $content ?> <!-- INJECTION DU CONTENU -->
                </div>
                <?php include $GLOBALS['PHP_DIR']."pages/footer.php" ?>
                <script src="<?php echo $GLOBALS['JS_DIR']?>main.js"></script>
               <!-- <script src="<?php echo $GLOBALS['JS_DIR']?>edition.js"></script> -->

            </body>
            </html>

 <?php }
}