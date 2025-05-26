<!doctype html>
<html lang="en">
  <head>
    <title>User Details</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />

    <style>
      body {
        background-color: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }

      .header-container {
        position: relative;
        text-align: center;
        margin-bottom: 30px;
      }

      .add-user-btn {
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
      }

      .table-container {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        overflow: hidden;
        background-color: white;
      }

      .table {
        margin: 0;
        border-collapse: collapse;
      }

      .table th, .table td {
        vertical-align: middle;
        text-align: center;
        padding: 14px 16px;
      }

      .table thead {
        background-color: #343a40;
        color: white;
      }

      .table tbody tr:hover {
        background-color: #f1f1f1;
        transition: background-color 0.3s;
      }

      .btn {
        border-radius: 20px;
        padding: 6px 20px;
      }
    </style>
  </head>
  <body>
    <div class="container mt-5">
      <div class="header-container">
        <h2>User Details</h2>
        <a href="{{url('/insert')}}" class="btn btn-success add-user-btn">Add User</a>
      </div>

      <div class="table-container">
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Address</th>
              <th>Gender</th>
              <th>Operations</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($var as $x)
              <tr>
                <td>{{ $x->name }}</td>
                <td>{{ $x->email }}</td>
                <td>{{ $x->address }}</td>
                <td>{{ $x->gender }}</td>
                <td>
                  <a href="{{ Route('user.edit', ['id' => $x->id]) }}" class="btn btn-primary">Update</a>
                  <a href="{{ url('/delete') }}/{{ $x->id }}" class="btn btn-danger">Delete</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
