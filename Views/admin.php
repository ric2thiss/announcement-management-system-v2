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
            <img src="../<?=$user["photo"]?>" alt="Profile" class="w-10 h-10 rounded-full">
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
            <h2 class="text-2xl font-bold mb-4">Posts Information PS: table pa  ang ni work</h2>
            <hr class="my-5">
                <!-- Dashboard feature -->
                 <div class="rounded-lg flex space-x-8">
                    <!-- Total Posts -->
                    <div class="bg-white p-6 rounded-lg flex-1 shadow mb-8">
                        <h2 class="text-xl text-center font-bold mb-4">Posted</h2>
                        <p class="text-center text-xl"><?=$activePostNumber?></p>
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
                    <h2 class="text-xl font-bold mb-4">Posts</h2>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Role</th>
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
                                <td><?=$user["post_title"]?></td>
                                <td><?=$user["role_name"]?></td>
                                <td><?=$user["category_name"]?></td>
                                <td><?=$user["month"]?> <?=$user["date"]?>, <?=$user["time"]?></td>
                                <td>
                                <button 
                                    type="submit" 
                                    class="p-2" 
                                    name="update" 
                                    onclick="openForm(
                                        <?= htmlspecialchars(json_encode($user['post_id'])) ?>, 
                                        <?= htmlspecialchars(json_encode($user['first_name'])) ?>, 
                                        <?= htmlspecialchars(json_encode($user['last_name'])) ?>, 
                                        <?= htmlspecialchars(json_encode($user['post_title'])) ?>, 
                                        <?= htmlspecialchars(json_encode($user['post_content'])) ?>, 
                                        <?= htmlspecialchars(json_encode($user['post_when'])) ?>, 
                                        <?= htmlspecialchars(json_encode($user['category_name'])) ?>, 
                                        <?= htmlspecialchars(json_encode($user['images'])) ?>
                                    )"
                                >
                                    <i class="text-blue-500 text-base fa-solid fa-pen-to-square"></i>
                                </button>

                                        <a class="p-2" href="./admin?id=<?=$user["post_id"]?>">
                                            <i class="text-red-500 text-base fa-solid fa-trash-can-arrow-up"></i>
                                        </a>
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
                        <?php if($pinnedPosts == null):?>
                        <p>No Pinned Post</p>
                        <?php endif ?>
                        <?php foreach($pinnedPosts as $pinnedPost):?>
                        <div class="space-y-4">
                            <!-- Example of Pinned Announcement -->
                            <div class="bg-gray-100 p-4 mb-4 rounded-lg">
                                <div class="flex items-center space-x-4">
                                    <img src="../<?=$pinnedPost["photo"]?>" alt="Profile" class="w-8 h-8 rounded-full">
                                    <div>
                                        <h3 class="font-bold"><a href="./user/<?=$pinnedPost["user_id"]?>"><?=$pinnedPost["first_name"]?> <?=$pinnedPost["last_name"]?></a></h3>
                                        <span class="text-gray-500">Pinned</span>
                                    </div>
                                </div>
                                <h4 class="font-bold mt-4"><?=$pinnedPost["post_title"]?></h4>
                                <p class="text-gray-700 mt-2"><?=$pinnedPost["post_content"]?></p>
                                <a href="./posts/<?=$pinnedPost["post_id"]?>" class="text-blue-500 mt-2 inline-block">View Post</a>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                    <!-- Scheduled Post Section -->
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h2 class="text-xl font-bold mb-4">Scheduled Post</h2>
                        <?php if($scheduledPosts == null):?>
                        <p>No Scheduled Post</p>
                        <?php endif ?>
                        <?php foreach($scheduledPosts as $scheduledPost):?>
                        <div class="space-y-4">
                            <!-- Example of Pinned Announcement -->
                            <div class="bg-gray-100 p-4 mb-4 rounded-lg">
                                <div class="flex items-center space-x-4">
                                    <img src="<?=$scheduledPost["photo"]?>" alt="Profile" class="w-8 h-8 rounded-full">
                                    <div>
                                        <h3 class="font-bold"><?=$scheduledPost["first_name"]?> <?=$scheduledPost["last_name"]?></h3>
                                        <span class="text-gray-500">To be post on <?=$scheduledPost["month_name"]?> <?=$scheduledPost["date_only"]?></span>
                                    </div>
                                </div>
                                <h4 class="font-bold mt-4"><?=$scheduledPost["post_title"]?></h4>
                                <p class="text-gray-700 mt-2"><?=$scheduledPost["post_content"]?></p>
                                <a href="./scheduledpost/<?=$scheduledPost["post_id"]?>" class="text-blue-500 mt-2 inline-block">View Post</a>
                            </div>
                        </div>
                        <?php endforeach ?>
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

    <dialog class="p-5">
    <button autofocus>Close</button>
        <form id="myForm" action="./admin" method="POST" enctype="multipart/form-data" class="px-10 py-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-5">
            <input type="text" id="post_id" name="post_id" style="display: none;">
                <div class="flex flex-col">
                    <label for="post_title" class="mb-2 font-medium text-gray-700">Title:</label>
                    <input type="text" id="post_title" name="post_title" class="p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Enter the 'What'">
                </div>
                
                <div class="flex flex-col">
                    <label for="category_id" class="mb-2 font-medium text-gray-700">Category :</label>
                    <!-- <input type="text" id="who" name="post_who" class="p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Enter the 'Who'"> -->
                    <select id="category_id" name="category_id" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" required>
                        <option value="">Select Category</option>
                            <!-- <option value="male">Male</option>
                            <option value="female">Female</option> -->
                            <?php foreach ($postCategories as $postCategory): ?>
                                <option value="<?= htmlspecialchars($postCategory['category_id']) ?>">
                                    <?= htmlspecialchars($postCategory['category_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                </div>
                
                <div class="flex flex-col">
                    <label for="fileToUpload" class="mb-2 font-medium text-gray-700">Image:</label>
                    <input type="file"  name="fileToUpload" id="fileToUpload" class="p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Enter the 'Where'">
                </div>
                
                <div class="flex flex-col">
                    <label for="post_when" class="mb-2 font-medium text-gray-700">To be posted on :</label>
                    <input type="date" id="post_when" name="post_when" class="p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Enter the 'When'">
                </div>
            </div>

            <!-- Create the editor container -->
            <textarea name="post_content" id="post_content" class="p-2" style="width: 100%; border:1px solid gray;"></textarea>
            <!-- <div id="editor">
            
            </div> -->
            <br>
            <div>
                <img src="" alt="" id="previewImg" width="20%">
                <input type="text" name="currentImage" id="currentImage">
            </div>
            <input name="update" type="submit"  value="Post" id="post" class="my-3 px-5 py-2 cursor-pointer bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 transition duration-200 ease-in-out">
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
        const closeButton = document.querySelector("dialog button");

        function openForm(id, fname, lname, title, content, sched, category, image){
            dialog.showModal();
            document.getElementById("post_id").value = id;
            document.getElementById("post_title").value = title;
            document.getElementById("post_content").value = content;
            document.getElementById("post_when").value = sched;
            document.getElementById("previewImg").src = `../${image}`;
            document.getElementById('currentImage').value = image;

            
        }

        // "Close" button closes the dialog
        closeButton.addEventListener("click", () => {
        dialog.close();
        });
        

        
    </script>
</body>
</html>
