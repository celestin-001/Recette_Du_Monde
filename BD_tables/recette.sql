DROP DATABASE IF EXISTS bdRecette;
CREATE DATABASE bdRecette;
use bdRecette;

-- Création de la table Recette
CREATE TABLE Recette (
  id INT NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  photo VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
)ENGINE=INOODB  DEFAULT CHARSET=latin1;

-- Création de la table Ingredient
CREATE TABLE Ingredient (
  id INT NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  quantity VARCHAR(255) NOT NULL,
  image VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
)ENGINE=INOODB  DEFAULT CHARSET=latin1;

-- Création de la table Tag
CREATE TABLE Tag (
  id INT NOT NULL AUTO_INCREMENT,
  htag VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
)ENGINE=INOODB  DEFAULT CHARSET=latin1;

-- Création de la table Ingredient_Recette
CREATE TABLE Ingredient_Recette (
  id INT NOT NULL AUTO_INCREMENT,
  ingredient_id INT NOT NULL,
  recette_id INT NOT NULL,
  PRIMARY KEY (id)
)ENGINE=INOODB  DEFAULT CHARSET=latin1;

-- Création de la table Tag_Recette
CREATE TABLE Tag_Recette (
  id INT NOT NULL AUTO_INCREMENT,
  tag_id INT NOT NULL,
  recette_id INT NOT NULL,
  PRIMARY KEY (id)
)ENGINE=INOODB  DEFAULT CHARSET=latin1;

-- ajout des cles etrangers avec contrainte ON DELETE CASCADE

-- suppression des contraintes existantes
ALTER TABLE Ingredient_Recette DROP FOREIGN KEY fk_recette_ingredient;
ALTER TABLE Ingredient_Recette DROP FOREIGN KEY fk_ingredient;
ALTER TABLE Tag_Recette DROP FOREIGN KEY fk_recette_tag;
ALTER TABLE Tag_Recette DROP FOREIGN KEY fk_tag;

-- ajout des contraintes avec ON DELETE CASCADE
-- suppression des contraintes existantes
ALTER TABLE Ingredient_Recette DROP FOREIGN KEY fk_recette_ingredient;
ALTER TABLE Ingredient_Recette DROP FOREIGN KEY fk_ingredient;
ALTER TABLE Tag_Recette DROP FOREIGN KEY fk_recette_tag;
ALTER TABLE Tag_Recette DROP FOREIGN KEY fk_tag;

-- ajout des contraintes avec ON DELETE CASCADE
ALTER TABLE Ingredient_Recette
  ADD CONSTRAINT fk_recette_ingredient FOREIGN KEY (recette_id) REFERENCES Recette(id) ON UPDATE CASCADE ON DELETE CASCADE,
  ADD CONSTRAINT fk_ingredient FOREIGN KEY (ingredient_id) REFERENCES Ingredient(id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE Tag_Recette
  ADD CONSTRAINT fk_recette_tag FOREIGN KEY (recette_id) REFERENCES Recette(id) ON UPDATE CASCADE ON DELETE CASCADE,
  ADD CONSTRAINT fk_tag FOREIGN KEY (tag_id) REFERENCES Tag(id) ON UPDATE CASCADE ON DELETE CASCADE;


-- ALTER TABLE Ingredient_Recette
--   ADD CONSTRAINT fk_recette_ingredient FOREIGN KEY (recette_id) REFERENCES Recette(id) ON UPDATE CASCADE ON DELETE CASCADE,
--   ADD CONSTRAINT fk_ingredient FOREIGN KEY (ingredient_id) REFERENCES Ingredient(id) ON UPDATE CASCADE ON DELETE CASCADE;

-- ALTER TABLE Tag_Recette
--   ADD CONSTRAINT fk_recette_tag FOREIGN KEY (recette_id) REFERENCES Recette(id) ON UPDATE CASCADE ON DELETE CASCADE,
--   ADD CONSTRAINT fk_tag FOREIGN KEY (tag_id) REFERENCES Tag(id) ON UPDATE CASCADE ON DELETE CASCADE;



-- INSERTIONS 

 /* PARTIE 1.4.1
  REPONSE : Extraire des fichiers csv*/

 LOAD DATA LOCAL INFILE 'E:/ETUDES_SECONDAIRES/CM_TP_L2_INFO/SGBDR/web/Recette.csv' 
 INTO TABLE Recette FIELDS TERMINATED BY "," OPTIONALLY ENCLOSED BY '"' IGNORE 1 LINES;

 LOAD DATA LOCAL INFILE 'E:/ETUDES_SECONDAIRES/CM_TP_L2_INFO/SGBDR/web/Ingredient.csv' 
 INTO TABLE Ingredient FIELDS TERMINATED BY "," OPTIONALLY ENCLOSED BY '"' IGNORE 1 LINES;

 LOAD DATA LOCAL INFILE 'E:/ETUDES_SECONDAIRES/CM_TP_L2_INFO/SGBDR/web/Tag.csv' 
 INTO TABLE Tag FIELDS TERMINATED BY "," OPTIONALLY ENCLOSED BY '"' IGNORE 1 LINES;

 LOAD DATA LOCAL INFILE 'E:/ETUDES_SECONDAIRES/CM_TP_L2_INFO/SGBDR/web/Ingredient_Recette.csv' 
 INTO TABLE Ingredient_Recette FIELDS TERMINATED BY "," OPTIONALLY ENCLOSED BY '"' IGNORE 1 LINES;

 LOAD DATA LOCAL INFILE 'E:/ETUDES_SECONDAIRES/CM_TP_L2_INFO/SGBDR/web/Tag_Recette.csv' 
 INTO TABLE Tag_Recette FIELDS TERMINATED BY "," OPTIONALLY ENCLOSED BY '"' IGNORE 1 LINES;

 -- Execution bd en console : 
 -- source E:/ETUDES_SECONDAIRES/CM_TP_L2_INFO/SGBDR/web/recette.sql;
