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
            <img src="./assets/ams-logo.svg" alt="CSUCC logo" class="w-12">
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
            <img src="./assets/profile.jpg" alt="Profile" class="w-10 h-10 rounded-full">
        </div>
    </header>

    <!-- Main Section -->
    <main class="flex">
        <!-- Sidebar (Sticky) -->
        <aside class="w-16 bg-gray-900 text-white flex flex-col items-center space-y-6 py-6 sticky top-14 h-screen">
            <a href="home.html" class="text-gray-500"><i class="fa-solid fa-house text-xl"></i></a>
            <a href="calendar.html" class="text-gray-500"><i class="fa-solid fa-calendar-days text-xl"></i></a>
            <a href="#" class="text-gray-500"><i class="fa-solid fa-comments text-xl"></i></a>
            <a href="department.html" class="text-gray-500"><i class="fa-solid fa-building text-xl"></i></a>
            <a href="#" class="text-gray-500"><i class="fa-solid fa-chart-line text-xl"></i></a>
            <a href="dashboard.html" class="text-white"><i class="fa-solid fa-user text-xl"></i></a>
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
                        <img src="./assets/profile.jpg" alt="Profile" class="w-20 h-20 rounded-full">
                        <div class="flex justify-between size-full">
                            <div>
                                <h3 class="font-bold" id="user-name"><?php echo $data["firstname"] . " " . $data["middleinitial"] . ". " . $data["lastname"]; ?></h3>
                                <p class="text-gray-500"><span id="program"><?= $data["program"]?></span> · <span id="month_name"><?=$data["month_name"]?></span> <span id="time_only"><?=$data["time_only"]?></span></p>
                            </div>
                            <div>
                                <a href="">Edit</a>
                                <span class="mx-4"> | </span>
                                <a href="">Settings</a>
                                <span class="mx-4"> | </span>
                                <a href="./logout">Logout</a>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-5">
                    <div>
                        <p class="text-gray-500">Bio</p>
                        Hi, I'm <span class="underline underline-offset-4"><?=$data["firstname"] . " " . $data["middleinitial"] . ". " . $data["lastname"];?></span> and I am a <?=$data["program"]?> student under the Department of <?=$data["department"]?>
                    </div>
                </div>
                <!-- Dashboard feature -->
                 <div class="rounded-lg flex space-x-8">
                    <!-- Total Posts -->
                    <div class="bg-white p-6 rounded-lg flex-1 shadow mb-8">
                        <h2 class="text-xl text-center font-bold mb-4">Posted</h2>
                        <p class="text-center text-xl" id="post-count"></p>
                    </div>
                    <!-- Pending Posts -->
                    <div class="bg-white p-6 rounded-lg shadow flex-1 mb-8">
                        <h2 class="text-xl text-center font-bold mb-4">Pending</h2>
                        <p class="text-center text-xl">6</p>
                    </div>
                    <!-- Scheduled Posts -->
                    <div class="bg-white p-6 rounded-lg flex-1 shadow mb-8">
                        <h2 class="text-xl text-center font-bold mb-4">Scheduled</h2>
                        <p class="text-center text-xl">6</p>
                    </div>
                    <!-- DisApproved -->
                    <div class="bg-white p-6 rounded-lg flex-1 shadow mb-8">
                        <h2 class="text-xl text-center font-bold mb-4">Deleted</h2>
                        <p class="text-center text-xl">6</p>
                    </div>
                 </div>
                <!-- Create Announcement -->

            </div>

            <!-- Pinned Announcement Section (Sticky) -->
            <div class="w-1/4">
                <div class="sticky top-24">
                    <div class="bg-white p-6 rounded-lg mb-8 shadow">
                        <h2 class="text-xl font-bold mb-4">Pinned Announcement</h2>
                        <div class="space-y-4">
                            <!-- Example of Pinned Announcement -->
                            <div class="bg-gray-100 p-4 rounded-lg">
                                <div class="flex items-center space-x-4">
                                    <img src="./assets/profile.jpg" alt="Profile" class="w-8 h-8 rounded-full">
                                    <div>
                                        <h3 class="font-bold">Ric Charles Paquibot</h3>
                                        <span class="text-gray-500">Pinned</span>
                                    </div>
                                </div>
                                <h4 class="font-bold mt-4">Welcome to Announcement...</h4>
                                <p class="text-gray-700 mt-2">Lorem ipsum dolor sit amet...</p>
                                <a href="#" class="text-blue-500 mt-2 inline-block">View Post</a>
                            </div>
                        </div>
                    </div>
                    <!-- Scheduled Post Section -->
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h2 class="text-xl font-bold mb-4">Scheduled Post</h2>
                        <div class="space-y-4">
                            <!-- Example of Pinned Announcement -->
                            <div class="bg-gray-100 p-4 rounded-lg">
                                <div class="flex items-center space-x-4">
                                    <img src="./assets/profile.jpg" alt="Profile" class="w-8 h-8 rounded-full">
                                    <div>
                                        <h3 class="font-bold">Ric Charles Paquibot</h3>
                                        <span class="text-gray-500">Will be post on December 2,2024</span>
                                    </div>
                                </div>
                                <h4 class="font-bold mt-4">Welcome to Announcement...</h4>
                                <p class="text-gray-700 mt-2">Lorem ipsum dolor sit amet...</p>
                                <a href="#" class="text-blue-500 mt-2 inline-block">View Post</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
                        <!-- Announcement Category Section (Sticky) -->
            <div class="w-1/5">
                <div class="sticky top-24">
                    <!-- Category -->
                    <div class="bg-white p-6 mb-8 rounded-lg shadow">
                        <h2 class="text-xl font-bold mb-4">Announcement</h2>
                        <div class="flex justify-between items-center mb-4">
                            <span>Category</span>
                            <button class="text-blue-500">+ Add new</button>
                        </div>
                        <div class="space-y-2">
                            <p class="bg-gray-100 p-4 rounded-lg flex justify-between">
                                All Announcement <span>6</span>
                            </p>
                            <p class="p-2">General</p>
                            <p class="p-2">Lorem Ipsum</p>
                            <p class="p-2">Lorem Ipsum</p>
                            <p class="p-2">Lorem Ipsum</p>
                        </div>
                    </div>
                     <!-- Notification -->
                     <div class="bg-white p-6 mb-8 rounded-lg shadow">
                        <h2 class="text-xl font-bold mb-4">Notification</h2>
                        <div class="space-y-2">
                            <p class="bg-gray-100 p-4 rounded-lg flex justify-between">
                                Ric Charles reacted to your Post 
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <!-- Initialize Quill editor -->
    <script>
        getUserData();
        async function getUserData(){
            const res = await fetch("User.php");
            if(!res.ok){
                throw new Error("Network response was not ok");
            }
            const data = await res.json();
            console.log(data);
            // Check if user is valid or currently loggedin or exist
            if(data.status === "error"){
                window.location.href = data.route;
            }
            // console.log(data);
            const {firstname, middleinitial, lastname, department, program, month_name, time_only} = data
            document.getElementById("user-name").textContent = `${firstname} ${middleinitial}. ${lastname}`;
            document.getElementById("program").textContent = `${program}`;
            document.getElementById("month_name").textContent = `${month_name}`;
            document.getElementById("time_only").textContent = `${time_only}`;
            
        }


        const quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    ['link'],
                    ['clean'] 
                ]
            }
        });



        const postBtn = document.getElementById("post")


        // Get form
        document.getElementById("myForm").onsubmit = (event)=>{
            event.preventDefault();
            // console.log(quill.root.innerHTML)
            const what = document.getElementById("what").value
            const who = document.getElementById("who").value
            const where = document.getElementById("where").value
            const when = document.getElementById("when").value
            const content = quill.root.innerHTML;

            const post_data = {
               what,
               who,
               where,
               when,
               content
            }

            console.log(post_data)



            fetch("Create.php", {
                method : "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(post_data)
            })
            .then(res => {
                if(!res.ok){
                     throw new Error("Network response was not ok");
                }
                return res.json()
            })
            .then(data => {
                // alert(data.message)
                if(data.status === "success"){
                    document.getElementById("myForm").reset();
                    quill.setContents([]);
                }
            })
            .catch(error => {
                console.error('There has been a problem with your fetch operation:', error);
            })

            post();
        }


        async function post(){
            const res = await fetch("getpostcontroller.php");
            const data = await res.json();
            console.log(data)
            document.getElementById("post-count").textContent = data;
        }

    </script>
</body>
</html>
