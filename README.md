# YouWiki

Ce projet vise à créer un système de gestion de contenu efficace associé à un front office pour une expérience utilisateur exceptionnelle.

## Fonctionnalités clés

### Partie Back office:

1. **Gestion des Catégories (Admin):**
   - Créer, modifier et supprimer des catégories pour organiser le contenu.
   - Associer plusieurs wikis à une catégorie.

2. **Gestion des Tags (Admin):**
   - Créer, modifier et supprimer des tags pour faciliter la recherche et le regroupement du contenu.
   - Associer des tags aux wikis pour une navigation plus précise.

3. **Inscription des auteurs:**
   - Les auteurs peuvent s'inscrire en fournissant des informations de base.
   - Informations nécessaires: nom, adresse e-mail, mot de passe sécurisé.

4. **Gestion des Wikis (Auteurs et Admins):**
   - Les auteurs peuvent créer, modifier et supprimer leurs propres wikis.
   - Associer une seule catégorie et plusieurs tags à leurs wikis.
   - Les admins peuvent archiver les wikis inappropriés.

5. **Page d'accueil du Tableau de bord:**
   - Consultation des statistiques des entités via le tableau de bord.

### Partie Front Office:

1. **Login et Register:**
   - Création de compte et connexion.
   - Redirection vers le tableau de bord pour les admins, sinon vers la page d'accueil.

2. **Barre de recherche (AJAX):**
   - Recherche de wikis, catégories, tags sans actualisation de page.

3. **Affichage des derniers wikis:**
   - Page d'accueil ou section dédiée montrant les derniers wikis ajoutés.

4. **Affichage des Dernières catégories:**
   - Section distincte présentant les dernières catégories créées ou mises à jour.

5. **Redirection vers la page single des wikis:**
   - En cliquant sur un wiki, redirection vers une page unique avec détails complets.

## Technologies requises

- **Technologie Frontend:**
  - HTML5
  - CSS Framework
  - Javascript

- **Technologie Backend:**
  - PHP 8 avec architecture MVC

- **Database:**
  - PDO driver

## Comment exécuter le projet

1. Assurez-vous d'avoir les technologies nécessaires installées.
2. Clonez ce dépôt.
3. Configurez la base de données avec le fichier fourni.
4. Lancez l'application.

N'hésitez pas à contribuer ou à signaler des problèmes !
