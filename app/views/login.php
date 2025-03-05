<!DOCTYPE html>
<html>
<head>
    <title>Login - Mini Tabungan</title>
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

        nav a {
            text-decoration: none;
            color: var(--dark-color);
            font-weight: 500;
            transition: color 0.3s ease;
            padding: 5px 10px;
            border-radius: 4px;
        }

        nav a:hover {
            color: var(--primary-color);
            background-color: rgba(255, 101, 28, 0.1);
        }

        /* Main Content Styles */
        main {
            max-width: 400px;
            margin: 30px auto;
            padding: 20px;
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        main h2 {
            color: var(--primary-color);
            border-bottom: 2px solid var(--accent-color);
            padding-bottom: 10px;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Form Styles */
        form div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: var(--dark-color);
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: 'Jost', sans-serif;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: 'Jost', sans-serif;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #e55a15;
        }

        main p {
            text-align: center;
            margin-top: 15px;
        }

        main p a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        main p a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media screen and (max-width: 480px) {
            main {
                width: 95%;
                margin: 20px auto;
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <nav>
        <h1>Mini Tabungan</h1>
        <a href="home.php">Home</a>
    </nav>
    
    <main>
        <h2>Login</h2>
        <form method="POST" action="login">
            <div>
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register</a></p>
    </main>
</body>
</html>