<?php
// dashboard.php

session_start();

// ============================
// PROTEKSI HALAMAN
// ============================
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: signin/signin.php');
    exit;
}

// ============================
// DATA USER DARI SESSION
// ============================
$userName  = $_SESSION['user_name']  ?? 'User';
$userEmail = $_SESSION['user_email'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="src/style.css">
</head>

<body class="bg-gray-100 min-h-screen">

    <!-- HEADER -->
    <header class="bg-white shadow">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-gray-800">
                Dashboard
            </h1>

            <div class="flex items-center space-x-4">
                <span class="text-gray-700 text-sm">
                    👋 Hi, <strong><?= htmlspecialchars($userName) ?></strong>
                </span>

                <a href="logout.php"
                   class="text-sm text-red-500 hover:underline">
                    Logout
                </a>
            </div>
        </div>
    </header>

    <!-- CONTENT -->
    <main class="max-w-6xl mx-auto px-6 py-10">

        <div class="bg-white rounded-xl shadow p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-2">
                Welcome to your dashboard
            </h2>

            <p class="text-gray-600">
                You are logged in with email:
                <strong><?= htmlspecialchars($userEmail) ?></strong>
            </p>

            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-blue-50 p-4 rounded-lg">
                    <h3 class="font-semibold text-blue-700">
                        🔐 Account Status
                    </h3>
                    <p class="text-sm text-blue-600 mt-1">
                        Active
                    </p>
                </div>

                <div class="bg-green-50 p-4 rounded-lg">
                    <h3 class="font-semibold text-green-700">
                        📧 Email
                    </h3>
                    <p class="text-sm text-green-600 mt-1">
                        <?= htmlspecialchars($userEmail) ?>
                    </p>
                </div>

                <div class="bg-purple-50 p-4 rounded-lg">
                    <h3 class="font-semibold text-purple-700">
                        🆔 User ID
                    </h3>
                    <p class="text-sm text-purple-600 mt-1">
                        <?= (int) ($_SESSION['user_id'] ?? 0) ?>
                    </p>
                </div>

            </div>
        </div>

    </main>

</body>
</html>
