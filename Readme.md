```markdown
# PHP CRUD Application with MySQL (Dockerized)

A simple PHP CRUD (Create, Read, Update, Delete) application using MySQL, containerized with Docker Compose. This project is ideal for learning basic database operations, PHP, and Docker fundamentals.

---

## 📋 Table of Contents

- [Project Structure](#-structure)
- [Prerequisites](#-prerequisites)
- [Installation](#-installation)
- [Usage](#-usage)
- [Database Setup](#-database-setup)
- [Credentials](#-credentials)
- [Features](#-features)
- [Contributing](#-contributing)
- [License](#-license)

---

## 📁 Structure

```
project_root/
├── crud-operations/       # PHP code (index, DB connection, CRUD operations)
├── db/                   
│   └── docker-compose.yml # Docker Compose configuration
├── learn/                 # Experimental PHP code
└── task/                  # JSON-based task manager (no database)
```

---

## 🛠 Prerequisites

Before you begin, ensure you have the following installed:

- Docker
- Docker Compose
- Basic knowledge of PHP and MySQL

---

## 🚀 Installation

1. Clone the repository or download the files to your local machine.

2. Navigate to the `db` directory:

   ```bash
   cd db
   ```

3. Build and start the Docker containers:

   ```bash
   docker-compose up --build
   ```

   This will set up the PHP web server and MySQL database in isolated containers.

---

## 📖 Usage

1. Once the containers are running, access the application in your web browser at:

   ```
   http://localhost:8080
   ```

2. The application provides a simple interface to perform CRUD operations on a `users` table.

---

## 📊 Database Setup

The MySQL database is automatically set up when you start the containers, but you need to create the `users` table. You can do this by executing the following SQL in your MySQL client or by running a one-time script:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

You can access the MySQL container to run this command using:

```bash
docker exec -it <container_name> mysql -u mysqluser -pcrud_example
```

Replace `<container_name>` with the name of your MySQL container (check with `docker ps`).

---

## 🔑 Credentials

- **MySQL Root Password**: `1234`
- **MySQL User**: `mysqluser`
- **Password**: `mysqlpw123`
- **Database Name**: `crud_example`

---

## ✅ Features

- Create, Read, Update, and Delete (CRUD) operations for user records.
- JSON-based task manager in the `task` directory (does not require a database).
- Fully containerized with Docker for easy setup and portability.

---

## 🤝 Contributing

Contributions are welcome! Please fork this repository and submit pull requests for any improvements or bug fixes. For major changes, please open an issue first to discuss what you would like to change.

---

## 📜 License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---

## 📝 Notes

- Ensure Docker and Docker Compose are running on your machine before starting the application.
- If you encounter issues, check the Docker logs using `docker logs <container_name>`.

```