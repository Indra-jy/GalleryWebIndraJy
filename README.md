# 📸 Web Gallery Project

Welcome to my **Web Gallery** project! This is a simple web application designed to display a photo collection in an organized manner, with MySQL database support for storing image data and metadata.

## ✨ Key Features
- **Grid Gallery View:** A clean and responsive photo layout (works well on both mobile phones and laptops).
- **Data Management:** Uses MySQL to store image titles, descriptions, and paths.
- **Image Upload:** A feature to add new photos directly via the web.
- **Photo Categories:** Grouping photos based on specific themes.

## 🛠️ Technologies Used
- **Frontend:** HTML5, CSS3 (Flexbox/Grid), JavaScript.
- **Backend:** PHP.
- **Database:** MySQL.
- **Local Server:** XAMPP / Laragon.

## 📦 Installation & Setup
Since this project uses **MySQL**, follow these steps to try it on your computer:

1. **Database Setup:**
   - Open **phpMyAdmin**.
   - Create a new database named `db_gallery`.
   - Import the `galerifotoo.sql` file available in this repository.

2. **Configure the Connection:**
   - Open the connection file (e.g., `koneksi.php` or `config.php`).
   - Adjust the `username`, `password`, and `database_name` to match your MySQL settings.

3. **Run the Project:**
   - Place the project folder inside the `htdocs` folder (if using XAMPP).
   - Open a browser and access `localhost/web-gallery`.

---
*This project was created as part of learning Frontend integration with a Database 
