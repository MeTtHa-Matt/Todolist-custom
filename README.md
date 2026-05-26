# 📋 My Tasks - Gestionnaire de Tâches

Une application web de gestion de tâches type **To-Do List** avec un tableau Kanban, développée en **PHP vanilla**, **MySQL**, **JavaScript natif** et **Bootstrap 5**.

## Fonctionnalités

- ✅ **Création de tâches** — nom, commentaire, priorité (Basse / Normale / Urgente), date d'échéance
- 🎯 **Vue Kanban (Board)** — colonnes A FAIRE → EN COURS → TERMINÉE
- 📅 **Vue Calendrier** — visualisation par date
- 📋 **Vue Liste** — aperçu linéaire de toutes les tâches
- 📊 **Vue Statistiques** — suivi de productivité
- 🔍 **Filtres rapides** — Tous / Urgent / En retard / Terminé
- 🎨 **Curseur d'avancement** — slider coloré de 0 à 100 %
- ✏️ **Modification & Suppression** — via modale interactive
- 🏁 **Marquage terminé** — met automatiquement l'avancement à 100 %
- ⚡ **AJAX** — toutes les actions sans rechargement de page

## Stack technique

| Technologie | Rôle |
|---|---|
| **PHP 8+** | Backend, CRUD, rendu des pages |
| **MySQL** (PDO) | Base de données |
| **JavaScript ES6+** | Interactivité (Fetch API, modales) |
| **Bootstrap 5.3** | UI / Responsive |
| **Tabler Icons** | Iconographie |

## Prérequis

- PHP 8.0 ou supérieur
- MySQL 5.7+ ou MariaDB
- Serveur web (Apache, Nginx, ou PHP built-in)

## Installation

```bash
# 1. Cloner le dépôt
git clone https://github.com/votre-utilisateur/my-tasks.git

# 2. Placer les fichiers dans votre dossier web
#    Exemple avec Apache : /var/www/html/todolist/

# 3. Créer la base de données
mysql -u root -p -e "CREATE DATABASE todolist CHARACTER SET utf8mb4;"
```

### Structure de la table `todo`

```sql
CREATE TABLE todo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    commentaire TEXT,
    priorite VARCHAR(20) DEFAULT 'normal',
    cree_le DATETIME DEFAULT CURRENT_TIMESTAMP,
    due_date DATE DEFAULT NULL,
    en_cours TINYINT(1) DEFAULT 0,
    etat_d_avancement INT DEFAULT 0
);
```

### Configuration de la base de données

Éditez le fichier `includes/db.php` :

```php
$host = 'localhost';
$dbname = 'todolist';
$user = 'root';
$password = 'votre_mot_de_passe';
```

## Utilisation

1. Lancez votre serveur web
2. Accédez à `http://localhost/todolist/`
3. Créez vos premières tâches via le bouton **Nouvelle tâche**

### Développement avec live-reload (optionnel)

```bash
npm install -g browser-sync
browser-sync start --config bs-config.js
```

## Structure du projet

```
├── css/style.css              # Styles personnalisés
├── includes/
│   ├── db.php                 # Connexion MySQL (PDO)
│   ├── navbar.php             # Barre de navigation
│   ├── add-task.php           # Modale de création
│   ├── view-task.php          # Modale de détail / modification
│   ├── addtask.php            # Endpoint AJAX : ajout
│   ├── modify-task.php        # Endpoint AJAX : modification
│   ├── delete-task.php        # Endpoint AJAX : suppression
│   ├── finishtask.php         # Endpoint AJAX : marquer terminé
│   ├── updateposition.php     # Endpoint AJAX : avancement
│   ├── get-task.php           # Endpoint AJAX : récupérer une tâche
│   ├── getavancement.php      # Endpoint AJAX : récupérer l'avancement
│   ├── taskstodo.php          # Colonne "À FAIRE"
│   ├── tasksindoing.php       # Colonne "EN COURS"
│   ├── tasksdone.php          # Colonne "TERMINÉE"
│   ├── tasksurgent.php        # Filtre urgent
│   └── taskslate.php          # Filtre retard
├── js/
│   ├── add-task.js            # Fonctions CRUD
│   ├── getposition.js         # Curseur d'avancement
│   ├── modal.js               # Ouverture des modales
│   └── index.js               # Navigation active
├── php/
│   ├── todolist.php           # Vue Board (Kanban)
│   ├── list.php               # Vue Liste
│   ├── calendar.php           # Vue Calendrier
│   └── statistics.php         # Vue Statistiques
├── index.php                  # Page d'accueil
└── bs-config.js               # Configuration BrowserSync
```

## Roadmap

- [x] Vue Kanban (Board)
- [ ] Vue Liste (complète)
- [ ] Vue Calendrier (complète)
- [ ] Vue Statistiques (complète)
- [ ] Authentification utilisateur
- [ ] Glisser-déposer des cartes
- [ ] Tests automatisés
- [ ] Mode sombre
- [ ] Export PDF

## Contribution

Les contributions sont les bienvenues ! Ouvrez une *issue* ou soumettez une *pull request*.

## Licence

Ce projet est sous licence MIT.
