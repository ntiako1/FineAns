# FineAns

FineAns c'est un projet de gestion d'argent. On peut y voir nos fond et les organiser pour les gérer plus facillement.

---

### API pour la base de données

Language: PHP

#### Importation
---

Pour importer l'API il faut ajouter dans son fichier PHP la ligne:
```php
include_once('PATH/TO/database_manager.php');
```
Le fichier `database_manager.php` se trouve dans `PHP/database`, donc adaptez le chemin par rapport à l'emplacement de votre fichier PHP.

Ensuite il faut initialiser l'API en faisant:
```php
$database_manager = new DatabaseManager();
```

#### Documentation
---
Classe [DatabaseManager](./documentation/database_manager.md)<br/>
Classe [User](./documentation/user.md)<br/>
Classe [Transaction](./documentation/transaction.md)<br/>
Classe [Category](./documentation/category.md)<br/>
Classe [Schedule](./documentation/schedule.md)