# Suivi des Dépenses

Ce projet Symfony permet de suivre les dépenses d'une personne avec des fonctionnalités pour ajouter, modifier, supprimer et lister les dépenses. Le projet utilise Symfony, Doctrine pour la gestion de la base de données, et Twig pour le rendu des vues.

## Prérequis

Avant de commencer, assurez-vous d'avoir les outils suivants installés sur votre machine :

- [PHP](https://www.php.net/downloads) (version 8.0 ou supérieure)
- [Composer](https://getcomposer.org/download/)
- [Symfony CLI](https://symfony.com/download)
- [MySQL ou MariaDB](https://www.mysql.com/downloads/) (ou tout autre système de gestion de base de données compatible avec Doctrine)

## Installation

Suivez les étapes ci-dessous pour installer et configurer le projet sur votre machine locale.

### 1. Clonez le repository

Clonez ce projet sur votre machine locale :

```bash
git clone https://github.com/votre-utilisateur/suivi-depenses.git
```

### 2. Installez les dépendances

Allez dans le répertoire du projet et installez les dépendances avec Composer :

```bash
cd suivi-depenses
composer install
```

### 3. Créez la base de données

Configurez votre base de données dans le fichier `.env` à la ligne suivante :

```
DATABASE_URL="mysql://username:password@127.0.0.1:3306/suivi_depenses"
```

Puis créez la base de données et les tables nécessaires avec la commande suivante :

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

### 4. Lancez le serveur Symfony

Lancez le serveur Symfony en local :

```bash
symfony serve
```

Cela démarrera un serveur local accessible via `http://127.0.0.1:8000`.

### 5. Accédez à l'application

Ouvrez votre navigateur et accédez à l'URL suivante :

```
http://127.0.0.1:8000
```

Vous pourrez alors voir la liste des dépenses, ajouter de nouvelles dépenses, les modifier ou les supprimer.

## Fonctionnalités

- **Ajouter une dépense** : Vous pouvez ajouter une dépense avec un titre, un montant, une date et une catégorie.
- **Modifier une dépense** : Vous pouvez modifier les informations d'une dépense existante.
- **Supprimer une dépense** : Vous pouvez supprimer une dépense.
- **Voir la liste des dépenses** : Vous pouvez voir toutes les dépenses enregistrées.
