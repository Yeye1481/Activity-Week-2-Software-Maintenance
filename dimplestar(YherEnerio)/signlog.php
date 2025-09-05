<?php
session_start();
$con = mysqli_connect("localhost","root","","users_db");
	
$errors = array();
$login_errors = array();

// Handle logout
if(isset($_GET['logout'])) {
    session_destroy();
    header("Location: signlog.php");
    exit();
}

// Handle login
if(isset($_POST['login_submit'])) {
    $login_email = mysqli_real_escape_string($con, $_POST['login_email']);
    $login_password = $_POST['login_password'];
    
    if(empty($login_email)) {
        $login_errors['email'] = "Email is required.";
    }
    if(empty($login_password)) {
        $login_errors['password'] = "Password is required.";
    }
    
    if(count($login_errors) === 0) {
        $search_query = mysqli_query($con, "SELECT * FROM members WHERE email = '$login_email'");
        $num_row = mysqli_num_rows($search_query);
        
        if($num_row == 1) {
            $user = mysqli_fetch_assoc($search_query);
            $hashed_password = hash('sha256', $user['salt'] . hash('sha256', $login_password));
            
            if($hashed_password === $user['password']) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['fname'] . ' ' . $user['lname'];
                header("Location: index.php");
                exit();
            } else {
                $login_errors['login'] = "Invalid email or password.";
            }
        } else {
            $login_errors['login'] = "Invalid email or password.";
        }
    }
}

// Handle signup
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup_submit'])){
    if(preg_match("/\S+/", $_POST['fname']) === 0){
        $errors['fname'] = "* First Name is required.";
    }
    if(preg_match("/\S+/", $_POST['lname']) === 0){
        $errors['lname'] = "* Last Name is required.";
    }
    if(preg_match("/.+@.+\..+/", $_POST['email']) === 0){
        $errors['email'] = "* Not a valid e-mail address.";
    }
    if(preg_match("/.{8,}/", $_POST['password']) === 0){
        $errors['password'] = "* Password Must Contain at least 8 Characters.";
    }
    if(strcmp($_POST['password'], $_POST['confirm_password'])){
        $errors['confirm_password'] = "* Passwords do not match.";
    }
    
    if(count($errors) === 0){
        $fname = mysqli_real_escape_string($con, $_POST['fname']);
        $lname = mysqli_real_escape_string($con, $_POST['lname']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        
        $password = hash('sha256', $_POST['password']);
        function createSalt(){
            $string = md5(uniqid(rand(), true));
            return substr($string, 0, 3);
        }
        $salt = createSalt();
        $password = hash('sha256', $salt . $password);
        
        $search_query = mysqli_query($con, "SELECT * FROM members WHERE email = '$email'");
        $num_row = mysqli_num_rows($search_query);
        if($num_row >= 1){
            $errors['email'] = "Email address is unavailable.";
        }else{
            $sql = "INSERT INTO members(`fname`, `lname`, `email`, `salt`, `password`) VALUES ('$fname', '$lname', '$email', '$salt', '$password')";
            $query = mysqli_query($con, $sql);
            $_POST['fname'] = '';
            $_POST['lname'] = '';
            $_POST['email'] = '';
            
            $successful = "You are successfully registered. You can now login.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dimple Star Transport - Login & Signup</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="images/icon.ico" type="image/x-icon">
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #e74c3c;
            --accent: #3498db;
            --light: #ecf0f1;
            --dark: #2c3e50;
            --success: #2ecc71;
            --error: #e74c3c;
            --border-radius: 8px;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            color: var(--dark);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        #wrapper {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            box-shadow: var(--box-shadow);
            flex: 1;
        }
        
        #header {
            background: var(--primary);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .logo {
            height: 60px;
        }
        
        #mainnav {
            display: flex;
            list-style: none;
            flex-wrap: wrap;
            align-items: center;
        }
        
        #mainnav li {
            margin: 0 0.5rem;
        }
        
        #mainnav a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            transition: var(--transition);
        }
        
        #mainnav a:hover {
            background: rgba(255, 255, 255, 0.1);
        }
        
        .user-info {
            display: flex;
            align-items: center;
            color: white;
            margin-left: 1rem;
        }
        
        .logout-btn {
            background: var(--secondary);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            margin-left: 1rem;
            transition: var(--transition);
        }
        
        .logout-btn:hover {
            background: #c0392b;
        }
        
        #content {
            padding: 2rem;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><rect fill="%23f8f9fa" width="100" height="100"/><path fill="%23e9ecef" d="M0 0L100 100"/></svg>');
            background-size: 20px 20px;
        }
        
        .auth-container {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            margin-top: 1rem;
        }
        
        .auth-box {
            flex: 1;
            min-width: 300px;
            background: white;
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
            border-top: 4px solid var(--accent);
        }
        
        .auth-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        
        .auth-title {
            color: var(--primary);
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--accent);
            display: inline-block;
        }
        
        .welcome-message {
            text-align: center;
            padding: 2rem;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 2rem;
        }
        
        .welcome-message h2 {
            color: var(--primary);
            margin-bottom: 1rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
        }
        
        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: var(--transition);
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }
        
        .input-icon {
            position: relative;
        }
        
        .input-icon i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #777;
        }
        
        .input-icon .form-control {
            padding-left: 40px;
        }
        
        .btn {
            display: inline-block;
            background: var(--accent);
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: var(--transition);
            text-align: center;
        }
        
        .btn-block {
            display: block;
            width: 100%;
        }
        
        .btn:hover {
            background: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        .alert {
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border-radius: var(--border-radius);
            font-weight: 500;
        }
        
        .alert-success {
            background-color: rgba(46, 204, 113, 0.2);
            color: #27ae60;
            border-left: 4px solid var(--success);
        }
        
        .alert-error {
            background-color: rgba(231, 76, 60, 0.2);
            color: #c0392b;
            border-left: 4px solid var(--error);
        }
        
        .text-error {
            color: var(--error);
            font-size: 0.85rem;
            margin-top: 0.25rem;
            display: block;
        }
        
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 1.5rem 0;
            color: #777;
        }
        
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #ddd;
        }
        
        .divider::before {
            margin-right: 0.5rem;
        }
        
        .divider::after {
            margin-left: 0.5rem;
        }
        
        #footer {
            background: var(--dark);
            color: white;
            text-align: center;
            padding: 2rem;
            margin-top: 2rem;
        }
        
        #footer img {
            height: 50px;
            margin-bottom: 1rem;
        }
        
        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #777;
        }
        
        @media (max-width: 768px) {
            #header {
                flex-direction: column;
                text-align: center;
            }
            
            #mainnav {
                margin-top: 1rem;
                justify-content: center;
            }
            
            .user-info {
                margin-top: 1rem;
                justify-content: center;
            }
            
            .auth-container {
                flex-direction: column;
            }
            
            .auth-box {
                min-width: 100%;
            }
        }
    </style>
