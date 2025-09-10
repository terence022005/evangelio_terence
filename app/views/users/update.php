<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-600 flex items-center justify-center min-h-screen">

  <div class="bg-white/90 backdrop-blur p-8 rounded-2xl shadow-2xl w-full max-w-md transform transition-all hover:scale-[1.02]">
    <!-- Title -->
    <h1 class="text-3xl font-extrabold text-center text-emerald-700 mb-2">Update Record</h1>

    <!-- Form -->
    <form action="<?= site_url('users/update/' .segment(4)); ?>" method="POST" class="space-y-5">
      
      <!-- Username -->
      <div>
        <label for="username" class="block text-sm font-semibold text-gray-700 mb-1">Username</label>
        <div class="relative">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
            <!-- Icon: User -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9.969 9.969 0 0112 15c2.21 0 4.243.72 5.879 1.929M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
          </span>
          <input type="text" id="username" name="username" 
            value="<?= html_escape($user['username']); ?>" 
            required
            class="pl-10 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200">
        </div>
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
        <div class="relative">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
            <!-- Icon: Mail -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0l-4-4m4 4l-4 4m16-4h-8" />
            </svg>
          </span>
          <input type="email" id="email" name="email" 
            value="<?= html_escape($user['email']); ?>" 
            required
            class="pl-10 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200">
        </div>
      </div>

      <!-- Submit Button -->
      <button type="submit"
        class="w-full bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-bold py-3 px-4 rounded-lg shadow-md hover:from-emerald-700 hover:to-teal-700 hover:shadow-lg transition duration-300">
        Update
      </button>
    </form>
  </div>

</body>
</html>
