### Description
---
Cette classe permet de centraliser toutes les fonctions nécessaires au fonctionnement du site lorsque cela concerne des informations de la base de données.

### Fonctions

| Fonction | Retour | Description |
| -------- | ------ | ----------- |
| `__construct()` | `void` | Constructeur de la classe |
| `getUserByMail(string $mail)` | [`User`](./user.md) \| `null` | Récupère un utilisateur grâce à son mail |
| `getCategories(int $user_id)` | `array` (de [`Category`](./category.md)) \| `null` | Récupère les catégories d'un utilisateur grâce à son identifiant |
| `saveCategory(`[`Category`](./category.md)` $category)` | `bool` \| `null` | Sauvegarde le nom et le montant d'une catégorie |
| `getTransactionsByUser(int $user_id)` | `array` (de [`Transaction`](./transaction.md)) \| `null` | Récupère les transactions d'un utilisateur grâce à son identifiant |
| `getTransactionsByCategory(int $category_id)` |  `array` (de [`Transaction`](./transaction.md)) \| `null` | Récupère les transactions d'une catégorie grâce à son identifiant |
| `getSchedulesByUser(int $user_id)` | `array` (de [`Schedule`](./schedule.md)) \| `null` | Récupère les actions mensuelles d'un utilisateur grâce à son identifiant |
| `getSchedulesByCategory(int $category_id)` | `array` (de [`Schedule`](./schedule.md)) \| `null` | Récupère les actions mensuelles d'une catégorie grâce à son identifiant |