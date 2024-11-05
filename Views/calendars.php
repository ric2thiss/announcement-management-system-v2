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
<!-- 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>  -->

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
            <a href="calendar.html" class="text-white"><i class="fa-solid fa-calendar-days text-xl"></i></a>
            <a href="#" class="text-gray-500"><i class="fa-solid fa-comments text-xl"></i></a>
            <a href="department.html" class="text-gray-500"><i class="fa-solid fa-building text-xl"></i></a>
            <a href="#" class="text-gray-500"><i class="fa-solid fa-chart-line text-xl"></i></a>
            <a href="dashboard.html" class="text-gray-500"><i class="fa-solid fa-user text-xl"></i></a>
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
                                <h3 class="font-bold">Ric Charles Paquibot</h3>
                                <p class="text-gray-500">Web Developer · Oct 8, 8:36 pm</p>
                            </div>
                            <div>
                                <a href="">Edit</a>
                                <span class="mx-4"> | </span>
                                <a href="">Settings</a>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-5">
                    <div>
                        <p class="text-gray-500">Bio</p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur sint non placeat illo vero harum corporis maiores voluptas debitis, labore quod earum deserunt neque modi. Ducimus facere quod vel dolorem?
                    </div>
                </div>
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
                 <!-- <div class="bg-white p-6 rounded-lg shadow mb-8">
                    <h2 class="text-xl font-bold mb-4">Scheduled Posts</h2>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>63</td>
                                <td>2011/07/25</td>
                                <td>$170,750</td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
                <!-- Create Announcement -->
                 <div class="bg-white p-6 rounded-lg shadow mb-8">
                 <div class="container">
                    <div id="calendar"></div>
                </div>
                 </div>
                
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <!-- Initialize Quill editor -->
    <script> 
        // Annopuncement lists
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    


        
    </script>
</body>
</html>
