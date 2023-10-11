# Site Web de Recettes de Cuisine

Ce projet consiste en la création d'un site web dynamique permettant aux utilisateurs de publier et de consulter des recettes de cuisine. Les recettes sont composées d'un nom, d'une liste d'ingrédients, d'une photo et d'une description textuelle. Elles peuvent également être associées à des tags pour faciliter la recherche.

## Arborescence du Projet

L'arborescence de votre projet est la suivante :
- `BD_tables` : Répertoire contenant les fichiers de gestion de la base de données.
- `class` : Répertoire contenant les classes PHP de votre application.
- `css` : Répertoire contenant les fichiers de style CSS pour la présentation du site.
- `images` : Répertoire pour les images utilisées dans le site.
- `ingredients_pictures` : Répertoire pour les images d'ingrédients.
- `js` : Répertoire contenant les fichiers JavaScript.
- `pages` : Répertoire pour les pages du site.
- `recipes_pictures` : Répertoire pour les images de recettes.
- `DB_config.php` : Fichier de configuration de la base de données.
- `config.php` : Fichier de configuration général de l'application.
- `index.php` : Page d'accueil du site.

## Fonctionnalités Principales

Les principales fonctionnalités de l'application sont les suivantes :

1. **Gestion des Recettes** : Les utilisateurs peuvent créer, éditer et consulter des recettes. Chaque recette comporte un nom, une liste d'ingrédients, une image et une description textuelle.

2. **Gestion des Ingrédients** : Chaque ingrédient est associé à un nom et à une image. Les ingrédients peuvent être utilisés dans plusieurs recettes.

3. **Tags pour les Recettes** : Les recettes peuvent être taguées pour faciliter la recherche. Par exemple, les tags peuvent être dessert, au four, hivers, etc.

4. **Recherche de Recettes** : Les utilisateurs peuvent effectuer des recherches de recettes en fonction du nom, des ingrédients ou des tags. Par exemple, il est possible de rechercher toutes les recettes qui peuvent être réalisées avec les ingrédients disponibles.

5. **Mode Administrateur** : Un mode administrateur permet de gérer l'ensemble des entités, y compris la gestion de la base de données associée à l'application.

## Technologies Utilisées

- **Langages** : PHP, HTML, CSS, JavaScript.
- **Base de Données** : MySQL.

## Configuration de la Base de Données

Assurez-vous de configurer votre base de données en utilisant le fichier `DB_config.php` et de créer les tables nécessaires pour stocker les recettes, les ingrédients, les tags, etc.

## Comment Exécuter le Projet

1. Assurez-vous d'avoir correctement configuré votre serveur web pour exécuter le projet PHP.

2. Placez les fichiers et répertoires dans le répertoire racine de votre serveur web.

3. Importez la structure de la base de données à l'aide des fichiers SQL fournis, ou configurez la base de données manuellement.

4. Lancez l'application en accédant à la page d'accueil via le fichier `index.php`.

