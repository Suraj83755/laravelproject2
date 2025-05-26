<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/table.css')); ?>">
    <style>
        .form-container {
            max-width: 600px;
            margin: 30px auto;
            padding: 30px;
            background-color: #f8f9fa;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <?php echo $__env->make('sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="content">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <div id="content" style="margin-left: 12%; width:88%;">
        <button id="sidebarToggle" class="btn"><i class="fas fa-bars"></i></button>
        <div class="container mt-5">
            <div class="form-container">
                <h2 class="text-center mb-4">Footer <?php echo e(isset($editData) ? 'Edit' : 'Create'); ?></h2>
                <form method="post" action="<?php echo e(isset($editData) ? route('footer.update', $editData->id) : route('footer.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php if(isset($editData)): ?>
                        <?php echo method_field('PUT'); ?>
                    <?php endif; ?>
                    <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="content" class="form-label  d-flex justify-content-start">Content</label>
                        <input type="text" class="form-control w-100" id="content" name="content" 
                               value="<?php echo e(isset($editData) ? $editData->Content : old('content')); ?>" 
                               required maxlength="20" placeholder="Content Here">
                    </div>                                    
                    <div class="mb-3 col-md-6">
                        <label for="mobileno" class="form-label  d-flex justify-content-start">Mobile No</label>
                        <input type="number" class="form-control" id="mobileno" name="mobileno" 
                               value="<?php echo e(isset($editData) ? $editData->Mobile_No : old('mobileno')); ?>" 
                               required placeholder="Mobile No here">
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <?php echo e(isset($editData) ? 'Update' : 'Submit'); ?>

                    </button>
                    
                    <?php if(isset($editData)): ?>
                        <a href="<?php echo e(route('footer.index')); ?>" class="btn btn-secondary w-100 mt-2">Cancel</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

    <div class="container" style="margin-left: 16%; width:84%; padding:2% 6%; text-align:left;" >
    <div class="table-container" >
        <div class="table-wrapper">
          <table>
            <thead>
              <tr>
                <th>Content</th>
                <th>Mobile</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $foot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr >
                <td><?php echo e($item->Content); ?></td>
                <td><?php echo e($item->Mobile_No); ?></td>
                <td class="action-cell">
                  <a href="<?php echo e(Route('footer.edit',['id'=>$item->id])); ?>" class="btn btn-action btn-edit" title="Edit">
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
              <a href="<?php echo e(url('/deleteFOOTER')); ?>/<?php echo e($item->id); ?>" class="btn btn-action btn-delete col-md-5" style="margin-left: 4%;" title="Delete">
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
</html><?php /**PATH C:\xampp\htdocs\laravelproject\resources\views/footer.blade.php ENDPATH**/ ?>