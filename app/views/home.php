<!DOCTYPE html>
<html>
<head>
    <title>Home - Sistem Tabungan Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #FF651C;
            --dark-color: #373737;
            --light-background: #f4f4f4;
            --white: #ffffff;
            --accent-color: #9BD3D0;
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

        /* Navigation Styles */
        nav {
            background-color: var(--white);
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav h1 {
            font-size: 1.5rem;
            color: var(--primary-color);
            font-weight: 700;
        }

        nav div {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        nav div a {
            text-decoration: none;
            color: var(--dark-color);
            font-weight: 500;
            transition: color 0.3s ease;
            padding: 5px 10px;
            border-radius: 4px;
        }

        nav div a:hover {
            color: var(--primary-color);
            background-color: rgba(255, 101, 28, 0.1);
        }

        /* Main Content Styles */
        main {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
        }

        main h2 {
            color: var(--primary-color);
            border-bottom: 2px solid var(--accent-color);
            padding-bottom: 10px;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Total Savings Styles */
        .total-savings {
            background-color: var(--white);
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        .total-savings h3 {
            color: var(--primary-color);
            font-size: 1.5rem;
        }

        /* Saving Card Styles */
        .saving-card {
            background-color: var(--white);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .saving-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
        }

        .saving-card h3 {
            color: var(--primary-color);
            margin-bottom: 10px;
            border-bottom: 2px solid var(--accent-color);
            padding-bottom: 5px;
        }

        .saving-card p {
            margin-bottom: 10px;
        }

        .saving-card small {
            display: block;
            color: #666;
            text-align: right;
            font-style: italic;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            nav {
                flex-direction: column;
                text-align: center;
            }

            nav div {
                margin-top: 15px;
                flex-direction: column;
                gap: 10px;
            }

            main {
                padding: 10px;
            }

            .saving-card {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <nav>
        <h1>Sistem Tabungan Mahasiswa</h1>
        <?php if(isset($_SESSION['user_id'])): ?>
            <div>
                Selamat datang, <?php echo $_SESSION['user_name']; ?>
                <?php if($_SESSION['user_role'] === 'admin'): ?>
                    <a href="admin">Dashboard Admin</a>
                <?php endif; ?>
                <a href="saving.php">Tambah Tabungan</a>
                <a href="logout.php">Logout</a>
            </div>
        <?php else: ?>
            <div>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            </div>
        <?php endif; ?>
    </nav>

    <main>
        <h2>Riwayat Tabungan</h2>
        <div class="total-savings">
            <h3>Total Tabungan: Rp<?php echo number_format($totalSavings, 2); ?></h3>
        </div>
        <?php foreach($savings as $saving): ?>
            <div class="saving-card">
                <h3>Setoran</h3>
                <h3><?php echo htmlspecialchars($saving['name']); ?></h3>
                <p>Jumlah: Rp<?php echo number_format($saving['amount'], 2); ?></p>
                <p>Pesan: <?php echo htmlspecialchars($saving['message'] ?? '-'); ?></p>
                <small>Tanggal: <?php echo $saving['created_at']; ?></small>
            </div>
        <?php endforeach; ?>
    </main>
</body>
</html>