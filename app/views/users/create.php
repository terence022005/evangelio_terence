<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create User</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-emerald-400 to-teal-600 min-h-screen flex items-center justify-center">

  <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md">
    <h1 class="text-2xl font-bold text-center mb-6 text-gray-700">Create User</h1>

    <form action="<?= site_url('users/create'); ?>" method="POST" class="space-y-4">
      <div>
        <label for="username" class="block font-medium">Username</label>
        <input type="text" name="username" id="username" required
          class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500">
      </div>

      <div>
        <label for="email" class="block font-medium">Email</label>
        <input type="email" name="email" id="email" required
          class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500">
      </div>

      <button type="submit" 
        class="w-full bg-emerald-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-emerald-700 transition">
        Save
      </button>
    </form>
  </div>

</body>
</html>
