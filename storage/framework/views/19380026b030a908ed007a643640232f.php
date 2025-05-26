<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Icon Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #74ebd5, #acb6e5);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            border-radius: 1rem;
            background-color: #fff;
        }
        .form-label {
            font-weight: 600;
        }
        .btn-primary {
            background-color: #4a69bd;
            border: none;
        }
        .btn-primary:hover {
            background-color: #1e3799;
        }
        .current-image {
            display: block;
            margin-bottom: 10px;
            border-radius: 10px;
            max-height: 100px;
        }
        h4 {
            font-weight: bold;
            color: #2c3e50;
        }
        .form-control, .form-select {
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="col-md-6">
            <div class="card shadow p-5">
                <h4 class="text-center mb-4">Update Icon Info</h4>
                <form method="POST" action="<?php echo e(route('icon.update', $items->id)); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <!-- Image Upload -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Current Image</label><br>
                        <?php if($items->image): ?>
                            <img src="<?php echo e(asset('storage/'.$items->image)); ?>" class="current-image">
                        <?php endif; ?>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>

                    <!-- Dropdown -->
                    <div class="mb-3">
                        <label for="type" class="form-label">Category</label>
                        <select class="form-select" id="type" name="type" required>
                            <option value="">Select a category</option>
                            <option value="restaurant" <?php echo e($items->type == 'restaurant' ? 'selected' : ''); ?>>Restaurant</option>
                            <option value="destination" <?php echo e($items->type == 'destination' ? 'selected' : ''); ?>>Destination</option>
                            <option value="hotels" <?php echo e($items->type == 'hotels' ? 'selected' : ''); ?>>Hotels</option>
                            <option value="healthcare" <?php echo e($items->type == 'healthcare' ? 'selected' : ''); ?>>Healthcare</option>
                            <option value="automation" <?php echo e($items->type == 'automation' ? 'selected' : ''); ?>>Automation</option>
                        </select>
                    </div>

                    <!-- Listings Input -->
                    <div class="mb-3">
                        <label for="no_of_listing" class="form-label">Number of Listings</label>
                        <input type="text" class="form-control" id="no_of_listing" name="no_of_listing" 
                            placeholder="Enter number of listings" required value="<?php echo e($items->no_of_listing); ?>">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100">Update</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravelproject\resources\views/editicon.blade.php ENDPATH**/ ?>