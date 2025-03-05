<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Mini Tabungan</title>
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
            max-width: 1200px;
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

        /* Admin Table Styles */
        .admin-table {
            width: 100%;
            background-color: var(--white);
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }

        .admin-table thead {
            background-color: var(--primary-color);
            color: var(--white);
        }

        .admin-table th, .admin-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        .admin-table thead th {
            font-weight: 700;
        }

        .admin-table tbody tr:hover {
            background-color: rgba(155, 211, 208, 0.1);
            transition: background-color 0.3s ease;
        }

        .admin-table tbody tr:last-child td {
            border-bottom: none;
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

            .admin-table {
                font-size: 0.9rem;
            }

            .admin-table th, .admin-table td {
                padding: 8px 10px;
            }
        }
    </style>
</head>
<body>
    <nav>
        <h1>Mini Tabungan - Admin Dashboard</h1>
        <div>
            <a href="home.php">Home</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>
    
    <main>
        <h2>Users</h2>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created At</th>
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
                <?php foreach($savings as $saving): ?>
                    <tr>
                        <td><?php echo $saving['id']; ?></td>
                        <td><?php echo htmlspecialchars($saving['name']); ?></td>
                        <td>Rp<?php echo number_format($saving['amount']); ?></td>
                        <td><?php echo htmlspecialchars($saving['message']); ?></td>
                        <td><?php echo $saving['created_at']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>