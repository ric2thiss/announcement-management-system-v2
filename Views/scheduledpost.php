<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement Management System</title>
    <script src="calendar.js"></script>
    <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        a:hover{
            text-decoration: underline;
        }
    </style>
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
            <a href="#" class="text-gray-300 hover:text-white">Dashboard</a>
            <span class="mx-4">|</span>
            <a href="#" class="text-white font-bold">Announcement</a>
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
            <a href="../home" class="text-white"><i class="fa-solid fa-house text-xl"></i></a>
            <a href="../calendar" class="text-gray-500"><i class="fa-solid fa-calendar-days text-xl"></i></a>
            <a href="#" class="text-gray-500"><i class="fa-solid fa-comments text-xl"></i></a>
            <a href="#" class="text-gray-500"><i class="fa-solid fa-building text-xl"></i></a>
            <a href="#" class="text-gray-500"><i class="fa-solid fa-chart-line text-xl"></i></a>
            <a href="../dashboard" class="text-gray-500"><i class="fa-solid fa-user text-xl"></i></a>
        </aside>

        <!-- Main Content -->
        <section class="flex-1 p-8 flex space-x-8">
            <!-- Announcement Feed Section (Scrollable) -->
            <!-- h-[calc(100vh-10rem)] -->
            <div class="flex-1 overflow-y-auto h-100vh"> 
                <!-- Example of Announcement Post -->
                <div class="bg-white mx-auto w-1/2 p-6 rounded-lg shadow mb-6">
                    <div class="flex items-center space-x-4">
                        <img src="../<?=$scheduled_posts["photo"]?>" alt="Profile" class="w-10 h-10 rounded-full">
                        <div>
                            <h3 class="font-bold"><a href="../user/<?=$scheduled_posts["user_id"]?>"><?=$scheduled_posts["first_name"]?> <?=$scheduled_posts["last_name"]?></a></h3>
                            <p class="text-gray-500"><?=$scheduled_posts["role_name"]?> · Will be post on <?=$scheduled_posts["month_name"]?> <?=$scheduled_posts["date_only"]?>, <?=$scheduled_posts["time_only"]?></p>
                        </div>
                    </div>
                    <h4 class="font-bold text-lg mt-4"><?=$scheduled_posts["post_title"]?> 🎉</h4>
                    <div class="text-gray-700 mt-2"><?=$scheduled_posts["post_content"]?></div>
                    <div class="my-5 p-2"><img src="../<?=$scheduled_posts["images"]?>" onclick="viewImage('<?= '../'.$scheduled_posts['images'] ?>')" alt=""></div>
                    <div class="flex items-center space-x-4 mt-4">
                        <button class="text-blue-500"><i class="fa-solid fa-thumbs-up"></i> React</button>
                        <button class="text-blue-500"><i class="fa-solid fa-comment"></i> Comment</button>
                        <button class="text-blue-500"><i class="fa-solid fa-share"></i> Share</button>
                        <button class="text-blue-500"><i class="fa-solid fa-eye"></i> View Full Post</button>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <style>
        ::backdrop {
        backdrop-filter: blur(5px);
        /* opacity: 0.75; */
        }
    </style>
    <dialog class="p-2">
        <button autofocus class="border-0 px-3 py-1 bg-yellow-500 rounded" style="position:absolute;right:1%;"><i class="fa-solid fa-x rounded text-md"></i></button>
        <div id="imgContainer"></div>
    </dialog>
    <script>
    const dialog = document.querySelector("dialog");
    const closeButton = document.querySelector("dialog button");
   
    // "Close" button closes the dialog
    closeButton.addEventListener("click", () => {
        let imgContainer = document.getElementById('imgContainer');
        imgContainer.innerHTML = '';
        dialog.close();
    });
    function viewImage(param){
        let imgContainer = document.getElementById('imgContainer');
        let img = document.createElement('img');
        img.src = param;
        imgContainer.appendChild(img);
        dialog.showModal();
        console.log(param)
    }
    </script>
</body>
</html>
