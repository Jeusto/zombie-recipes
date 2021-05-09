# Projet Prog Web 2: Site de recettes pour zombies

## Architecture du projet

J'ai essayé d'organiser les différentes parties et élements du site dans des dossiers bien distincts. Je ne vais pas expliquer tout les détails mais je vais présenter quelques choix d'implémentations.

### Les différentes pages

Il y a en tout 5 pages différentes sur le site.

- La page principale contient une liste des recettes et une barre de recherche pour trouver des recettes.
- Une page "a propos" qui sert à présenter le site.
- Une page "soumettre" où on peut remplir un formulaire et soumettre une recette.
- Une page "sauvegardes" pour retrouver les recettes qu'on a aimé et qu'on a sauvegardé.
- Une page "détails" qui s'ouvre quand on clique sur une recette pour en savoir plus.

### Feuilles de style & mode nuit

Dans un dossier style, il y a les différentes feuilles de styles. J'ai utilisé le langage scss et je me suis inspiré de certains frameworks pour l'organisation et la création de classes prédefinies que je réutilise avec "@extend". Pour le mode nuit je vérifie avec php le contenu d'un cookie et je charge la feuille de style qui correspond au mode nuit si nécessaire.

### Javascript et appel ajax

Dans le dossier javascript, chaque fichier correspond à une fonctionnalité différente comme la vérification du formulaire avant envoi, la gestion des cookies pour le mode nuit, la langue, les recettes sauvegardés etc. La recherche de recettes dans la page principale appelle une fonction javascript qui fait une rêquete ajax pour afficher les recettes correpondants à la recherche.

### Inclusions de composants

Pour certains éléments redondants tel que la navigation et le modal de paramètres, j'ai utilisé le "include" de php pour ne pas avoir à les modifier dans 5 fichiers différents. J'ai également utilisé le système d'inclusions pour d'autres composants comme par exemple pour afficher les recettes ou pour afficher qu'il n'y a pas de résultat de recherche. Ca rend le code beaucoup plus propre.

### Système de traduction

J'ai fais 3 fichiers php différents correspondants aux 3 langues. Ces 3 fichiers contiennent le même tableau de clés/valeurs correspondants aux textes qui vont être présents sur les pages mais avec les différentes traductions. Je vérifie avec php la langue dans le cookie, et je charge le fichier correspondant à la langue. Ensuite, dans les fichiers des pages, je fais à chaque fois référence à ce tableau.

### Base de données

Je stocke dans la même table de la base de données, les informations liées à la personne qui soumet une recette (nom, prenom), les informations liées à la recette (nom, type, description, détails, difficulté de réalisation, temps de préparation, ingrédiants et quantités), le nom de l'image qui correspond à la recette et enfin la date de publication. Je pourrais potentiellement séparer la base de données en deux tables mais j'ai décidé de faire un truc simple pour ce projet. La plupart des données dans la base de données sont sous forme de texte sauf l'identifiant qui est un entier non nul qui s'auto incrémente et le temps de préparation d'une recette qui est également un entier.
