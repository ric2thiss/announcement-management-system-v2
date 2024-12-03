<html>  
<head>  
    <title>Fullcalendar</title> 

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script> 
    <style>
        .fc-left h2{
            font-size: 1.5rem;
        }
        th{
            background-color: rgb(17, 24, 39);
            color: #fff;
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
        <div class="container mx-auto p-5">
            <div id="calendar"></div>
        </div>

    </main>
</body>
</html>
<script>



$(document).ready(function() {
    fetch('http://localhost/announcement-management-system/ams/calendar/event-api')
    .then(res => res.json())
    .then(data => {
        // Function to generate random color
        const getRandomColor = () => {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        };

        const events = data.map(event => {
            const eventDate = new Date(event.post_when); // Convert event date to a JavaScript Date object
            const currentDate = new Date(); // Get the current date and time
            
            // Determine the URL based on the event's date
            const url = eventDate > currentDate 
                ? `http://localhost/announcement-management-system/ams/scheduledpost/${event.post_id}` 
                : `http://localhost/announcement-management-system/ams/posts/${event.post_id}`;
            
            return {
                title: event.post_title,
                start: event.post_when,
                color: getRandomColor(), // Use the random color generator
                url: url,
            };
        });


        console.log(events);

        $('#calendar').fullCalendar({
            events: events
        });
    })
    .catch(error => console.log('Error fetching events:', error)); // Add error handling
});


</script>