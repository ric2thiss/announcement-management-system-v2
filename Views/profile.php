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
</head>
<body class="bg-gray-100">
    <!-- Header (Sticky) -->
    <header class="bg-gray-900 text-white p-4 flex justify-between items-center sticky top-0 z-50">
        <div class="flex items-center space-x-4">
            <!-- Logo and Title -->
            <img src="../assets/ams-logo.svg" alt="CSUCC logo" class="w-12">
            <h1 class="text-2xl font-bold">AMSystem</h1>
            <span class="mx-4">|</span>
            <p>Home</p>
        </div>
        <nav class="space-x-4">
            <a href="#" class="text-white font-bold">Dashboard</a>
            <span class="mx-4">|</span>
            <a href="#" class="text-gray-300 hover:text-white">Announcement</a>
        </nav>
        <div class="flex items-center space-x-4">
            <button class="bg-yellow-500 px-2 py-1 rounded">
                <i class="fa-solid fa-plus"></i>
            </button>
            <button class="text-gray-300"><i class="fa-solid fa-magnifying-glass"></i></button>
            <button class="text-gray-300"><i class="fa-solid fa-bell"></i></button>
            <img src="../assets/profile.jpg" alt="Profile" class="w-10 h-10 rounded-full">
        </div>
    </header>

    <!-- Main Section -->
    <main class="flex">
        <!-- Sidebar (Sticky) -->
        <aside class="w-16 bg-gray-900 text-white flex flex-col items-center space-y-6 py-6 sticky top-14 h-screen">
            <a href="../home" class="text-gray-500"><i class="fa-solid fa-house text-xl"></i></a>
            <a href="../calendar" class="text-gray-500"><i class="fa-solid fa-calendar-days text-xl"></i></a>
            <a href="../chat" class="text-gray-500"><i class="fa-solid fa-comments text-xl"></i></a>
            <a href="../department" class="text-gray-500"><i class="fa-solid fa-building text-xl"></i></a>
            <a href="./status" class="text-gray-500"><i class="fa-solid fa-chart-line text-xl"></i></a>
            <a href="../dashboard" class="text-white"><i class="fa-solid fa-user text-xl"></i></a>
        </aside>

        <!-- Main Content -->
        <section class="flex-1 p-8 flex space-x-8">
            <!-- Announcement Feed Section (Scrollable) -->
            <!-- h-[calc(100vh-10rem)] -->
            <div class="flex-1 overflow-y-auto h-100vh">
               
                <!-- Account Profile -->
                <div class="bg-white p-6 rounded-lg shadow mb-8">
                    <h2 class="text-xl font-bold mb-4">Profile</h2>
                    <div class="flex items-center space-x-4 ">  
                        <img src="../assets/profile.jpg" alt="Profile" class="w-20 h-20 rounded-full">
                        <div class="flex justify-between size-full">
                            <div>
                                <h3 class="font-bold" id="user-name"><?php echo $users["first_name"] . " " . $users["middle_initial"] . ". " . $users["last_name"]; ?></h3>
                                <p class="text-gray-500"><span id="program"><?= $users["program_name"]?></span> · Member since <span id="month_name"><?=$users["month_name"]?></span> <span id="time_only"><?=$users["time_only"]?></span></p>
                            </div>
                            <?php
                            if($users["user_id"] == $_SESSION["user_id"]){
                               ?>
                               <div>
                                    <a href="./edit-profile">Edit</a>
                                    <span class="mx-4"> | </span>
                                    <a href="./settings">Settings</a>
                                    <span class="mx-4"> | </span>
                                    <a href="./logout">Logout</a>
                                </div>
                               <?php
                            }else{
                                ?>
                                <div>
                                    <a href="../dashboard">Back to your profile</a>
                                </div>
                                <?php
                            }

                            ?>
                        </div>
                    </div>
                    <hr class="mt-5">
                    <div>
                        <p class="text-gray-500">Bio</p>
                        Hi, I'm <span class="underline underline-offset-4"><?=$users["first_name"] . " " . $users["middle_initial"] . ". " . $users["last_name"];?></span> and I am a <?=$users["program_name"]?>, <?=$users["role_name"]?>  under the Department of <?=$users["department_name"]?>
                    </div>
                </div>
                <!-- Dashboard feature -->
 
                <!-- Create Announcement -->
                <div class="bg-white p-6 rounded-lg shadow mb-8">
                    <h2 class="text-xl font-bold mb-4">Account Created Announcements</h2>
                
                
                </div>
            </div>
        </section>
    </main>
</body>
</html>
