<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            /* background: #f4f7f8; */
            background: linear-gradient(135deg, #c3ecff, #e4d9ff);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .form {
            background-color: #fff;
            display: block;
            padding: 2rem;
            max-width: 350px;
            width: 100%;
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
                        0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .form-title {
            font-size: 1.25rem;
            line-height: 1.75rem;
            font-weight: 600;
            text-align: center;
            color: #000;
            margin-bottom: 1rem;
        }

        .input-container {
            position: relative;
            margin-right: 30px;
        }

        .input-container input {
            background-color: #fff;
            padding: 1rem;
            font-size: 0.875rem;
            line-height: 1.25rem;
            width: 100%;
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            margin: 8px 0;
            outline: none;
        }

        .submit {
            display: block;
            padding: 0.75rem 1.25rem;
            background-color: #4F46E5;
            color: #ffffff;
            font-size: 0.875rem;
            font-weight: 500;
            width: 100%;
            border: none;
            border-radius: 0.5rem;
            text-transform: uppercase;
            cursor: pointer;
            margin-top: 1rem;
        }

        .submit:hover {
            background-color: #4338ca;
        }

        .signup-link {
            color: #6B7280;
            font-size: 0.875rem;
            text-align: center;
            margin-top: 1rem;
        }

        .signup-link a {
            text-decoration: underline;
            color: #4F46E5;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
            text-align: center;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <form method="POST" action="<?php echo e(route('login')); ?>" class="form">
        <p class="form-title">Login to your account</p>

        <?php if($errors->any()): ?>
            <div class="error-message">
                <?php echo e($errors->first()); ?>

            </div>
        <?php endif; ?>

        <?php echo csrf_field(); ?>
        <div class="input-container">
            <input type="email" name="email" placeholder="Enter email" required>
        </div>
        <div class="input-container">
            <input type="password" name="password" placeholder="Enter password" required>
        </div>

        <button type="submit" class="submit">Sign in</button>

        <p class="signup-link">
            No account?
            <a href="<?php echo e(url('/signform')); ?>">Sign up</a>
        </p>
    </form>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravelproject\resources\views/auth/login.blade.php ENDPATH**/ ?>