# 🚀 HMVC Starter Template (PHP + React + Tailwind + Docker)

Ce projet est une architecture de base **HMVC** qui combine un backend en **PHP** (sans framework) avec un frontend en **React + Vite + Tailwind**, le tout orchestré via **Docker**.

## 📦 Structure du projet

```
.
├── backend/        → Code PHP structuré en HMVC (Module Home, etc.)
├── frontend/       → App React avec Vite et TailwindCSS
├── docker/         → Dockerfiles (PHP, Node) et configuration NGINX
├── docker-compose.yaml
└── README.md
```

---

## ⚙️ Prérequis

* [Docker](https://www.docker.com/) & [Docker Compose](https://docs.docker.com/compose/)
* [Git](https://git-scm.com/) pour cloner le repo

---

## 🚀 Lancer le projet

```bash
# 1. Cloner le dépôt
git clone https://github.com/ton-utilisateur/ton-repo.git
cd ton-repo

# 2. Copier les fichiers d'environnement
cp frontend/.env.example frontend/.env

# 3. Démarrer les containers
docker compose up --build -d
```

* Le frontend sera accessible sur : [http://localhost:5173](http://localhost:5173)
* Le backend via NGINX sur : [http://localhost:8080](http://localhost:8080)

---

## 🔧 Configuration

Le fichier `.env` dans le dossier `frontend/` permet de configurer l’URL du backend :

```env
VITE_API_URL=http://localhost:8080
```

> 🔁 **Important** : Modifiez cette URL selon l’environnement si vous utilisez un reverse proxy ou un domaine externe.

---

## 📉 Nettoyage / rebuild (si besoin)

```bash
docker compose down -v
docker compose build --no-cache
docker compose up
```

---

## 🧙‍♂️ Auteur

Ce template a été conçu pour un usage rapide et modulaire, idéal pour démarrer tout nouveau projet fullstack PHP + React avec une bonne séparation des responsabilités.

---

## 📄 Licence

Distribué sous la licence [GNU GPL v3](LICENSE).
