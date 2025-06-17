# Documentation du projet - Location de voitures

---

## 📌 Page de garde

**Nom du projet** : Location de voitures  
**Nom de l’étudiant(e)** : [Ton Prénom et Nom]  
**Cours** : [Nom du cours]  
**Date** : [Date de remise]  
**Professeur** : [Nom du professeur]

---

## 📝 Description du projet

Ce projet consiste à développer une application web de gestion d'une agence de location de voitures en utilisant l'architecture MVC et le moteur de templates Twig.  
Le projet permet de gérer les entités suivantes :
- Voitures
- Clients
- Employés
- Locations

Les principales fonctionnalités sont :
- CRUD complet pour chaque entité
- Page d’accueil avec statistiques
- Gestion des erreurs et navigation dynamique

Le projet utilise XAMPP (Apache, MySQL) et PHP 8.1+.

---

## 🗃️ Modèle de relation d'entité

Voici le diagramme de relation d'entité (ERD) pour la base de données utilisée dans ce projet :

**Tables principales :**
- **cars** (id, brand, model, year, daily_price)
- **customers** (id, first_name, last_name, email, phone)
- **employees** (id, name, email, role)
- **rentals** (id, car_id, customer_id, employee_id, start_date, end_date, total_price)

Relations :
- `rentals.car_id` → `cars.id`
- `rentals.customer_id` → `customers.id`
- `rentals.employee_id` → `employees.id`

📌 Le diagramme complet est inclus en pièce jointe ou sous forme d'image dans le dossier `documentation/ERD.png`.

---

## 🌐 Liens utiles

🔗 **Lien WebDev** : [Lien vers ton déploiement WebDev ici]  
🔗 **Lien GitHub** : [Lien vers ton dépôt GitHub ici]

---

## 📑 Notes supplémentaires

Le projet est fonctionnel et respecte les consignes du cours :
- Utilisation de l’architecture MVC
- Utilisation de Twig pour le rendu des vues
- Validation des données et gestion des erreurs
- Documentation complète
- Base de données relationnelle conforme

---

