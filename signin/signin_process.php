<?php
// signin_process.php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require '../inc/connection.php';

// ============================
// CEK METHOD
// ============================
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: signin.php');
    exit;
}

// ============================
// AMBIL INPUT
// ============================
$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

// ============================
// VALIDASI DASAR
// ============================
if ($email === '' || $password === '') {
    $_SESSION['error'] = 'Email and password are required.';
    header('Location: signin.php');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = 'Invalid email format.';
    header('Location: signin.php');
    exit;
}

// ============================
// CARI USER BERDASARKAN EMAIL
// ============================
$stmt = $pdo->prepare("
    SELECT id, full_name, email, password_hash, is_active
    FROM users
    WHERE email = :email
    LIMIT 1
");
$stmt->execute(['email' => $email]);

$user = $stmt->fetch();

if (!$user) {
    $_SESSION['error'] = 'Email or password is incorrect.';
    header('Location: signin.php');
    exit;
}

// ============================
// CEK STATUS AKUN
// ============================
if ((int)$user['is_active'] !== 1) {
    $_SESSION['error'] = 'Your account is inactive.';
    header('Location: signin.php');
    exit;
}

// ============================
// VERIFIKASI PASSWORD
// ============================
if (!password_verify($password, $user['password_hash'])) {
    $_SESSION['error'] = 'Email or password is incorrect.';
    header('Location: signin.php');
    exit;
}

// ============================
// LOGIN BERHASIL → SET SESSION
// ============================
$_SESSION['user_id']    = $user['id'];
$_SESSION['user_name']  = $user['full_name'];
$_SESSION['user_email'] = $user['email'];
$_SESSION['logged_in']  = true;

// ============================
// REDIRECT KE BERANDA
// ============================
header('Location: ../dashboard.php');
exit;
