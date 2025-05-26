<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Responsive Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/table.css')); ?>">
  
  <style>
    .form-container {
      margin: 50px auto;
      padding: 30px;
      background-color: #f8f9fa;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .status {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

  </style>
  
</head>
<body>
  <?php echo $__env->make('sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="content">
      <?php echo $__env->yieldContent('content'); ?>
  </div>
  
  <div class="container" style="margin-left: 16%; width:84%;">
    <div class="form-container" style="width:89%;" >
      <h4 class="mb-4 text-center">Hero Section Changes</h4>

      <form method="post" action="<?php echo e(isset($editData) ? route('icon.update', $editData->id) : route('icon.store')); ?>" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <?php if(isset($editData)): ?>
              <?php echo method_field('PUT'); ?>
          <?php endif; ?>
          
          <!-- Image Upload -->
          <div class="row">
          <div class="mb-3 col-md-6">
              <label for="image" class="form-label d-flex justify-content-start">Upload Image</label>
              <input type="file" class="form-control" id="image" name="image" accept="image/*" <?php echo e(!isset($editData) ? 'required' : ''); ?>>
              <?php if(isset($editData) && $editData->image): ?>
                  <div class="mt-2">
                      <p>Current Image:</p>
                      <img src="<?php echo e(asset('storage/' . $editData->image)); ?>" width="100" height="100" class="img-thumbnail">
                  </div>
              <?php endif; ?>
          </div>
          
  
          <!-- Dropdown -->
          <div class="mb-3 col-md-6 ">
              <label for="category" class="form-label d-flex justify-content-start">Category</label>
              <select class="form-select" id="category" name="category" required>
                  <option value="">Select a category</option>
                  <option value="restaurant" <?php echo e((isset($editData) && $editData->type == 'restaurant') ? 'selected' : ''); ?>>Restaurant</option>
                  <option value="destination" <?php echo e((isset($editData) && $editData->type == 'destination') ? 'selected' : ''); ?>>Destination</option>
                  <option value="hotels" <?php echo e((isset($editData) && $editData->type == 'hotels') ? 'selected' : ''); ?>>Hotels</option>
                  <option value="healthcare" <?php echo e((isset($editData) && $editData->type == 'healthcare') ? 'selected' : ''); ?>>Healthcare</option>
                  <option value="automation" <?php echo e((isset($editData) && $editData->type == 'automation') ? 'selected' : ''); ?>>Automation</option>
              </select>
          </div>
  
          <!-- Text Input -->
          <div class="mb-3 ">
              <label for="description" class="form-label">Listings</label>
              <input type="text" class="form-control" id="description" name="no_of_listing" 
                     value="<?php echo e(isset($editData) ? $editData->no_of_listing : old('no_of_listing')); ?>" 
                     placeholder="Enter No of Listings" required>
          </div>
          </div>
  
          <!-- Submit Button -->
          <button type="submit" class="btn btn-primary w-100">
              <?php echo e(isset($editData) ? 'Update' : 'Submit'); ?>

          </button>
          
          <?php if(isset($editData)): ?>
              <a href="<?php echo e(route('icon.index')); ?>" class="btn btn-secondary w-100 mt-2">Cancel</a>
          <?php endif; ?>
      </form>
    </div>
  </div>


  <div class="container">
  <div class="table-container" style="margin-left: 16%; width:84%">
    <div class="table-wrapper">
      <table>
        <thead>
          <tr>
            <th>Image</th>
            <th>Type</th>
            <th>No_of_listing</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $var; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $y): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><img src="<?php echo e(asset('storage/' . $y->image)); ?>" alt="explore image" width="100px" height="100px"></td>
            <td><?php echo e($y->type); ?></td>
            <td><?php echo e($y->no_of_listing); ?></td>
            <td>
              <label class="status">
                <input type="checkbox" name="is_active" class="is_active" onchange="checkStatus(this)" id=<?php echo e($y->id); ?>>
                <span class="slider round"></span>
              </label>
            </td>
            <td class="action-cell">
              <a href="<?php echo e(Route('icon.edit',['id'=>$y->id])); ?>" class="btn btn-action btn-edit" title="Edit">
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
          <a href="<?php echo e(url('/deleteICON')); ?>/<?php echo e($y->id); ?>" class="btn btn-action btn-delete col-md-5" style="margin-left: 4%;" title="Delete">
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  function checkStatus(checkbox) {
    const id = checkbox.id; // The ID from Blade: <?php echo e($y->id); ?>

    const isActive = checkbox.checked ? 1 : 0;

    $.ajax({
      url: '/active',
      method: 'POST',
      data: {
        id: id,
        is_active: isActive,
        _token: '<?php echo e(csrf_token()); ?>' 
      },
      success: function(response) {
        console.log('Status updated:', response);
      },
      error: function(xhr) {
        console.error('Error updating status:', xhr.responseText);
      }
    });
  }
</script>

</body>
</html><?php /**PATH C:\xampp\htdocs\laravelproject\resources\views/icon.blade.php ENDPATH**/ ?>