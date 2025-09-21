<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Directory</title>
  <link rel="stylesheet" href="<?=base_url();?>/public/style.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-100 text-gray-800 font-sans">

  <!-- Navbar -->
  <nav class="bg-gradient-to-r from-blue-800 to-blue-400 shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4">
      <a href="#" class="text-white font-semibold text-xl tracking-wide">📊 User Management</a>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="max-w-6xl mx-auto mt-10 px-4">
    <div class="bg-white shadow-lg rounded-2xl p-6">
      
      <!-- Header -->
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">👥 User Directory</h1>

        <!-- Search Bar -->
        <form method="get" action="<?=site_url('/')?>" class="search-bar flex space-x-2">
          <input 
            type="text" 
            name="q" 
            value="<?=html_escape($_GET['q'] ?? '')?>" 
            placeholder="Search student..." 
            class="px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
          <button type="submit" 
                  class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            🔍 Search
          </button>
        </form>
      </div>
      
      <!-- Table -->
      <div class="overflow-x-auto rounded-xl border border-gray-200">
        <table class="w-full text-center border-collapse">
          <thead>
            <tr class="bg-gradient-to-r from-blue-800 to-blue-400 text-white">
              <th class="py-3 px-4">ID</th>
              <th class="py-3 px-4">Username</th>
              <th class="py-3 px-4">Email</th>
              <th class="py-3 px-4">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            <?php if (!empty($users)): ?>
              <?php foreach($users as $user): ?>
                <tr class="hover:bg-gray-50 transition duration-200">
                  <td class="py-3 px-4"><?=html_escape($user['id']);?></td>
                  <td class="py-3 px-4"><?=html_escape($user['username']);?></td>
                  <td class="py-3 px-4">
                    <span class="bg-blue-100 text-blue-700 text-sm font-medium px-3 py-1 rounded-full">
                      <?=html_escape($user['email']);?>
                    </span>
                  </td>
                  <td class="py-3 px-4 space-x-3">
                    <!-- Update Button -->
                    <a href="<?=site_url('users/update/'.$user['id']);?>"
                       class="px-3 py-1 text-sm rounded-lg bg-blue-100 text-blue-700 hover:bg-blue-700 hover:text-white transition duration-200 shadow-sm">
                      ✏️ Update
                    </a>
                    <!-- Delete Button -->
                    <a href="<?=site_url('users/delete/'.$user['id']);?>"
                       onclick="return confirm('Are you sure you want to delete this record?');"
                       class="px-3 py-1 text-sm rounded-lg bg-red-100 text-red-600 hover:bg-red-600 hover:text-white transition duration-200 shadow-sm">
                      🗑️ Delete
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="4" class="py-4 text-gray-500">No users found.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="mt-4 flex justify-center">
        <div class="pagination flex space-x-2">
            <?=$page ?? ''?>
        </div>
      </div>

      <!-- Button -->
      <div class="mt-6 text-right">
        <a href="<?=site_url('users/create')?>"
           class="inline-block bg-blue-700 hover:bg-blue-800 text-white font-medium px-6 py-2 rounded-full shadow-md transition duration-200">
          ➕ Create New User
        </a>
      </div>
    </div>
  </div>

</body>
</html>
