<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-emerald-400 to-teal-600 min-h-screen flex items-center justify-center">

  <div class="bg-white shadow-2xl rounded-2xl p-10 w-full max-w-5xl border border-gray-200">
    <!-- Header -->
    <h1 class="text-3xl font-extrabold text-center mb-8 text-emerald-700 tracking-wide">User Records</h1>

    <div class="overflow-x-auto rounded-xl border border-gray-200 shadow-sm">
      <table class="w-full border-collapse">
        <thead>
          <tr class="bg-gradient-to-r from-emerald-500 to-teal-600 text-white text-left">
            <th class="px-6 py-3 border">ID</th>
            <th class="px-6 py-3 border">Username</th>
            <th class="px-6 py-3 border">Email</th>
            <th class="px-6 py-3 border">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <?php foreach (html_escape($users) as $user): ?> 
            <tr class="hover:bg-emerald-50 transition duration-200">
              <td class="px-6 py-3 border text-center font-medium text-gray-700"><?= $user['id']; ?></td>
              <td class="px-6 py-3 border text-gray-800"><?= $user['username']; ?></td>
              <td class="px-6 py-3 border text-gray-600"><?= $user['email']; ?></td>
              <td class="px-6 py-3 border text-center">
                <a href="<?= site_url('users/update/'.$user['id']); ?>" 
                   class="text-blue-600 font-semibold hover:text-blue-800 transition">Update</a> | 
                <a href="<?= site_url('users/delete/'.$user['id']); ?>" 
                   class="text-red-600 font-semibold hover:text-red-800 transition">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Create Button -->
    <div class="mt-6 text-center">
      <a href="<?= site_url('users/create');?>" 
         class="inline-block bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-6 py-3 rounded-lg shadow-md font-bold hover:from-emerald-700 hover:to-teal-700 hover:shadow-lg transition">
        + Create New Record
      </a>
    </div>
  </div>
</body>
</html>
