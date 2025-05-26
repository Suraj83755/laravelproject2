<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Header Card</title>
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
            max-width: 120px;
            height: auto;
            display: block;
            margin-bottom: 10px;
            border-radius: 8px;
        }
        h2 {
            font-weight: bold;
            color: #fff;
        }
        .form-control {
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="col-md-6">
            <div class="card shadow p-5">
                <h3 class="text-center mb-4">Edit Header Card</h3>
                <form action="<?php echo e(route('card.update', $items->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="mb-3">
                        <label for="cardtitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="cardtitle" name="cardtitle" required value="<?php echo e($items->title); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="cardtext" class="form-label">Text</label>
                        <input type="text" class="form-control" id="cardtext" name="cardtext" required value="<?php echo e($items->content); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image</label>
                        <?php if($items->image): ?>
                            <img src="<?php echo e(asset('storage/'.$items->image)); ?>" alt="Current Image" class="current-image">
                        <?php endif; ?>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Update Card</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravelproject\resources\views/editcard.blade.php ENDPATH**/ ?>