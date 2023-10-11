<?php

    $session = isset($_SESSION['logger']); // recuperation de la session du client?>
<header>
    <div id="absolute">
    <h2 id="logo">
        <img src="https://img.icons8.com/external-bearicons-blue-bearicons/64/null/external-Kitchen-cooking-bearicons-blue-bearicons.png"/>
        <label id="title-page">~Saveurs du monde~</label>
    </h2>

    <img src="https://img.icons8.com/arcade/50/null/sorting-options.png" id="in"/>
        <img src="https://img.icons8.com/fluency/50/null/undo.png" class="display" id="out"/>
        <div id="search">
            <img src="https://img.icons8.com/tiny-color/20/null/search.png"/>

            <hr>
                <form method="post" enctype="multipart/form-data" style="width: 100%" action="<?php echo $GLOBALS['DOCUMENT_DIR']?>pages/recipe_research.php">
                <input type="text" placeholder="Je recherche une(des) recette soit par son titre, soit par son ingrédient,ou son tag" name="search" id="res">
            </form>

            <hr>
            <img src="https://img.icons8.com/tiny-color/20/null/search.png"/>
        </div>

        <!--recupration de la session pour le mettre en mode administrateur-->
        <?php
        if($session):?>
            <a href="<?php echo $GLOBALS['DOCUMENT_DIR'] ?>pages/recipe_create.php">Create</a>
            <a href="logout.php" style="color: white"> Deconnexion </a>
            <img src="<?php echo $GLOBALS['DOCUMENT_DIR']?>images/user.png" height="50" width="50"/>
         <?php else :?>
        <a class="back" href="<?php echo $GLOBALS['DOCUMENT_DIR'] ?>pages/recipe_logger.php">
            <h2 style="color: white">Connexion</h2>
            <img src="../images/user.png" height="50" width="50" />
        </a>
        <?php endif;?>
    </div>

        <div id="hidden" class="display">
                <div class="elem">
                    <h2 >Categories</h2>
                    <a href="<?php echo $GLOBALS['DOCUMENT_DIR']?>index.php">Recipes</a>
                    <a href="<?php echo $GLOBALS['DOCUMENT_DIR']?>pages/ingredients_list.php">Ingredients</a>
                    <a href="<?php echo $GLOBALS['DOCUMENT_DIR']?>pages/tags_list.php">Tags</a>

                </div>
            <div class="elem">
                <h2>Ingredients</h2>
                <a href="<?php echo $GLOBALS['DOCUMENT_DIR']?>pages/ingredients_list.php">Legumes</a>
                <a href="<?php echo $GLOBALS['DOCUMENT_DIR']?>pages/ingredients_list.php">Viandes</a>
                <a href="<?php echo $GLOBALS['DOCUMENT_DIR']?>pages/ingredients_list.php">Sans sucre</a>
                <a href="<?php echo $GLOBALS['DOCUMENT_DIR']?>pages/ingredients_list.php">Sans sel</a>
                <a href="<?php echo $GLOBALS['DOCUMENT_DIR']?>pages/ingredients_list.php">Riz</a>
                <a href="<?php echo $GLOBALS['DOCUMENT_DIR']?>pages/ingredients_list.php">Oeuf</a>
                <a href="<?php echo $GLOBALS['DOCUMENT_DIR']?>pages/ingredients_list.php">Farines</a>
            </div>
            <div class="elem">
                <h2>Recettes Disponible</h2>
                <a href="<?php echo $GLOBALS['DOCUMENT_DIR']?>index.php">Recipes</a>

            </div>
            <div class="elem">
                <h2>Destroy All Recipes </h2>
                <?php if($session):?>
                <a href="<?php echo $GLOBALS['DOCUMENT_DIR']?>pages/destroy.php">A vous le chef
                </a>
                    <a href="<?php echo $GLOBALS['DOCUMENT_DIR']?>pages/create.php">Creation
                    </a>
                <?php endif;?>
            </div>
        </div>

</header>
