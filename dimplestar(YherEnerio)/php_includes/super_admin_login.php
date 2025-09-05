<?php
session_start();
// Check if already logged in
if(isset($_SESSION['super_admin_logged_in']) && $_SESSION['super_admin_logged_in'] === true) {
    header("Location: super_admin_dashboard.php");
    exit();
}

$error = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $con = mysqli_connect("localhost","root","","users_db");
    
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = $_POST['password'];
    
    if(empty($username) || empty($password)) {
        $error = "Please enter both username and password.";
    } else {
        $query = "SELECT * FROM super_admins WHERE username = '$username'";
        $result = mysqli_query($con, $query);
        
        if(mysqli_num_rows($result) == 1) {
            $admin = mysqli_fetch_assoc($result);
            
            // Verify password (using password_verify for hashed passwords)
            if(password_verify($password, $admin['password'])) {
                $_SESSION['super_admin_logged_in'] = true;
                $_SESSION['super_admin_id'] = $admin['id'];
                $_SESSION['super_admin_username'] = $admin['username'];
                $_SESSION['super_admin_name'] = $admin['full_name'];
                
                // Update last login
                $update_query = "UPDATE super_admins SET last_login = NOW() WHERE id = " . $admin['id'];
                mysqli_query($con, $update_query);
                
                header("Location: super_admin_dashboard.php");
                exit();
            } else {
                $error = "Invalid username or password.";
            }
        } else {
            $error = "Invalid username or password.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Login - Dimple Star Transport</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #e74c3c;
            --accent: #3498db;
            --dark: #2c3e50;
        }
        
        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            height: 100vh;
            display: flex;
            align-items: center;
        }
        
        .login-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 400px;
            max-width: 90%;
        }
        
        .login-header {
            background: var(--primary);
            color: white;
            padding: 20px;
            text-align: center;
        }
        
        .login-form {
            padding: 30px;
        }
        
        .form-control:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }
        
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        .btn-primary:hover {
            background-color: #1a252f;
            border-color: #1a252f;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="login-container">
            <div class="login-header">
                <h3><i class="fas fa-lock"></i> Super Admin Login</h3>
                <p class="mb-0">Dimple Star Transport</p>
            </div>
            <div class="login-form">
                <?php if(!empty($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-sign-in-alt"></i> Login</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>