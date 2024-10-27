<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background-color: #F3F4F6; /* Light gray background */
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-gray-900 text-white p-4 flex justify-between items-center sticky top-0 z-50">
        <div class="flex items-center space-x-4">
            <img src="./assets/ams-logo.svg" alt="CSUCC logo" class="w-12">
            <h1 class="text-2xl font-bold">AMSystem</h1>
            <span class="mx-4">|</span>
            <p>Create Account</p>
        </div>
    </header>

    <!-- Sign Up Form Section -->
    <div class="flex items-center justify-center flex-grow py-10">
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-xl w-full">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Create an Account</h2>

            <form id="signUpForm" class="space-y-4">
                <!-- ID Number -->
                <div>
                    <label for="id-number" class="block font-semibold text-gray-700 mb-1">ID Number</label>
                    <input type="text" id="id-number" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" placeholder="Enter your ID" required>
                </div>

                <!-- Name Fields -->
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <label for="first-name" class="block font-semibold text-gray-700 mb-1">First Name</label>
                        <input type="text" id="first-name" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" placeholder="First Name" required>
                    </div>
                    <div class="w-1/2">
                        <label for="last-name" class="block font-semibold text-gray-700 mb-1">Last Name</label>
                        <input type="text" id="last-name" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" placeholder="Last Name" required>
                    </div>
                </div>

                <div>
                    <label for="middle-initial" class="block font-semibold text-gray-700 mb-1">Middle Initial</label>
                    <input type="text" id="middle-initial" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" placeholder="M.I.">
                </div>

                <!-- School Email -->
                <div>
                    <label for="school-email" class="block font-semibold text-gray-700 mb-1">School Email</label>
                    <input type="email" id="school-email" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" placeholder="example@school.edu" required>
                </div>

                <!-- Address Fields (Compact with Flex) -->
                <div>
                    <label for="address" class="block font-semibold text-gray-700 mb-1">Address</label>
                    <div class="flex space-x-2">
                        <input type="text" id="purok" class="w-1/4 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" placeholder="Purok" required>
                        <input type="text" id="barangay" class="w-1/4 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" placeholder="Barangay" required>
                        <input type="text" id="zip-code" class="w-1/4 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" placeholder="Zip" required>
                        <input type="text" id="city" class="w-1/4 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" placeholder="City" required>
                    </div>
                </div>

                <!-- Department Dropdown -->
                <div>
                    <label for="department" class="block font-semibold text-gray-700 mb-1">Department</label>
                    <select id="department" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" required>
                        <option value="">Select Department</option>
                        <option value="CEIT">CEIT</option>
                        <option value="CTHM">CTHM</option>
                        <option value="CBA">CBA</option>
                    </select>
                </div>

                <!-- Program Dropdown (Dynamic) -->
                <div>
                    <label for="program" class="block font-semibold text-gray-700 mb-1">Program</label>
                    <select id="program" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" required>
                        <option value="">Select Program</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full py-3 bg-yellow-500 text-white font-semibold rounded-lg hover:bg-yellow-600 transition duration-200 ease-in-out focus:ring-2 focus:ring-yellow-400">Sign Up</button>
            </form>
        </div>
    </div>

    <!-- Script for Dynamic Program Dropdown -->
    <script>
        const department = document.getElementById('department');
        const program = document.getElementById('program');

        department.addEventListener('change', function () {
            program.innerHTML = '<option value="">Select Program</option>'; // Reset options

            if (this.value === 'CEIT') {
                program.innerHTML += '<option value="IT">IT</option>';
                program.innerHTML += '<option value="EE">EE</option>';
                program.innerHTML += '<option value="DCT">DCT</option>';
            } else if (this.value === 'CTHM') {
                program.innerHTML += '<option value="HRM">HRM</option>';
            } else if (this.value === 'CBA') {
                program.innerHTML += '<option value="CB">CB</option>';
            }
        });
    </script>
</body>

</html>
