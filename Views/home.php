<?php

// print_r($get_users_pinned_posts)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement Management System</title>
    <!-- <script src="calendar.js"></script> -->
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
            <img src="./assets/ams-logo.svg" alt="CSUCC logo" class="w-12">
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
            <img src="<?=$userData["photo"]?>" alt="Profile" class="w-10 h-10 rounded-full">
        </div>
    </header>

    <!-- Main Section -->
    <main class="flex">
        <!-- Sidebar (Sticky) -->
        <aside class="w-16 bg-gray-900 text-white flex flex-col items-center space-y-6 py-6 sticky top-14 h-screen">
            <a href="./home" class="text-white"><i class="fa-solid fa-house text-xl"></i></a>
            <a href="./calendar" class="text-gray-500"><i class="fa-solid fa-calendar-days text-xl"></i></a>
            <a href="./chat" class="text-gray-500"><i class="fa-solid fa-comments text-xl"></i></a>
            <a href="./department" class="text-gray-500"><i class="fa-solid fa-building text-xl"></i></a>
            <a href="./post/admin" class="text-gray-500"><i class="fa-solid fa-chart-line text-xl"></i></a>
            <a href="./dashboard" class="text-gray-500"><i class="fa-solid fa-user text-xl"></i></a>
        </aside>

        <!-- Main Content -->
        <section class="flex-1 p-8 flex space-x-8">
            <!-- Announcement Category Section (Sticky) -->
            <div class="w-1/4">
                <div class="bg-white p-6 rounded-lg shadow sticky top-24">
                    <h2 class="text-xl font-bold mb-4">Announcement</h2>
                    <div class="flex justify-between items-center mb-4">
                        <span>Category</span>
                        <!-- <button class="text-blue-500">+ Add new</button> -->
                    </div>
                    <div class="space-y-2">
                        <p class="bg-gray-100 p-4 rounded-lg flex justify-between">
                            All Announcement <span><?=count($postCategories)?></span>
                        </p>
                        <?php foreach($postCategories as $postCategory): ?>
                            <a href="./category/<?=$postCategory["category_name"]?>"><p class="p-2 hover:bg-gray-100 p-4 rounded-lg flex justify-between"><?=$postCategory["category_name"]?></p></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Announcement Feed Section (Scrollable) -->
            <!-- h-[calc(100vh-10rem)] -->
            <div class="flex-1 overflow-y-auto h-100vh">
                <div class="bg-white p-6 rounded-lg shadow mb-8">
                    <div class="flex items-center space-x-4">
                        <img src="<?=$userData["photo"]?>" alt="Profile" class="w-10 h-10 rounded-full">
                        <input type="text" placeholder="What's on your mind?" class="flex-1 bg-gray-100 p-2 rounded">
                        <div class="flex space-x-2">
                            <button class="bg-gray-100 p-2 rounded"><i class="fa-solid fa-photo-film"></i></button>
                            <button class="bg-gray-100 p-2 rounded"><i class="fa-solid fa-video"></i></button>
                            <button class="bg-gray-100 p-2 rounded"><i class="fa-solid fa-calendar-days"></i></button>
                        </div>
                    </div>
                </div>
                
                <!-- Example of Announcement Post -->

                <?php foreach($posts as $post): ?>
                    
                <div class="bg-white p-6 rounded-lg shadow mb-6">
                    <div class="flex items-center space-x-4 justify-between">
                        <div class="flex items-center space-x-4">
                            <img src="<?=$post["photo"]?>" alt="Profile" class="w-10 h-10 rounded-full">
                            <div>
                                <h3 class="font-bold"><a href="./user/<?=$post["user_id"]?>"><?=$post["first_name"]?> <?=$post["last_name"]?></a></h3>
                                <p class="text-gray-500"><?=$post["role_name"]?> · <?=$post["month"]?> <?=$post["date"]?>, <?=$post["time"]?></p>
                            </div>
                        </div>
                        <div>
                            <button class="p-2 px-4 rounded-lg hover:bg-gray-100" data-postId="<?=$post["post_id"]?>" onclick="pinFunction(this)"><i class="fa-solid fa-thumbtack" style="transform:rotate(30deg);"></i></button>
                        </div>
                        
                    </div>
                    <h4 class="font-bold text-lg mt-4"><?=$post["post_title"]?> 🎉</h4>
                    <div class="text-gray-700 mt-2"><?=$post["post_content"]?></div>
                    <div class="my-5 p-2"><img src="<?=$post["images"]?>" onclick="viewImage('<?= $post['images'] ?>')" alt="Image"></div>
                    <div class="flex items-center space-x-4 mt-4">
                        <button class="text-blue-500" id="like" data-postId="<?=$post["post_id"]?>" onclick="likeFunction(this)"><i class="fa-solid fa-thumbs-up"></i> Like</button>
                        <button class="text-blue-500"><i class="fa-solid fa-comment"></i> Comment</button>
                        <button class="text-blue-500"><i class="fa-solid fa-share"></i> Share</button>
                        <button class="text-blue-500"><i class="fa-solid fa-eye"></i> View Full Post</button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Pinned Announcement Section (Sticky) -->
            <div class="w-1/4">
                <div class="bg-white p-6 rounded-lg shadow sticky top-24">
                    <h2 class="text-xl font-bold mb-4">Pinned Announcement</h2>
                    <?php if($pinnedPosts == null):?>
                        <p>No Scheduled Post</p>
                    <?php endif ?>
                    <?php foreach($pinnedPosts as $pinnedPost):?>
                        <div class="space-y-4">
                            <!-- Example of Pinned Announcement -->
                            <div class="bg-gray-100 p-4 mb-4 rounded-lg">
                                <div class="flex items-center space-x-4">
                                    <img src="<?=$pinnedPost["photo"]?>" alt="Profile" class="w-8 h-8 rounded-full">
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
    // async function get_like_counts(element) {
    //     const likeBtn = element.getAttribute("data-postId");
    //     try {
    //         const response = await fetch('http://localhost/announcement-management-system/ams/engagement/like');
            
    //         if (!response.ok) {
    //             throw new Error('Network response was not ok');
    //         }

    //         const data = await response.json();

            

         
            
    //     } catch (err) {
    //         console.error("Error:", err);
    //     }
    // }
    async function pinFunction(element) {
    let postId = element.getAttribute('data-postId');
    console.log("Post ID:", postId);
    
    try {
        const res = await fetch("./engagement/pin", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ post_id: postId })
        });
        
        if (!res.ok) {
            throw new Error(`Error: ${res.status} ${res.statusText}`);
        }
        
        const responseData = await res.json();
        console.log("Response Data:", responseData);
        
        // Toggle pin appearance based on response
        if (responseData.status === "success") {
            if (responseData.message === "Post pinned") {
                element.classList.add("bg-gray-100");  // Add pinned style
                console.log("Post pinned successfully.");
            } else if (responseData.message === "Post unpinned") {
                element.classList.remove("bg-gray-100");  // Remove pinned style
                console.log("Post unpinned successfully.");
            }
        } else {
            console.log("Failed to pin/unpin post.");
        }
        
    } catch (error) {
        console.error("Fetch Error:", error);
    }
}


    async function likeFunction(element) {
        let postId = element.getAttribute('data-postId');
        
        try {
            const res = await fetch("./engagement/like", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ post_id: postId })
            });
          
            if (!res.ok) {
                throw new Error("Error", res.statusText);
            }
            // get_like_counts();
            const responseData = await res.json(); 
            console.log(responseData);
            if(responseData.status == 'success'){
                element.classList.add('text-yellow-500');
            }
            
            if(responseData.status == 'failed'){
                element.classList.remove('text-yellow-500');
            }
            
        } catch (error) {
            console.error("Error", error);
        }
    }



    </script>
</body>
</html>
