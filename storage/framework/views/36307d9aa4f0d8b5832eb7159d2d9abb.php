<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Explore Card</title>
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
            border-radius: 8px;
            border: 1px solid #ddd;
            max-height: 100px;
        }
        h2 {
            font-weight: bold;
            color: #2c3e50;
        }
        .form-control, .form-select, textarea.form-control {
            border-radius: 10px;
        }
        .form-check-input:checked {
            background-color: #4a69bd;
            border-color: #4a69bd;
        }
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="col-lg-8">
            <div class="card shadow p-5">
                <h2 class="text-center mb-4">Update Explore Card</h2>
                <form action="<?php echo e(route('explore.update', $items->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <!-- Primary Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Primary Image</label>
                        <?php if($items->image): ?>
                            <img src="<?php echo e(asset('storage/'.$items->image)); ?>" alt="Current Image" class="current-image">
                        <?php endif; ?>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>

                    <!-- Type -->
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-select" id="type" name="type" required>
                            <option value="">Select Type</option>
                            <option value="best_rated" <?php echo e($items->type == 'best_rated' ? 'selected' : ''); ?>>Best Rated</option>
                            <option value="featured" <?php echo e($items->type == 'featured' ? 'selected' : ''); ?>>Featured</option>
                            <option value="most_view" <?php echo e($items->type == 'most_view' ? 'selected' : ''); ?>>Most View</option>
                        </select>
                    </div>

                    <!-- Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo e($items->title); ?>" required>
                    </div>

                    <!-- Rating -->
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating (e.g. 4.9)</label>
                        <input type="number" class="form-control" id="rating" name="rating" value="<?php echo e($items->rating); ?>" step="0.1" min="0" max="5" required>
                    </div>

                    <!-- Number of Ratings -->
                    <div class="mb-3">
                        <label for="no_of_ratings" class="form-label">Number of Ratings</label>
                        <input type="number" class="form-control" id="no_of_ratings" name="no_of_ratings" value="<?php echo e($items->no_of_ratings); ?>" required>
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Price (e.g. 5$ - 100$)</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo e($items->price); ?>" required>
                    </div>

                    <!-- Extra Text -->
                    <div class="mb-3">
                        <label for="extra_text" class="form-label">More Content</label>
                        <input type="text" class="form-control" id="extra_text" name="extra_text" value="<?php echo e($items->extra_text); ?>" maxlength="70">
                    </div>

                    <!-- Secondary Image -->
                    <div class="mb-3">
                        <label for="secondary_image" class="form-label">Secondary Image</label>
                        <?php if($items->profilepic): ?>
                            <img src="<?php echo e(asset('storage/'.$items->profilepic)); ?>" alt="Secondary Image" class="current-image">
                        <?php endif; ?>
                        <input type="file" class="form-control" id="secondary_image" name="secondary_image">
                    </div>

                    <!-- Content -->
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="4" maxlength="70"><?php echo e($items->content); ?></textarea>
                    </div>

                    <!-- Status -->
                    <div class="mb-4">
                        <label class="form-label d-block">Status</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="open" value="open" <?php echo e($items->status == 'open' ? 'checked' : ''); ?>>
                            <label class="form-check-label" for="open">Open Now</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="close" value="close" <?php echo e($items->status == 'close' ? 'checked' : ''); ?>>
                            <label class="form-check-label" for="close">Close Now</label>
                        </div>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary w-100">Update</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravelproject\resources\views/editexplore.blade.php ENDPATH**/ ?>