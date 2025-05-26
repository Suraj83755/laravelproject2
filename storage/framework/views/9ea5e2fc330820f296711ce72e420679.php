<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit News</title>
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
            width: 120px;
            height: auto;
            display: block;
            margin-bottom: 10px;
            border-radius: 8px;
            border: 1px solid #dee2e6;
        }
        h4 {
            font-weight: bold;
            color: #fff;
        }
        .form-control, textarea.form-control {
            border-radius: 10px;
        }
        .card-header {
            background-color: #4a69bd;
            border-radius: 1rem 1rem 0 0 !important;
        }
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="mb-0 text-center">Edit News Content</h4>
                </div>
                <div class="card-body p-5">
                    <form action="<?php echo e(route('news.update', $items->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Image</label>
                            <?php if($items->image): ?>
                                <img src="<?php echo e(asset('storage/'.$items->img)); ?>" alt="Current Image" class="current-image">
                            <?php endif; ?>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required value="<?php echo e($items->title); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <input type="text" class="form-control" id="role" name="role" required value="<?php echo e($items->Role); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" required value="<?php echo e($items->Date); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="5" required><?php echo e($items->Content); ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravelproject\resources\views/editnews.blade.php ENDPATH**/ ?>