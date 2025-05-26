<html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  </head>
  <body>
    
<div class="sidebar" style="width: 16%;">
    <div class="sidebar-header">
      <h1>Dashboard</h1>
    </div>
    
    <nav class="sidebar-nav">
      <ul>
        <li class="<?php echo e(request()->is('dashboard') ? 'active' : ''); ?>">
          <a href="/dashboard"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
        </li>
        <li class="<?php echo e(request()->is('showicon*') ? 'active' : ''); ?>">
          <a href="/showicon"><i class="fas fa-users"></i>Icon</a>
        </li>
        <li class="<?php echo e(request()->is('card*') ? 'active' : ''); ?>">
          <a href="/card"><i class="fas fa-box"></i>Card</a>
        </li>
        <li class="<?php echo e(request()->is('news*') ? 'active' : ''); ?>">
          <a href="/news"><i class="fa-solid fa-envelope"></i></i>News</a>
        </li>
        <li class="<?php echo e(request()->is('explore*') ? 'active' : ''); ?>">
          <a href="/explore"><i class="fas fa-chart-bar"></i>Explore</a>
        </li>
        <li class="<?php echo e(request()->is('footer*') ? 'active' : ''); ?>">
          <a href="/footer"><i class="fas fa-cog"></i>Footer</a>
        </li>
      </ul>
    </nav>
  
    <div class="sidebar-footer">
      <form method="POST" action="<?php echo e(route('logout')); ?>">
        <?php echo csrf_field(); ?>
        <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); this.closest('form').submit();">
          <i class="fas fa-sign-out-alt"></i>Logout
        </a>
      </form>
    </div>
  </div>
  
  <style>
    .sidebar {
      width: 250px;
      background-color: #2d3748;
      color: white;
      display: flex;
      flex-direction: column;
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
    }
  
    .sidebar-header {
      padding: 20px;
      border-bottom: 1px solid #4a5568;
    }
  
    .sidebar-header h1 {
      font-size: 1.25rem;
      font-weight: bold;
      margin: 0;
    }
  
    .sidebar-nav {
      flex: 1;
      overflow-y: auto;
      padding: 10px 0;
    }
  
    .sidebar-nav ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }
  
    .sidebar-nav li {
      padding: 10px 20px;
      transition: background-color 0.3s;
    }
  
    .sidebar-nav li:hover {
      background-color: #4a5568;
    }
  
    .sidebar-nav li.active {
      background-color: #4299e1;
    }
  
    .sidebar-nav a {
      display: flex;
      align-items: center;
      color: inherit;
      text-decoration: none;
      font-size: 14px;
    }
  
    .sidebar-nav i {
      margin-right: 10px;
      width: 20px;
      text-align: center;
    }
  
    .sidebar-footer {
      padding: 15px 20px;
      border-top: 1px solid #4a5568;
    }
  
    .sidebar-footer a {
      display: flex;
      align-items: center;
      color: #fc8181;
      text-decoration: none;
      font-size: 14px;
      transition: color 0.3s;
    }
  
    .sidebar-footer a:hover {
      color: #feb2b2;
    }
  
    .sidebar-footer i {
      margin-right: 10px;
    }
  
    .sidebar-footer form {
      margin: 0;
    }
  </style>
  </body>
</html><?php /**PATH C:\xampp\htdocs\laravelproject\resources\views/sidebar.blade.php ENDPATH**/ ?>