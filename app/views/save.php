<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tabungan - Sistem Tabungan Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #FF651C;
            --dark-color: #373737;
            --light-background: #f4f4f4;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Jost', sans-serif;
            background-color: var(--light-background);
            line-height: 1.6;
            color: var(--dark-color);
        }

        /* Navigation */
        .navbar {
            background-color: var(--white);
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            text-decoration: none;
        }

        .navbar-nav {
            display: flex;
            list-style: none;
        }

        .nav-item {
            margin-left: 20px;
        }

        .nav-link {
            text-decoration: none;
            color: var(--dark-color);
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary-color);
        }

        /* Main Container */
        .container {
            max-width: 400px;
            margin: 30px auto;
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 30px;
        }

        /* Form Styles */
        .saving-form h2 {
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: var(--dark-color);
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .btn {
            display: inline-block;
            width: 100%;
            padding: 10px;
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: var(--dark-color);
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .navbar {
                flex-direction: column;
                text-align: center;
            }

            .navbar-nav {
                margin-top: 15px;
                flex-direction: column;
                align-items: center;
            }

            .nav-item {
                margin: 10px 0;
            }

            .container {
                width: 95%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="#" class="navbar-brand">Sistem Tabungan Mahasiswa</a>
        <ul class="navbar-nav">
            <li class="nav-item"><a href="home.php" class="nav-link">Beranda</a></li>
        </ul>
    </nav>

    <div class="container">
        <form method="POST" action="save" class="saving-form">
            <h2>Tambah Tabungan</h2>
            
            <div class="form-group">
                <label>Jumlah Tabungan (Rp)</label>
                <input type="number" name="amount" required min="1" step="0.01">
            </div>
            <div class="form-group">
                <label>Pesan (Opsional)</label>
                <textarea name="message"></textarea>
            </div>
            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
</body>
</html>