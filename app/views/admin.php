<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Sistem Tabungan Mahasiswa</title>
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
            max-width: 1200px;
            margin: 30px auto;
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 30px;
        }

        /* Table Styling */
        .admin-table {
            width: 100%;
            border-collapse: collapse;
        }

        .admin-table thead {
            background-color: var(--primary-color);
            color: var(--white);
        }

        .admin-table th, 
        .admin-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        .admin-table tbody tr:hover {
            background-color: rgba(255, 101, 28, 0.05);
        }

        .admin-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
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

            .admin-table {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="#" class="navbar-brand">Sistem Tabungan Mahasiswa</a>
        <ul class="navbar-nav">
            <li class="nav-item"><a href="home" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="logout" class="nav-link">Logout</a></li>
        </ul>
    </nav>

    <main class="container">
        <h2>Daftar Pengguna</h2>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Jumlah Tabungan</th>
                    <th>Pesan</th>
                    <th>Dibuat Pada</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo htmlspecialchars($user['name']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><?php echo $user['role']; ?></td>
                        <td><?php echo $user['created_at']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>All Savings</h2>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Amount</th>
                    <th>Message</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($allSavings as $saving): ?>
                    <tr>
                        <td><?php echo $saving['id']; ?></td>
                        <td><?php echo htmlspecialchars($saving['name']); ?></td>
                        <td>Rp<?php echo number_format($saving['amount'], 2); ?></td>
                        <td><?php echo htmlspecialchars($saving['message'] ?? '-'); ?></td>
                        <td><?php echo $saving['created_at']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>