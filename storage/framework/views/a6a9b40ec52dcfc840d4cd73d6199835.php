<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/table.css')); ?>">
    <style>
        .form-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 30px;
            background-color: #f8f9fa;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .img-thumbnail {
            max-width: 150px;
            max-height: 150px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <?php echo $__env->make('sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="content">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <div id="content">
        <button type="button" id="sidebarToggle" class="btn">
            <i class="fas fa-bars"></i>
        </button>

        <div class="container" style="margin-left:12%; width:88%">
            <div class="form-container">
                <h2 class="mb-4 text-center">News Card <?php echo e(isset($editData) ? 'Edit' : 'Create'); ?></h2>
                <form action="<?php echo e(isset($editData) ? route('news.update', $editData->id) : route('news.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php if(isset($editData)): ?>
                        <?php echo method_field('PUT'); ?>
                    <?php endif; ?>
                    <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="image" class="form-label d-flex justify-content-start">Upload Image</label>
                        <?php if(isset($editData) && $editData->img): ?>
                            <img src="<?php echo e(asset('storage/' . $editData->img)); ?>" alt="Current Image" class="img-thumbnail" width="50px" height="50px">
                        <?php endif; ?>
                        <input type="file" class="form-control" id="image" name="image" <?php echo e(!isset($editData) ? 'required' : ''); ?>>
                    </div>
                    
                    <div class="mb-3 col-md-6">
                        <label for="title" class="form-label  d-flex justify-content-start">Title</label>
                        <input type="text" class="form-control" id="title" name="title" 
                               value="<?php echo e(isset($editData) ? $editData->title : old('title')); ?>" 
                               required placeholder="Enter Title">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="role" class="form-label  d-flex justify-content-start">Role</label>
                        <input type="text" class="form-control" id="role" name="role" 
                               value="<?php echo e(isset($editData) ? $editData->Role : old('role')); ?>" 
                               required placeholder="Enter Role">
                    </div>
                    
                    <div class="mb-3 col-md-6">
                        <label for="date" class="form-label  d-flex justify-content-start">Date (YYYY-MM-DD)</label>
                        <input type="date" class="form-control" id="date" name="date" 
                               value="<?php echo e(isset($editData) ? $editData->Date : old('date')); ?>" 
                               required>
                    </div>
                    
                    <div class="mb-3 col-md-12">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="2" 
                                  required maxlength="35" placeholder="Enter Content"><?php echo e(isset($editData) ? $editData->Content : old('content')); ?></textarea>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <?php echo e(isset($editData) ? 'Update' : 'Submit'); ?>

                    </button>
                    <?php if(isset($editData)): ?>
                        <a href="<?php echo e(route('news.index')); ?>" class="btn btn-secondary mt-2 w-100">Cancel</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>

        <div class="container" style="margin-left: 16%; width:84%; padding:0% 7%;">
        <div class="table-container">
            <div class="table-wrapper">
              <table>
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Role</th>
                    <th>Date</th>
                    <th>Content</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><img src="<?php echo e(asset('storage/' . $item->img)); ?>" alt="news image" height=100px width=100px></td>
                        <td><?php echo e($item->title); ?></td>
                        <td><?php echo e($item->Role); ?></td>
                        <td><?php echo e($item->Date); ?></td>
                        <td><?php echo e($item->Content); ?></td>
                        <td class="action-cell">
                            <a href="<?php echo e(Route('news.edit',['id'=>$item->id])); ?>" class="btn btn-action btn-edit" title="Edit">
                              <i class="fas fa-edit"></i> Edit
                            </a>
                            
                            <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-action btn-delete"><i class="fas fa-trash-alt"></i> Delete</button>
                          </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
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

            document.addEventListener("click", function (event) {
                if (window.innerWidth < 768 && !sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
                    sidebar.classList.remove("active");
                }
            });
        });
    </script>
<div id="id01" class="modal">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    <form class="modal-content" action="/action_page.php">
      <div class="container">
        <h1 class="d-flex justify-content-start" style="font-size: 1.5rem; font-weight:600; background: linear-gradient(to right, #ff6b6b, #ff8787);padding: 1.5rem 1.5rem 0.5rem;
  ;color:#fefefe; ">Confirm Deletion</h1>
          <i class="fas fa-exclamation-triangle warning-icon" style="font-weight: 900; font-size: 3rem;
      color: #ff6b6b;
      margin-bottom: 1rem;"></i>
        <p style="font-size: 1.1rem;">Are you sure you want to delete your account?</p>
  
        <div class="clearfix row" style="display: flex;" >
          <button type="button" class="btn btn-secondary col-md-5 " onclick="document.getElementById('id01').style.display='none'" style="margin-left: 5%;">Cancel</button>
          <a href="<?php echo e(url('/deleteNEWS')); ?>/<?php echo e($item->id); ?>" class="btn btn-action btn-delete col-md-5" style="margin-left: 4%;" title="Delete">
                        <i class="fas fa-trash-alt"></i> Delete
                      </a> 
        </div>
      </div>
    </form>
  </div>
  <?php if(session('success')): ?>
  <div id="success-alert" class="alert-popup">
    <i class="fa-solid fa-circle-check"></i> <?php echo e(session('success')); ?>

  </div>
<?php endif; ?>

<style>
  .alert-popup {
      position: fixed;
      top: 20px;
      right: 20px;
      background-color: #4caf50;
      color: white;
      padding: 20px 30px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      z-index: 9999;
      animation: fadeIn 0.5s;
      width: 300px;
      height: 70px;
  }

  @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-10px); }
      to { opacity: 1; transform: translateY(0); }
  }
</style>

<script>
  setTimeout(function() {
      let alert = document.getElementById('success-alert');
      if (alert) {
          alert.style.transition = 'opacity 0.5s ease';
          alert.style.opacity = '0';
          setTimeout(() => alert.remove(), 500); // Remove from DOM after fade out
      }
  }, 3000); // Show for 3 seconds
</script>

</body>
</html><?php /**PATH C:\xampp\htdocs\laravelproject\resources\views/News.blade.php ENDPATH**/ ?>