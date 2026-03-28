<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Galeri</title>
    <link rel="icon" href="image/favicon/favicon-16x16.png" type="image/png">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.admin-container {
    width: 80%;
    margin: 20px auto;
    background: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #333;
}

.admin-nav ul {
    list-style: none;
    padding: 0;
    display: flex;
    justify-content: center;
    background: #333;
    margin: 0;
}

.admin-nav ul li {
    margin: 0 15px;
}

.admin-nav ul li a {
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
    display: block;
}

.admin-nav ul li a:hover {
    background: #555;
}

.content-section {
    margin-top: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

button {
    padding: 10px 20px;
    background-color: #333;
    color: #fff;
    border: none;
    cursor: pointer;
}

button:hover {
    background-color: #555;
}
    </style>
</head>
<body>
    <div class="admin-container">
        <h1>Admin Galeri</h1>
        
        <!-- Navigasi -->
        <nav class="admin-nav">
            <ul>
                <li><a href="datauser.php">Data User</a></li>
                <li><a href="../admin/adminfoto.php">Kelola Foto</a></li>
                <li><a href="#album-management">Kelola Album</a></li>
            </ul>
        </nav>

        <!-- Data User -->
</body>
</html>