<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Announcement Management System</title>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <!-- Main Layout: Flex container for sidebar and main content -->
  <div class="flex flex-col lg:flex-row min-h-screen">
    
    <!-- Sidebar (hidden on mobile, sticky on large screens) -->
    <aside class="hidden lg:block lg:w-1/6 bg-gray-800 text-white p-4 sticky top-0 h-screen">
      <div class="flex flex-col space-y-4">
        <div class="text-xl font-bold">Menu</div>
        <a href="#" class="flex items-center space-x-2">
          <i class="fas fa-home"></i>
          <span>Home</span>
        </a>
        <a href="#" class="flex items-center space-x-2">
          <i class="fas fa-bullhorn"></i>
          <span>Announcements</span>
        </a>
        <a href="#" class="flex items-center space-x-2">
          <i class="fas fa-users"></i>
          <span>Users</span>
        </a>
      </div>
    </aside>

    <!-- Main content -->
    <main class="w-full lg:w-5/6 p-4">
      <!-- Header: Flex for larger screens, stack on smaller -->
      <header class="flex flex-col sm:flex-row items-center justify-between mb-4">
        <div class="text-2xl font-bold">Announcements</div>
        <div class="flex items-center space-x-4 mt-2 sm:mt-0">
          <input class="w-full sm:w-auto p-2 border border-gray-300 rounded-lg" type="text" placeholder="Search">
          <button class="p-2 bg-yellow-500 text-white rounded-lg">Post</button>
        </div>
      </header>

      <!-- Announcement feed section -->
      <section class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <!-- Category section -->
        <div class="bg-white p-4 rounded-lg shadow-lg sticky top-0">
          <div class="text-xl font-bold mb-2">Category</div>
          <ul class="space-y-2">
            <li><a href="#" class="block p-2 bg-gray-100 rounded-lg">All Announcements</a></li>
            <li><a href="#" class="block p-2">General</a></li>
            <li><a href="#" class="block p-2">Updates</a></li>
            <li><a href="#" class="block p-2">Events</a></li>
          </ul>
          <button class="mt-4 p-2 w-full bg-yellow-500 text-white rounded-lg">+ Add New</button>
        </div>

        <!-- Announcement posts -->
        <div class="space-y-4">
          <!-- Announcement card -->
          <div class="bg-white p-4 rounded-lg shadow-lg">
            <div class="flex items-center justify-between">
              <div>
                <div class="font-bold">Ric Charles Paquibot</div>
                <div class="text-sm text-gray-500">Web Developer • Oct 8, 8:36 PM</div>
              </div>
              <i class="fas fa-ellipsis-h"></i>
            </div>
            <p class="mt-2 font-bold text-green-500">General</p>
            <p class="text-gray-700">Welcome to Announcement Management System of CSUCC 🎉</p>
            <div class="flex items-center space-x-4 mt-4">
              <button class="flex items-center space-x-1 text-gray-500">
                <i class="fas fa-thumbs-up"></i>
                <span>React</span>
              </button>
              <button class="flex items-center space-x-1 text-gray-500">
                <i class="fas fa-comment"></i>
                <span>Comment</span>
              </button>
              <button class="flex items-center space-x-1 text-gray-500">
                <i class="fas fa-share"></i>
                <span>Share</span>
              </button>
              <button class="ml-auto text-gray-500">
                <i class="fas fa-chevron-right"></i> View Full Post
              </button>
            </div>
          </div>
          <!-- More announcement cards can go here -->
        </div>
      </section>
    </main>

    <!-- Pinned Announcements (sticky on large screens, hidden on mobile) -->
    <aside class="hidden lg:block lg:w-1/6 bg-gray-100 p-4 sticky top-0">
      <div class="text-xl font-bold mb-2">Pinned Announcement</div>
      <!-- Pinned announcement card -->
      <div class="bg-white p-4 rounded-lg shadow-lg mb-4">
        <div class="font-bold">Ric Charles Paquibot</div>
        <div class="text-sm text-gray-500">Web Developer • Pinned</div>
        <p class="mt-2 font-bold text-green-500">General</p>
        <p class="text-gray-700">Welcome to Announcement Management System of CSUCC...</p>
        <button class="mt-4 text-yellow-500">View Post</button>
      </div>
      <!-- More pinned announcements can go here -->
    </aside>
  </div>

  <!-- Mobile Hamburger Menu -->
  <div class="block lg:hidden fixed top-0 left-0 p-4">
    <button id="menuToggle" class="p-2 bg-gray-800 text-white rounded-lg">
      <i class="fa fa-bars"></i>
    </button>
  </div>

  <script>
    document.getElementById('menuToggle').addEventListener('click', function () {
      const menu = document.getElementById('mobileMenu');
      menu.classList.toggle('hidden');
    });
  </script>
</body>
</html>
