<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Update User</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    /* Background */
    body {
      margin: 0;
      padding: 0;
      font-family: "Poppins", sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #0b0c1b;
      overflow: hidden;
      position: relative;
    }

    /* Floating background squares */
    body::before {
      content: "";
      position: absolute;
      width: 100%;
      height: 100%;
      background: repeating-linear-gradient(
        45deg,
        transparent,
        transparent 50px,
        rgba(255, 255, 255, 0.02) 50px,
        rgba(255, 255, 255, 0.02) 100px
      );
      z-index: 0;
    }

    /* Card container */
    .form-card {
      position: relative;
      z-index: 10;
      background: #141625;
      border-radius: 12px;
      box-shadow: 0 0 25px rgba(0, 255, 255, 0.25);
      padding: 40px 35px;
      width: 350px;
      text-align: center;
      color: #fff;
    }

    /* Title */
    .form-card h1 {
      font-size: 1.8em;
      font-weight: 600;
      margin-bottom: 25px;
      color: #00e5ff;
      text-shadow: 0 0 10px #00e5ff;
    }

    /* Input fields */
    .form-group {
      margin-bottom: 18px;
      position: relative;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 12px 15px;
      border: none;
      border-radius: 6px;
      background: #1f2233;
      color: #fff;
      font-size: 0.95em;
      outline: none;
      transition: 0.3s;
    }

    .form-group input:focus,
    .form-group select:focus {
      box-shadow: 0 0 8px #00e5ff;
      border: 1px solid #00e5ff;
    }

    /* Password toggle icon */
    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #00e5ff;
    }

    /* Button styles */
    .btn-submit {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 6px;
      font-weight: 600;
      font-size: 1em;
      cursor: pointer;
      background: linear-gradient(90deg, #00ffcc, #00bfff);
      color: #000;
      box-shadow: 0 0 15px rgba(0, 255, 255, 0.5);
      transition: 0.3s;
    }

    .btn-submit:hover {
      box-shadow: 0 0 25px rgba(0, 255, 255, 0.8);
      transform: scale(1.03);
    }

    /* Return button */
    .btn-return {
      display: block;
      margin-top: 20px;
      color: #00e5ff;
      text-decoration: none;
      font-size: 0.9em;
      transition: 0.3s;
    }

    .btn-return:hover {
      text-shadow: 0 0 8px #00e5ff;
    }
  </style>
</head>
<body>
  <div class="form-card">
    <h1>Update User</h1>
    <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST">
      <div class="form-group">
        <input type="text" name="username" value="<?=html_escape($user['username']);?>" placeholder="Username" required>
      </div>
      <div class="form-group">
        <input type="email" name="email" value="<?=html_escape($user['email']);?>" placeholder="Email" required>
      </div>

      <?php if(!empty($logged_in_user) && $logged_in_user['role'] === 'admin'): ?>
        <div class="form-group">
          <select name="role" required>
            <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
          </select>
        </div>

        <div class="form-group">
          <input type="password" placeholder="Password" name="password" id="password" required>
          <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
        </div>
      <?php endif; ?>

      <button type="submit" class="btn-submit">Update User</button>
    </form>
    <a href="<?=site_url('/users');?>" class="btn-return">Return to Home</a>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    if (togglePassword) {
      togglePassword.addEventListener('click', function () {
        const type = password.type === 'password' ? 'text' : 'password';
        password.type = type;
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }
  </script>
</body>
</html>
