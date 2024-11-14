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
    <!-- table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">

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
            <a href="../home" class="text-gray-300 hover:text-white">Announcement</a>
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
            <a href="../home" class="text-gray-500"><i class="fa-solid fa-house text-xl"></i></a>
            <a href="../calendar" class="text-gray-500"><i class="fa-solid fa-calendar-days text-xl"></i></a>
            <a href="#" class="text-gray-500"><i class="fa-solid fa-comments text-xl"></i></a>
            <a href="../department" class="text-gray-500"><i class="fa-solid fa-building text-xl"></i></a>
            <a href="./post/admin" class="text-white"><i class="fa-solid fa-chart-line text-xl"></i></a>
            <a href="../dashboard" class="text-gray-500"><i class="fa-solid fa-user text-xl"></i></a>
        </aside>

        <!-- Main Content -->
        <section class="flex-1 p-8 flex space-x-8">
            <!-- Announcement Feed Section (Scrollable) -->
            <!-- h-[calc(100vh-10rem)] -->
            <div class="flex-1 overflow-y-auto h-100vh">
            <h2 class="text-2xl font-bold mb-4">Posts Information</h2>
            <hr class="my-5">
                <!-- Dashboard feature -->
                 <div class="rounded-lg flex space-x-8">
                    <!-- Total Posts -->
                    <div class="bg-white p-6 rounded-lg flex-1 shadow mb-8">
                        <h2 class="text-xl text-center font-bold mb-4">Posted</h2>
                        <p class="text-center text-xl">10</p>
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
                 <!-- Calendar -->
                 <div class="bg-white p-6 rounded-lg shadow mb-8">
                    <h2 class="text-xl font-bold mb-4">Scheduled Posts</h2>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Program</th>
                                <th>Category</th>
                                <th>Posted Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if($userData == null):?>
                                <tr>
                                    <td>No Data</td>
                                </tr>
                            <?php endif ?>
                            <?php foreach($userData as $user):?>
                            <tr>
                                <td><?=$user["first_name"]?> <?=$user["last_name"]?></td>
                                <td><?=$user["department_name"]?></td>
                                <td><?=$user["program_name"]?></td>
                                <td><?=$user["category_name"]?></td>
                                <td><?=$user["month"]?> <?=$user["date"]?>, <?=$user["time"]?></td>
                                <td>
                                        <button type="submit" class="p-2" name="update"  onclick="openForm(<?=$user['post_id']?>, '<?=$user['first_name']?>', '<?=$user['last_name']?>', '<?=$user['post_title']?>', '<?=$user['post_content']?>', '<?=$user['post_when']?>', '<?=$user['category_name']?>')"
                                        >
                                            <i class="text-blue-500 text-base fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button type="submit" class="p-2" name="delete" href="<?=$user["post_id"]?>">
                                            <i class="text-red-500 text-base fa-solid fa-trash-can-arrow-up"></i>
                                        </button>
                                        <a class="p-2" href="../posts/<?=$user["post_id"]?>">
                                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        </a>
                                    <!-- <form action="./admin" method="GET">
                                        <input type="text" name="postId" value="">
                                        <button type="submit" class="p-2" name="update" value="true">
                                            <i class="text-blue-500 text-base fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button type="submit" class="p-2" name="delete" href="">
                                            <i class="text-red-500 text-base fa-solid fa-trash-can-arrow-up"></i>
                                        </button>
                                        <a class="p-2" href="../posts/">
                                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        </a>
                                    </form> -->
                                </td>
                            </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
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
        </section>
    </main>


    <!-- Form Modal -->
    <style>
    ::backdrop {
        backdrop-filter: blur(5px);
    }
    </style>

    <dialog>
    <button autofocus>Close</button>
        <form action="">
            <div>
                <label for="">First Name</label>
                <input type="text" id="fname">
            </div>
            <div>
                <label for="">Last Name</label>
                <input type="text" id="lname">
            </div>
            <div>
                <label for="">Title</label>
                <input type="text" id="title">
            </div>
            <div>
                <label for="">Description</label>
                <input type="text" id="content">
            </div>
            <div>
                <label for="">Schedule</label>
                <input type="text" id="sched">
            </div>
            <div>
                <label for="">Category</label>
                <input type="text" id="category">
            </div>
        </form>
    </dialog>
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <!-- Initialize Quill editor -->
    <script> 

        // Annopuncement lists
        $(document).ready(function() {
            $('#myTable').DataTable();
        });


        const dialog = document.querySelector("dialog");
        // const showButton = document.querySelector("dialog + button");
        const closeButton = document.querySelector("dialog button");

        // "Show the dialog" button opens the dialog modally
        // showButton.addEventListener("click", () => {
        // dialog.showModal();
        // });
        function openForm(id, fname, lname, title, content, sched, category){
            dialog.showModal();
            document.getElementById("fname").value = fname;
            document.getElementById("lname").value = lname;
            document.getElementById("title").value = title;
            document.getElementById("content").value = content;
            document.getElementById("sched").value = sched;
            document.getElementById("category").value = category;

            
        }

        // "Close" button closes the dialog
        closeButton.addEventListener("click", () => {
        dialog.close();
        });
        

        
    </script>
</body>
</html>