</head>
<body>
<div id="wrapper">
	<div id="header">
        <h1><a href="index.php"><img src="images/logo.png" class="logo" alt="Dimple Star Transport" /></a></h1>
        <ul id="mainnav">
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">About Us</a></li>
            <li><a href="terminal.php">Terminals</a></li>
			<li><a href="routeschedule.php">Routes / Schedules</a></li>
            <li><a href="contact.php">Contact</a></li>
			<li><a href="book.php">Book Now</a></li>
            <?php if(isset($_SESSION['user_id'])): ?>
                <div class="user-info">
                    <span>Welcome, <?php echo $_SESSION['user_name']; ?>!</span>
                    <a href="?logout=true" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            <?php endif; ?>
    	</ul>
	</div>
    
    <div id="content">
        <?php if(isset($_SESSION['user_id'])): ?>
            <div class="welcome-message">
                <h2><i class="fas fa-check-circle"></i> You are already logged in</h2>
                <p>Welcome back, <?php echo $_SESSION['user_name']; ?>! You can now access all features of our website.</p>
                <p>Would you like to <a href="index.php">go to the homepage</a> or <a href="?logout=true">logout</a>?</p>
            </div>
        <?php else: ?>
            <div class="auth-container">
                <!-- Login Form -->
                <div class="auth-box">
                    <h2 class="auth-title"><i class="fas fa-sign-in-alt"></i> Login to Your Account</h2>
                    <?php if(isset($_GET['message'])): ?>
                        <div class="alert alert-success"><?php echo $_GET['message']; ?></div>
                    <?php endif; ?>
                    
                    <?php if(isset($login_errors['login'])): ?>
                        <div class="alert alert-error"><?php echo $login_errors['login']; ?></div>
                    <?php endif; ?>
                    
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="login_email">Email Address</label>
                            <div class="input-icon">
                                <i class="fas fa-envelope"></i>
                                <input type="text" name="login_email" id="login_email" class="form-control" placeholder="Enter your email" value="<?php if(isset($_POST['login_email'])) echo $_POST['login_email']; ?>">
                            </div>
                            <?php if(isset($login_errors['email'])): ?>
                                <span class="text-error"><i class="fas fa-exclamation-circle"></i> <?php echo $login_errors['email']; ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="login_password">Password</label>
                            <div class="input-icon">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="login_password" id="login_password" class="form-control" placeholder="Enter your password">
                                <span class="password-toggle" onclick="togglePassword('login_password')">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            <?php if(isset($login_errors['password'])): ?>
                                <span class="text-error"><i class="fas fa-exclamation-circle"></i> <?php echo $login_errors['password']; ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <button type="submit" name="login_submit" id="login" class="btn btn-block">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </button>
                    </form>
                </div>
                
                <!-- Signup Form -->
                <div class="auth-box">
                    <h2 class="auth-title"><i class="fas fa-user-plus"></i> Create New Account</h2>
                    <?php if(isset($successful)): ?>
                        <div class="alert alert-success"><?php echo $successful; ?></div>
                    <?php endif; ?>
                    
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter your first name" value="<?php if(isset($_POST['fname'])){echo $_POST['fname'];} ?>">
                            <?php if(isset($errors['fname'])): ?>
                                <span class="text-error"><i class="fas fa-exclamation-circle"></i> <?php echo $errors['fname']; ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter your last name" value="<?php if(isset($_POST['lname'])){echo $_POST['lname'];} ?>">
                            <?php if(isset($errors['lname'])): ?>
                                <span class="text-error"><i class="fas fa-exclamation-circle"></i> <?php echo $errors['lname']; ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <div class="input-icon">
                                <i class="fas fa-envelope"></i>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
                            </div>
                            <?php if(isset($errors['email'])): ?>
                                <span class="text-error"><i class="fas fa-exclamation-circle"></i> <?php echo $errors['email']; ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="pw">Password</label>
                            <div class="input-icon">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" id="pw" class="form-control" placeholder="Create a password (min. 8 characters)">
                                <span class="password-toggle" onclick="togglePassword('pw')">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            <?php if(isset($errors['password'])): ?>
                                <span class="text-error"><i class="fas fa-exclamation-circle"></i> <?php echo $errors['password']; ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="cpw">Confirm Password</label>
                            <div class="input-icon">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="confirm_password" id="cpw" class="form-control" placeholder="Confirm your password">
                                <span class="password-toggle" onclick="togglePassword('cpw')">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            <?php if(isset($errors['confirm_password'])): ?>
                                <span class="text-error"><i class="fas fa-exclamation-circle"></i> <?php echo $errors['confirm_password']; ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <button type="submit" name="signup_submit" id="submit" class="btn btn-block">
                            <i class="fas fa-user-plus"></i> Create Account
                        </button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
   
    <div id="footer">
        <a href="index.php"><img src="images/footer-logo.jpg" alt="Dimple Star Transport" /></a>
        <p>&copy; <?php echo date('Y'); ?> Dimple Star Transport<br /></p>
    </div>
</div>

<script>
    // Toggle password visibility
    function togglePassword(inputId) {
        const passwordInput = document.getElementById(inputId);
        const toggleIcon = passwordInput.nextElementSibling.querySelector('i');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }
    
    // Simple client-side validation enhancement
    document.addEventListener('DOMContentLoaded', function() {
        const forms = document.querySelectorAll('form');
        
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                let valid = true;
                const inputs = this.querySelectorAll('input[required]');
                
                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        valid = false;
                        input.style.borderColor = '#e74c3c';
                    }
                });
                
                if (!valid) {
                    e.preventDefault();
                    alert('Please fill in all required fields.');
                }
            });
        });
        
        // Clear error styles when user starts typing
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                this.style.borderColor = '#ddd';
            });
        });
    });
</script>
</body>
</html>