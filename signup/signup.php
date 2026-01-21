<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Form</title>
  <link rel="stylesheet" href="../src/style.css">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">    
  <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
    Sign Up
  </h2>

    <form action="signup_process.php" method="POST" class="space-y-4">
      <!-- Nama -->
      <div>
        <label for="name" class="block text-gray-700 font-medium mb-1">Full Name</label>
        <input type="text" id="name" name="name" placeholder="Your name"
               class="w-full px-4 py-2 border rounded-lg focus:outline-none 
               focus:ring-2 focus:ring-blue-400 focus:border-transparent" 
               autocomplete="off" required>
      </div>

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

      <!-- Konfirmasi Password -->
      <div>
        <label for="confirm-password" class="block text-gray-700 
        font-medium mb-1">
        Confirm Password
      </label>
        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm password"
               class="w-full px-4 py-2 border rounded-lg focus:outline-none 
               focus:ring-2 focus:ring-blue-400 focus:border-transparent" 
               autocomplete="off" required>
      </div>

      <!-- Submit Button -->
      <button type="submit"
              class="w-full bg-blue-500 text-white font-semibold 
              py-2 rounded-lg hover:bg-blue-600 transition-colors">
        Sign Up
      </button>
    </form>

    <p class="mt-4 text-center text-gray-600 text-sm">
      Already have an account? <a href="#" class="text-blue-500 
      hover:underline">Login</a>
    </p>
  </div>

</body>
</html>
