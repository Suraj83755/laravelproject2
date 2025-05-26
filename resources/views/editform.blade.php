<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="col-md-6">
            <div class="card shadow p-5">
                <h2 class="text-center mb-4">Signup Form</h2>
                <form action="{{route('users.update',$items->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required value="{{$items->Name}}">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="age" name="age" required value="{{$items->Age}}">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required value="{{$items->email}}">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required >
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" name="gender" id="gender">
                            <option value="Male" {{ $items->Gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $items->Gender == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ $items->Gender == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update</button>
                </form>
        </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
