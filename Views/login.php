
<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Announcement Management System</title>
    <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body {
            background-color: #f3f4f6;
        }
    </style>

</head>
<body class="bg-gray-100">

    <!-- Header (Sticky) -->
    <header class="bg-gray-900 text-white p-4 flex justify-between items-center sticky top-0 z-50">
        <div class="flex items-center space-x-4">
            <img src="./assets/ams-logo.svg" alt="CSUCC logo" class="w-12">
            <h1 class="text-2xl font-bold">AMSystem</h1>
            <span class="mx-4">|</span>
            <p>Login Account</p>
        </div>
    </header>

    <!-- Main Section (Login Form) -->
    <main class="min-h-screen flex items-center justify-center p-6">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login to your account</h2>


            <form method="POST" action="./login" class="space-y-6" id="loginForm" name="loginForm">
                <!-- Username / Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <div class="mt-1 relative">
                        <input type="email" id="email" name="email" required
                            class="w-full px-4 py-3 bg-gray-100 rounded-lg border border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 transition duration-150 ease-in-out">
                        <i class="fa-solid fa-envelope absolute top-1/2 right-4 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="mt-1 relative">
                        <input type="password" id="password" name="password" required
                            class="w-full px-4 py-3 bg-gray-100 rounded-lg border border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 transition duration-150 ease-in-out">
                        <i class="fa-solid fa-lock absolute top-1/2 right-4 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center text-sm text-gray-700">
                        <input type="checkbox" class="form-checkbox h-4 w-4 text-yellow-500">
                        <span class="ml-2">Remember me</span>
                    </label>
                    <a href="#" class="text-sm text-yellow-500 hover:text-yellow-600">Forgot Password?</a>
                </div>

                <!-- Submit Button -->
                <div>
                    <input type="submit" id="loginbtn"
                        class="w-full py-3 bg-yellow-500 text-white font-semibold rounded-lg shadow-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-opacity-75 transition duration-200 ease-in-out"
                        value="Log in">
                </div>
            </form>

            <!-- Divider -->
            <div class="mt-6 border-t border-gray-200"></div>

            <!-- Sign Up Link -->
            <p class="mt-6 text-sm text-center text-gray-600">
                Don't have an account?
                <a href="./register" class="text-yellow-500 font-medium hover:text-yellow-600">Sign up</a>
            </p>
        </div>
    </main>

</body>

</html>
