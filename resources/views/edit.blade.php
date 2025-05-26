<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information Form</title>
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
        h3 {
            font-weight: bold;
            color: #2c3e50;
        }
        .form-control, .form-select, textarea.form-control {
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="col-md-6">
            <div class="card shadow p-5">
                <h3 class="text-center mb-4">User Information</h3>
                <form action="{{ route('user.update', $item->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="{{$item->name}}">
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="{{$item->email}}">
                    </div>
                    
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address">{{$item->address}}</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender">
                            <option value="Male"{{ $item->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female"{{ $item->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other"{{ $item->gender == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100">Update</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>