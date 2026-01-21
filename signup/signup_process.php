<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require '../inc/connection.php';

// ============================
// CEK METHOD
// ============================
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: signup.php');
    exit;
}

// ============================
// AMBIL INPUT
// ============================
$full_name = trim($_POST['name'] ?? '');
$email     = trim($_POST['email'] ?? '');
$password  = $_POST['password'] ?? '';
$confirm   = $_POST['confirm-password'] ?? '';

// ============================
// VALIDASI
// ============================
if ($full_name === '' || $email === '' || $password === '' || $confirm === '') {
    $_SESSION['error'] = 'All fields are required.';
    header('Location: signup.php');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = 'Invalid email format.';
    header('Location: signup.php');
    exit;
}

if ($password !== $confirm) {
    $_SESSION['error'] = 'Password mismatch.';
    header('Location: signup.php');
    exit;
}

// ============================
// CEK EMAIL
// ============================
$stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
$stmt->execute([$email]);

if ($stmt->fetch()) {
    $_SESSION['error'] = 'Email already registered.';
    header('Location: signup.php');
    exit;
}

// ============================
// INSERT
// ============================
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare(
    "INSERT INTO users (full_name, email, password_hash)
     VALUES (?, ?, ?)"
);

$stmt->execute([$full_name, $email, $password_hash]);

$_SESSION['success'] = 'Signup successful. Please login.';
header('Location: ../signin/signin.php');
exit;
