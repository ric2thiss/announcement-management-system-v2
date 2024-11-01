
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
            <a href="./home" class="text-gray-500"><i class="fa-solid fa-house text-xl"></i></a>
            <a href="./calendar" class="text-gray-500"><i class="fa-solid fa-calendar-days text-xl"></i></a>
            <a href="./chat" class="text-gray-500"><i class="fa-solid fa-comments text-xl"></i></a>
            <a href="./department" class="text-gray-500"><i class="fa-solid fa-building text-xl"></i></a>
            <a href="./status" class="text-gray-500"><i class="fa-solid fa-chart-line text-xl"></i></a>
            <a href="./dashboard" class="text-white"><i class="fa-solid fa-user text-xl"></i></a>
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
                                <h3 class="font-bold" id="user-name"><?php echo $userData["first_name"] . " " . $userData["middle_initial"] . ". " . $userData["last_name"]; ?></h3>
                                <p class="text-gray-500"><span id="program"><?= $userData["program_name"]?></span> · <span id="month_name"><?=$userData["month_name"]?></span> <span id="time_only"><?=$userData["time_only"]?></span></p>
                            </div>
                            <div>
                                <a href="./edit-profile">Edit</a>
                                <span class="mx-4"> | </span>
                                <a href="./settings">Settings</a>
                                <span class="mx-4"> | </span>
                                <a href="./logout">Logout</a>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-5">
                    <div>
                        <p class="text-gray-500">Bio</p>
                        Hi, I'm <span class="underline underline-offset-4"><?=$userData["first_name"] . " " . $userData["middle_initial"] . ". " . $userData["last_name"];?></span> and I am a <?=$userData["program_name"]?>, <?=$userData["role_name"]?>  under the Department of <?=$userData["department_name"]?>
                    </div>
                </div>
                <!-- Dashboard feature -->
                 <div class="rounded-lg flex space-x-8">
                    <!-- Total Posts -->
                    <div class="bg-white p-6 rounded-lg flex-1 shadow mb-8">
                        <h2 class="text-xl text-center font-bold mb-4">Active</h2>
                        <p class="text-center text-xl" id="post-count"><?=$activePostNumber?></p>
                    </div>
                    <!-- Pending Posts -->
                    <div class="bg-white p-6 rounded-lg shadow flex-1 mb-8">
                        <h2 class="text-xl text-center font-bold mb-4">Pending</h2>
                        <p class="text-center text-xl">0</p>
                    </div>
                    <!-- Scheduled Posts -->
                    <div class="bg-white p-6 rounded-lg flex-1 shadow mb-8">
                        <h2 class="text-xl text-center font-bold mb-4">Scheduled</h2>
                        <p class="text-center text-xl"><?=$scheduledPostsNumber?></p>
                    </div>
                    <!-- DisApproved -->
                    <div class="bg-white p-6 rounded-lg flex-1 shadow mb-8">
                        <h2 class="text-xl text-center font-bold mb-4">Deleted</h2>
                        <p class="text-center text-xl">6</p>
                    </div>
                 </div>
                <!-- Create Announcement -->
                <div class="bg-white p-6 rounded-lg shadow mb-8">
                    <h2 class="text-xl font-bold mb-4">Create Announcement</h2>
                    <!-- <div class="flex items-center space-x-4 ">  
                        CREATE Announcement
                    </div> -->
                    <hr class="my-5">
                    <form id="myForm" action="./dashboard" method="POST" enctype="multipart/form-data" onsubmit="syncQuillContent()">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-5">
                            
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
                                <label for="fileToUpload" class="mb-2 font-medium text-gray-700">w:</label>
                                <input type="file"  name="fileToUpload" id="fileToUpload" class="p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Enter the 'Where'">
                            </div>
                            
                            <div class="flex flex-col">
                                <label for="post_when" class="mb-2 font-medium text-gray-700">To be posted on :</label>
                                <input type="date" id="post_when" name="post_when" class="p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Enter the 'When'">
                            </div>
                        </div>
                    
                    <!-- Create the editor container -->
                        <textarea name="post_content" id="post_content" style="display:none;"></textarea>
                        <div id="editor">
                            
                        </div>
                        <input name="submit" type="submit"  value="Post" id="post" class="my-3 px-5 py-2 cursor-pointer bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 transition duration-200 ease-in-out">
                    </form>

                
                </div>
            </div>

            <!-- Pinned Announcement Section (Sticky) -->
            <div class="w-1/4">
                <div class="sticky top-24">
                    <div class="bg-white p-6 rounded-lg mb-8 shadow">
                        <h2 class="text-xl font-bold mb-4">Pinned Announcement</h2>
                        <?php foreach($pinnedPosts as $pinnedPost):?>
                        <div class="space-y-4">
                            <!-- Example of Pinned Announcement -->
                            <div class="bg-gray-100 p-4 mb-4 rounded-lg">
                                <div class="flex items-center space-x-4">
                                    <img src="./assets/profile.jpg" alt="Profile" class="w-8 h-8 rounded-full">
                                    <div>
                                        <h3 class="font-bold"><a href="./user/<?=$pinnedPost["user_id"]?>"><?=$pinnedPost["first_name"]?> <?=$pinnedPost["last_name"]?></a></h3>
                                        <span class="text-gray-500">Pinned</span>
                                    </div>
                                </div>
                                <h4 class="font-bold mt-4"><?=$pinnedPost["post_title"]?></h4>
                                <p class="text-gray-700 mt-2"><?=$pinnedPost["post_content"]?></p>
                                <a href="./posts/<?=$pinnedPost["pinned_id"]?>" class="text-blue-500 mt-2 inline-block">View Post</a>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                    <!-- Scheduled Post Section -->
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h2 class="text-xl font-bold mb-4">Scheduled Post</h2>
                        <?php foreach($scheduledPosts as $scheduledPost):?>
                        <div class="space-y-4">
                            <!-- Example of Pinned Announcement -->
                            <div class="bg-gray-100 p-4 mb-4 rounded-lg">
                                <div class="flex items-center space-x-4">
                                    <img src="./assets/profile.jpg" alt="Profile" class="w-8 h-8 rounded-full">
                                    <div>
                                        <h3 class="font-bold"><?=$scheduledPost["first_name"]?> <?=$scheduledPost["last_name"]?></h3>
                                        <span class="text-gray-500">To be post on <?=$scheduledPost["month_name"]?> <?=$scheduledPost["date_only"]?></span>
                                    </div>
                                </div>
                                <h4 class="font-bold mt-4"><?=$scheduledPost["post_title"]?></h4>
                                <p class="text-gray-700 mt-2"><?=$scheduledPost["post_content"]?></p>
                                <a href="./pending/<?=$scheduledPost["scheduled_id"]?>" class="text-blue-500 mt-2 inline-block">View Post</a>
                            </div>
                        </div>
                        <?php endforeach ?>
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
                            <form action="./category" method="POST" class="flex justify-between gap-1 items-center w-full">
                                <input type="text" name="category_name" id="" class="p-2 border w-full border-gray-300 rounded-lg" placeholder="Category">
                                <input type="submit" name="create_category" class="text-white p-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md 
                              cursor-pointer  hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 transition duration-200 ease-in-out" value=" + Category">
                            </form>
                        </div>
                        <div class="space-y-2">
                            <p class="bg-gray-100 p-4 rounded-lg flex justify-between">
                                All Announcement <span><?=count($getCategories)?></span>
                            </p>
                            <p class="p-2">General</p>
                            <?php foreach($getCategories as $category): ?>
                            <p class="p-2"><a href="<?=$category["category_id"]?>"><?=$category["category_name"]?></a></p>
                            <?php endforeach; ?>
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
        // getUserData();
        // async function getUserData(){
        //     const res = await fetch("User.php");
        //     if(!res.ok){
        //         throw new Error("Network response was not ok");
        //     }
        //     const data = await res.json();
        //     console.log(data);
        //     // Check if user is valid or currently loggedin or exist
        //     if(data.status === "error"){
        //         window.location.href = data.route;
        //     }
        //     // console.log(data);
        //     const {firstname, middleinitial, lastname, department, program, month_name, time_only} = data
        //     document.getElementById("user-name").textContent = `${firstname} ${middleinitial}. ${lastname}`;
        //     document.getElementById("program").textContent = `${program}`;
        //     document.getElementById("month_name").textContent = `${month_name}`;
        //     document.getElementById("time_only").textContent = `${time_only}`;
            
        // }


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
        function syncQuillContent() {
            document.getElementById('post_content').value = quill.root.innerHTML;
        }



        // const postBtn = document.getElementById("post")


        // // Get form
        // document.getElementById("myForm").onsubmit = (event)=>{
        //     event.preventDefault();
        //     // console.log(quill.root.innerHTML)
        //     const what = document.getElementById("what").value
        //     const who = document.getElementById("who").value
        //     const where = document.getElementById("where").value
        //     const when = document.getElementById("when").value
        //     const content = quill.root.innerHTML;

        //     const post_data = {
        //        what,
        //        who,
        //        where,
        //        when,
        //        content
        //     }

        //     console.log(post_data)



        //     fetch("Create.php", {
        //         method : "POST",
        //         headers: {
        //             "Content-Type": "application/json"
        //         },
        //         body: JSON.stringify(post_data)
        //     })
        //     .then(res => {
        //         if(!res.ok){
        //              throw new Error("Network response was not ok");
        //         }
        //         return res.json()
        //     })
        //     .then(data => {
        //         // alert(data.message)
        //         if(data.status === "success"){
        //             document.getElementById("myForm").reset();
        //             quill.setContents([]);
        //         }
        //     })
        //     .catch(error => {
        //         console.error('There has been a problem with your fetch operation:', error);
        //     })

        //     post();
        // }


        // async function post(){
        //     const res = await fetch("getpostcontroller.php");
        //     const data = await res.json();
        //     console.log(data)
        //     document.getElementById("post-count").textContent = data;
        // }

    </script>
</body>
</html>
