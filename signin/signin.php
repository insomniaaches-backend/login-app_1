<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
  <link rel="stylesheet" href="../src/style.css">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">

    <h2 class="text-2xl font-bold 
    text-gray-800 mb-6 text-center">
      Sign In
    </h2>

    <!-- ERROR MESSAGE -->
    <?php if (isset($_SESSION['error'])): ?>
      <div class="mb-4 text-red-600 text-sm text-center">
        <?= htmlspecialchars($_SESSION['error']) ?>
      </div>
      <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <!-- SUCCESS MESSAGE -->
    <?php if (isset($_SESSION['success'])): ?>
      <div class="mb-4 text-green-600 text-sm text-center">
        <?= htmlspecialchars($_SESSION['success']) ?>
      </div>
      <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <form action="signin_process.php" method="POST" class="space-y-4">

      <!-- Email -->
      <div>
        <label for="email" class="block text-gray-700 font-medium mb-1">
          Email
        </label>
        <input type="email" id="email" name="email" placeholder="you@example.com"
               class="w-full px-4 py-2 border rounded-lg focus:outline-none
               focus:ring-2 focus:ring-blue-400 focus:border-transparent"
               autocomplete="off" required>
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-gray-700 font-medium mb-1">
          Password
        </label>
        <input type="password" id="password" name="password" placeholder="Enter password"
               class="w-full px-4 py-2 border rounded-lg focus:outline-none
               focus:ring-2 focus:ring-blue-400 focus:border-transparent"
               autocomplete="off" required>
      </div>

      <!-- Submit -->
      <button type="submit"
              class="w-full bg-blue-500 text-white font-semibold
              py-2 rounded-lg hover:bg-blue-600 transition-colors">
        Sign In
      </button>
    </form>

    <p class="mt-4 text-center text-gray-600 text-sm">
      Don’t have an account?
      <a href="../signup/signup.php" class="text-blue-500 hover:underline">
        Sign Up
      </a>
    </p>

  </div>

</body>
</html>
