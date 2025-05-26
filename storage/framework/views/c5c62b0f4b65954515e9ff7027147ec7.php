<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            min-height: 100vh;
        }
        #sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            background: #2c3e50;
            color: #fff;
            transition: all 0.3s;
            z-index: 1000;
            overflow-y: auto;
        }
        #sidebar .sidebar-header {
            padding: 20px;
            background: #34495e;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        #sidebar ul {
            padding: 0;
            list-style: none;
        }
        #sidebar ul li a {
            padding: 15px;
            display: block;
            color: #fff;
            text-decoration: none;
            transition: 0.3s;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        #sidebar ul li a:hover {
            background: #34495e;
        }
        #content {
            margin-left: 250px;
            transition: all 0.3s;
            padding: 20px;
            min-height: 100vh;
        }
        #sidebarToggle {
            display: none;
            background: #2c3e50;
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-size: 1.2rem;
            cursor: pointer;
            margin-bottom: 20px;
            position: fixed;
            z-index: 999;
        }
        .table-container {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        .table th {
            background-color: #4CAF50;
            color: white;
        }
        .table td img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 4px;
        }
        @media (max-width: 768px) {
            #sidebar {
                left: -250px;
            }
            #sidebar.active {
                left: 0;
            }
            #content {
                margin-left: 0;
            }
            #sidebarToggle {
                display: block;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
  <?php echo $__env->make('sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <div class="content">
      <?php echo $__env->yieldContent('content'); ?>
  </div>

    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">
            <!-- Header Card Edit Form -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-primary text-white">
                            <h2 class="mb-0">Header Card Edit</h2>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo e(url('/data')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="mb-3">
                                    <label for="cardtitle" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="cardtitle" name="cardtitle" required>
                                </div>
                                <div class="mb-3">
                                    <label for="cardtext" class="form-label">Text</label>
                                    <input type="text" class="form-control" id="cardtext" name="cardtext" required maxlength="30">
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Upload Image</label>
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card shadow table-container">
                        <div class="card-header" style="background-color: #4CAF50">
                            <h2 class="mb-0" >Content Management</h2>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $var; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $y): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($y->title); ?></td>
                                            <td style="width: 40%;"><?php echo e(\Illuminate\Support\Str::limit($y->content, 80)); ?></td>

                                            <td><img src="<?php echo e(asset('storage/' . $y->image)); ?>" alt="explore image"></td>
                                            <td>
                                                <a href="<?php echo e(Route('card.edit',['id'=>$y->id])); ?>" class="btn btn-primary" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="<?php echo e(url('/deleteCARD')); ?>/<?php echo e($y->id); ?>" class="btn btn-danger" title="Delete">
                                                    <i class="fas fa-trash-alt"></i>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const sidebar = document.getElementById("sidebar");
            const sidebarToggle = document.getElementById("sidebarToggle");
            const sidebarClose = document.getElementById("sidebarClose");

            sidebarToggle.addEventListener("click", function () {
                sidebar.classList.toggle("active");
            });

            sidebarClose.addEventListener("click", function () {
                sidebar.classList.remove("active");
            });

            // Close sidebar when clicking outside on mobile
            document.addEventListener("click", function (event) {
                const isClickInsideSidebar = sidebar.contains(event.target);
                const isClickOnToggle = sidebarToggle.contains(event.target);
                
                if (window.innerWidth < 768 && !isClickInsideSidebar && !isClickOnToggle) {
                    sidebar.classList.remove("active");
                }
            });
        });
    </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravelproject\resources\views//card.blade.php ENDPATH**/ ?>