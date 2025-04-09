```markdown
# PHP CRUD with MySQL (Dockerized)

Simple PHP CRUD app using MySQL and Docker Compose. Useful for learning database operations and Docker basics.

---

## 📁 Structure

```
.
├── crud-operations       # PHP code (index, DB connection)
├── db
│   └── docker-compose.yml
├── learn                 # Experimental PHP code
└── task                  # JSON-based task manager
```

---

## 🚀 Usage

1. Start containers:

```bash
cd db
docker-compose up --build
```

2. Access the app:

```
http://localhost:8080
```

3. (Optional) Create the `users` table using a one-time script:

```php
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## 🔧 Credentials

- MySQL root password: `1234`
- MySQL user: `mysqluser`
- Password: `mysqlpw123`
- DB: `crud_example`

---

## ✅ Features

- Add / update / delete users
- JSON task manager (no DB)
- Runs entirely in Docker

---

```