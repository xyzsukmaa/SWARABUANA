<?php
require_once 'includes/config.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['nama']    = $row['nama'];
            $_SESSION['role']    = $row['role'];
            header("Location: ecotracker.php");
            exit();
        }
    }
    $message = "Email atau password salah!";
}
?>
<?php include 'includes/header.php'; ?>
<div class="auth-box">
    <h2>Login SWARABUANA</h2>
    <?php if ($message): ?><p class="error"><?= $message ?></p><?php endif; ?>
    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
</div>
<?php include 'includes/footer.php'; ?>