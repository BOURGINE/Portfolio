# Portfolio
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/884620ae94a6467fa883f758568a566c)](https://app.codacy.com/manual/borgine/Portfolio?utm_source=github.com&utm_medium=referral&utm_content=kirokou/Portfolio&utm_campaign=Badge_Grade_Dashboard)

<p align="center">
<img src = "public/front/images/kirokou.png"  width="150" height="150"  title = "" alt = "kirokou">
<img src = "public/front/images/symfony.png"  width="150" height="150" title = "" alt = "sf5">
</p>

# CONTEXT
Projet 5 de mon parcours Développeur d'application PHP/Symfony chez OpenClassrooms. Création d'un Porfolio via une architecture MVC Orienté objet.

## Project Summary
Le projet est de développer votre blog professionnel. Ce site web se décompose en deux grands groupes de pages :

les pages utiles à tous les visiteurs ;
les pages permettant d’administrer votre blog.
Voici la liste des pages qui devront être accessibles depuis votre site web :

- la page d'accueil ;
- la page listant l’ensemble des blog posts ;
- la page affichant un blog post ;
- la page permettant d’ajouter un blog post ;
- la page permettant de modifier un blog post ;
- les pages permettant de modifier/supprimer un blog post ;
- les pages de connexion/enregistrement des utilisateurs.


## Deliverables
- Un lien vers l’ensemble du projet (fichiers PHP/HTML/JS/CSS…) sur un repository GitHub
- Les instructions pour installer le projet (dans un fichier README à la racine du projet)
- Les schémas UML (au format PNG ou JPG dans un dossier nommé “diagrammes” à la racine du projet)
 diagrammes de cas d’utilisation
- diagramme de classes
- diagrammes de séquence
- Les issues sur le repository GitHub que vous aurez créé
- Un lien vers la dernière analyse SymfonyInsight ou Codacy (ou vers le projet public sur la plateforme)

# HOW INSTALL THIS PROJECT

## Required and technical environment

- Language => PHP 7.2.14
- Database => MySQL 5.7.25
- Web Server => Apache 2.2.34
- MVC, POO, Codacy, PSR 4
- Google Recaptcha => V3

## Step 1: database
- Create Model/Manager/config.php
- Define globals vars

        define("SERVER", "");
        define("BASE", "");
        define("USER", "");
        define("PASSWORD", "");

- Download portfolio.sql. This database Sql file is in the path 

        Portfolio/db/portfolio.sql


## Step 2: contact form

### Google recaptcha
- Create google rechaptcha account: https://www.google.com/recaptcha/intro/v3.html
- Add your site url and generate the keys
- Update public key at Portfolio/template/base.html.php
- Update secret key at Portfolio/Controller/Security.php

### Email destination
- Change Email destination in Portfolio/Controller/Security.php

## Step 3: Manage USER
- Registration: index.php?ent=user&tsk=register
- Change role user: by default, the user role is ROLE_USER. To become admin you must change user role at ROLE_ADMIN in the database.

## Step 4: htaccess
Warning ! The protection of directories must be carried out under Apache either via httpd.conf or either via .htaccess and .htpasswd files


## UML DIAGRAMS

