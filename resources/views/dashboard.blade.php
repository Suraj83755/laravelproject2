<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/table.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    :root {
      --gray-100: #f7fafc;
      --gray-200: #edf2f7;
      --gray-300: #e2e8f0;
      --gray-400: #cbd5e0;
      --gray-500: #a0aec0;
      --gray-600: #718096;
      --gray-700: #4a5568;
      --gray-800: #2d3748;
      --gray-900: #1a202c;
      
      --blue-100: #ebf8ff;
      --blue-500: #4299e1;
      --blue-600: #3182ce;
      
      --green-100: #f0fff4;
      --green-500: #48bb78;
      --green-600: #38a169;
      
      --yellow-100: #fffff0;
      --yellow-500: #ecc94b;
      
      --red-100: #fff5f5;
      --red-400: #fc8181;
      --red-500: #f56565;
      --red-600: #e53e3e;
      
      --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    }

    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      background-color: var(--gray-100);
      display: flex;
      height: 100vh;
      margin: 0;
    }

    /* Main Content Styles */
    .main-content {
      flex: 1;
      overflow-y: auto;
    }

    .content-container {
      padding: 1.5rem;
    }

    /* Stats Cards */
    .bento-grid {
      display: grid;
      grid-template-columns: repeat(1, 1fr);
      gap: 1rem;
      margin-bottom: 1.5rem;
    }

    @media (min-width: 768px) {
      .bento-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (min-width: 1024px) {
      .bento-grid {
        grid-template-columns: repeat(4, 1fr);
      }
    }

    .stats-card {
      background-color: white;
      padding: 1.5rem;
      border-radius: 0.5rem;
      box-shadow: var(--shadow);
    }

    .card-content {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .card-label {
      color: var(--gray-500);
      font-size: 0.875rem;
    }

    .card-content h3 {
      font-size: 1.5rem;
      font-weight: bold;
      margin: 0.25rem 0;
    }

    .card-icon {
      padding: 0.75rem;
      border-radius: 9999px;
    }

    .card-icon i {
      font-size: 1.25rem;
    }

    .bg-blue {
      background-color: var(--blue-100);
    }

    .bg-blue i {
      color: var(--blue-500);
    }

    .bg-green {
      background-color: var(--green-100);
    }

    .bg-green i {
      color: var(--green-500);
    }

    .bg-yellow {
      background-color: var(--yellow-100);
    }

    .bg-yellow i {
      color: var(--yellow-500);
    }

    .bg-red {
      background-color: var(--red-100);
    }

    .bg-red i {
      color: var(--red-500);
    }

    .card-trend {
      margin-top: 0.5rem;
      font-size: 0.875rem;
    }

    .positive {
      color: var(--green-600);
    }

    .negative {
      color: var(--red-600);
    }

    /* Search and Table Section */
    .search-container {
      padding: 1rem;
      background-color: white;
      border-radius: 0.5rem;
      box-shadow: var(--shadow);
      margin-bottom: 1.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .search-wrapper {
      display: flex;
      align-items: center;
      flex: 1;
      max-width: 600px;
    }

    .search-input {
      flex: 1;
      padding: 0.5rem 1rem;
      border: 1px solid var(--gray-300);
      border-radius: 0.375rem 0 0 0.375rem;
      outline: none;
      font-size: 1rem;
    }

    .search-input:focus {
      border-color: var(--blue-500);
      box-shadow: 0 0 0 2px rgba(66, 153, 225, 0.5);
    }

    .search-button {
      background-color: var(--blue-500);
      color: white;
      padding: 0.5rem 1rem;
      border: none;
      border-radius: 0 0.375rem 0.375rem 0;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .search-button:hover {
      background-color: var(--blue-600);
    }

    .search-button i {
      margin-right: 0.5rem;
    }

    .back-button {
      background-color: var(--gray-500);
      color: white;
      padding: 0.5rem 1rem;
      border: none;
      border-radius: 0.375rem;
      cursor: pointer;
      transition: background-color 0.3s;
      margin-left: 1rem;
      display: flex;
      align-items: center;
    }

    .back-button:hover {
      background-color: var(--gray-600);
    }

    .back-button i {
      margin-right: 0.5rem;
    }

    /* Table Styles */
    .table-container {
      background-color: white;
      border-radius: 0.5rem;
      box-shadow: var(--shadow);
      overflow: hidden;
    }

    .table-wrapper {
      overflow-x: auto;
    }

    table {
      width: 100%;
      min-width: 100%;
      border-collapse: separate;
      border-spacing: 0;
    }

    thead {
      background-color: var(--gray-800);
    }

    th {
      padding: 0.75rem 1.5rem;
      text-align: left;
      font-size: 0.75rem;
      font-weight: 500;
      color: white;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    td {
      padding: 1rem 1.5rem;
      font-size: 0.875rem;
      color: var(--gray-700);
      border-bottom: 1px solid var(--gray-200);
    }

    tbody tr:nth-child(odd) {
      background-color: white;
    }

    tbody tr:nth-child(even) {
      background-color: var(--gray-50);
    }

    tbody tr:hover {
      background-color: var(--gray-100);
    }

    .action-cell {
      white-space: nowrap;
    }

    .btn-action {
      padding: 0.375rem 0.75rem;
      border-radius: 0.25rem;
      font-size: 0.875rem;
      margin-right: 0.5rem;
    }

    .btn-edit {
      background-color: var(--blue-500);
      color: white;
      border: none;
    }

    .btn-edit:hover {
      background-color: var(--blue-600);
      color: white;
    }

    .btn-delete {
      background-color: var(--red-500);
      color: white;
      border: none;
    }

    .btn-delete:hover {
      background-color: var(--red-600);
      color: white;
    }

    /* Pagination */
    .pagination-container {
      padding: 1rem;
      display: flex;
      justify-content: center;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
      .search-container {
        flex-direction: column;
        align-items: stretch;
      }
      
      .search-wrapper {
        margin-bottom: 1rem;
        max-width: 100%;
      }
      
      .back-button {
        margin-left: 0;
        justify-content: center;
      }
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  @include('sidebar')

  <div class="content" style="margin-left: 16%; width:84%;" >
    <div class="main-content">
      <div class="content-container">
        <!-- Stats Cards -->
        <div class="bento-grid">
          <!-- Card 1 -->
          <div class="stats-card">
            <div class="card-content">
              <div>
                <p class="card-label">Total Users</p>
                <h3>1,254</h3>
              </div>
              <div class="card-icon bg-blue">
                <i class="fas fa-users"></i>
              </div>
            </div>
            <p class="card-trend positive">
              <i class="fas fa-arrow-up"></i> 12% from last month
            </p>
          </div>

          <!-- Card 2 -->
          <div class="stats-card">
            <div class="card-content">
              <div>
                <p class="card-label">Active Users</p>
                <h3>892</h3>
              </div>
              <div class="card-icon bg-green">
                <i class="fas fa-user-check"></i>
              </div>
            </div>
            <p class="card-trend positive">
              <i class="fas fa-arrow-up"></i> 8% from last month
            </p>
          </div>

          <!-- Card 3 -->
          <div class="stats-card">
            <div class="card-content">
              <div>
                <p class="card-label">New Users</p>
                <h3>56</h3>
              </div>
              <div class="card-icon bg-yellow">
                <i class="fas fa-user-plus"></i>
              </div>
            </div>
            <p class="card-trend negative">
              <i class="fas fa-arrow-down"></i> 3% from last month
            </p>
          </div>

          <!-- Card 4 -->
          <div class="stats-card">
            <div class="card-content">
              <div>
                <p class="card-label">Inactive Users</p>
                <h3>12</h3>
              </div>
              <div class="card-icon bg-red">
                <i class="fas fa-user-slash"></i>
              </div>
            </div>
            <p class="card-trend positive">
              <i class="fas fa-arrow-up"></i> 5% from last month
            </p>
          </div>
        </div>

        <!-- Search and Table Section -->
        <div class="search-container">
          <div class="search-wrapper">
            <form class="search-bar" action="dashboard" method="GET">
              <input type="text" class="search-input" placeholder="Search by name, email, etc..." name="search">
              <button type="submit" class="search-button">
                <i class="fas fa-search"></i> Search
              </button>
            </form>
          </div>
          <button class="back-button" onclick="window.history.back()">
            <i class="fas fa-arrow-left"></i> Go Back
          </button>
        </div>

        <div class="table-container">
          <div class="table-wrapper">
            <table>
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($var as $y)
                <tr>
                  <td>{{$y->Name}}</td>
                  <td>{{$y->Age}}</td>
                  <td>{{$y->email}}</td>
                  <td>{{$y->Gender}}</td>
                  <td class="action-cell">
                    <a href="{{Route('users.edit',['id'=>$y->id])}}" class="btn btn-action btn-edit" title="Edit">
                      <i class="fas fa-edit"></i> Edit
                    </a>
                    {{-- <a href="{{url('/deletesign')}}/{{$y->id}}" class="btn btn-action btn-delete" title="Delete">
                      <i class="fas fa-trash-alt"></i> Delete
                    </a> --}}
                    <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-action btn-delete"><i class="fas fa-trash-alt"></i> Delete</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <!-- Pagination -->
        <div class="pagination-container">
          {{$var->links('pagination::bootstrap-5')}}
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Any JavaScript you need can go here
    });
  </script>

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
        <a href="{{url('/deletesign')}}/{{$y->id}}" class="btn btn-action btn-delete col-md-5" style="margin-left: 4%;" title="Delete">
                      <i class="fas fa-trash-alt"></i> Delete
                    </a> 
      </div>
    </div>
  </form>
</div>



@if(session('success'))
    <div id="success-alert" class="alert-popup">
      <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
    </div>
@endif

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
</html>
