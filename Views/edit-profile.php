<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement Management System</title>
    <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Quiljs -->
    <!-- Include stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
    <style>
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Header (Sticky) -->
    <header class="bg-gray-900 text-white p-4 flex justify-between items-center sticky top-0 z-50">
        <div class="flex items-center space-x-4">
            <!-- Logo and Title -->
            <img src="./assets/ams-logo.svg" alt="CSUCC logo" class="w-12">
            <h1 class="text-2xl font-bold">AMSystem</h1>
            <span class="mx-4">|</span>
            <p>Home</p>
        </div>
        <nav class="space-x-4">
            <a href="#" class="text-white font-bold">Dashboard</a>
            <span class="mx-4">|</span>
            <a href="home" class="text-gray-300 hover:text-white">Announcement</a>
        </nav>
        <div class="flex items-center space-x-4">
            <button class="bg-yellow-500 px-2 py-1 rounded">
                <i class="fa-solid fa-plus"></i>
            </button>
            <button class="text-gray-300"><i class="fa-solid fa-magnifying-glass"></i></button>
            <button class="text-gray-300"><i class="fa-solid fa-bell"></i></button>
            <img src="<?=$userData["photo"]?>" alt="Profile" class="w-10 h-10 rounded-full">
        </div>
    </header>

    <!-- Main Section -->
    <main class="flex">
        <!-- Sidebar (Sticky) -->
        <aside class="w-16 bg-gray-900 text-white flex flex-col items-center space-y-6 py-6 sticky top-14 h-screen">
            <a href="home" class="text-gray-500"><i class="fa-solid fa-house text-xl"></i></a>
            <a href="calendar" class="text-gray-500"><i class="fa-solid fa-calendar-days text-xl"></i></a>
            <a href="chat" class="text-gray-500"><i class="fa-solid fa-comments text-xl"></i></a>
            <a href="department" class="text-gray-500"><i class="fa-solid fa-building text-xl"></i></a>
            <a href="post/admin" class="text-gray-500"><i class="fa-solid fa-chart-line text-xl"></i></a>
            <a href="dashboard" class="text-white"><i class="fa-solid fa-user text-xl"></i></a>
        </aside>

        <!-- Main Content -->
        <section class="flex-1 p-8 flex space-x-8">
            <!-- Announcement Feed Section (Scrollable) -->
            <!-- h-[calc(100vh-10rem)] -->
            <div class="flex-1 overflow-y-auto h-100vh">
               
                <!-- Account Profile -->
                <div class="bg-white p-6 rounded-lg shadow mb-8">
                    <h2 class="text-xl font-bold mb-4">Edit Profile</h2>
                    <div class="flex items-center space-x-4 ">  
                        <img src="<?= $userData["photo"]?>" alt="Profile" class="w-20 h-20 rounded-full">
                        <div class="flex justify-between size-full">
                            <div>
                                <h3 class="font-bold" id="user-name"><?php echo $userData["first_name"] . " " . $userData["middle_initial"] . ". " . $userData["last_name"]; ?></h3>
                                <p class="text-gray-500"><span id="program"><?= $userData["program_name"]?></span> · <span id="month_name"><?=$userData["month_name"]?></span> <span id="time_only"><?=$userData["time_only"]?></span></p>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-5">

                    <form action="./edit-profile" method="POST" enctype="multipart/form-data" class="w-full max-w-lg mx-auto mt-8">
                        <!-- Form Section 1 -->
                        <div class="flex flex-col space-y-6">
                            <!-- Name Field -->
                             <div class="profile flex space-x-5">
                                <img src="<?= $userData["photo"]?>" alt="" class="w-20 h-20 rounded-full">
                                <div>
                                    <label for="profile" class="block text-sm font-medium text-gray-700">Change Profile</label>
                                    <input type="file" id="profile" name="profile">
                                </div>
                             </div>
                            <div class="flex justify-between gap-2">
                                <div class="flex-auto">
                                    <label for="firstname" class="block text-sm font-medium text-gray-700">First Name</label>
                                    <input type="text" id="firstname" name="firstname" placeholder="Enter your full name" value="<?=$userData["first_name"]?>"
                                        class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                                <div class="flex-auto">
                                    <label for="lastname" class="block text-sm font-medium text-gray-700">Last Name</label>
                                    <input type="text" id="lastname" name="lastname" placeholder="Enter your full name" value="<?=$userData["last_name"]?>"
                                        class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                            </div>

                            <!-- Email Field -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                                <input type="email" id="email" name="email" placeholder="Enter your email" value="<?=$userData["email"]?>"
                                    class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>

                            <!-- Phone Number Field -->
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                <input type="number" id="phone" name="phone" placeholder="Enter your phone number" value="<?=$userData["contact_number"]?>"
                                    class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>

                            <!-- Address Field -->
                            <!-- <label for="address" class="block text-sm font-medium text-gray-700">Address</label> -->
                            <div class="flex justify-between gap-2">
                                <div class="flex-auto">
                                    <label for="purok" class="block text-sm font-medium text-gray-700">Purok</label>
                                    <input type="text" id="purok" name="purok" placeholder="Enter your full name" value="<?=$userData["address_purok"]?>"
                                        class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                                <div class="flex-auto">
                                    <label for="brgy" class="block text-sm font-medium text-gray-700">Brgy</label>
                                    <input type="text" id="brgy" name="brgy" placeholder="Enter your full name" value="<?=$userData["address_barangay"]?>"
                                        class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                            </div>
                            <div class="flex justify-between gap-2">
                                <div class="flex-auto">
                                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                    <input type="text" id="city" name="city" placeholder="Enter your full name" value="<?=$userData["address_city"]?>"
                                        class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                                <div class="flex-auto">
                                    <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
                                    <input type="text" id="province" name="province" placeholder="Enter your full name" value="<?=$userData["address_province"]?>"
                                        class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex space-x-4 mt-8">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Save Changes
                            </button>
                            <button type="button" href="./edit-profile" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Cancel
                            </button>
                        </div>
                    </form>

                </div>


                
            </div>
        </section>
    </main>
</body>
</html>
