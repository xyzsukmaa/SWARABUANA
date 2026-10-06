<?php
require_once 'includes/config.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama     = mysqli_real_escape_string($conn, $_POST['nama']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT id FROM users WHERE email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        $message = "Email sudah terdaftar!";
    } else {
        $query = "INSERT INTO users (nama, email, password, stok_siraman) VALUES ('$nama', '$email', '$password', 5)";
        if (mysqli_query($conn, $query)) {
            $user_id = mysqli_insert_id($conn);
            mysqli_query($conn, "INSERT INTO trees (user_id, progress) VALUES ($user_id, 0)");
            header("Location: login.php");
            exit();
        } else {
            $message = "Gagal mendaftar!";
        }
    }
}
?>
<?php include 'includes/header.php'; ?>
<div class="auth-box">
    <h2>Daftar Akun SWARABUANA</h2>
    <?php if ($message): ?><p class="error"><?= $message ?></p><?php endif; ?>
    <form method="POST">
        <input type="text" name="nama" placeholder="Nama Lengkap" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Daftar</button>
    </form>
    <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
</div>
<?php include 'includes/footer.php'; ?>