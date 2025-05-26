<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/table.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            min-height: 100vh;
        }
        .form-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 30px;
            background-color: #f8f9fa;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .img-thumbnail {
            max-width: 150px;
            max-height: 150px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    @include('sidebar')

    <div class="container py-5">
        <!-- Header Card Edit Form -->
        <div class="form-container mb-5" style="margin-left: 20%;">
            <div class="card-header">
                <h2 class="mb-4 text-center" style="background: transparent; color:black;">Header Card {{ isset($editData) ? 'Edit' : 'Create' }}</h2>
            </div>
            <div class="card-body">
                <form action="{{ isset($editData) ? route('card.update', $editData->id) : route('card.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($editData))
                        @method('PUT')
                    @endif
                    <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="cardtitle" class="form-label  d-flex justify-content-start">Title</label>
                        <input type="text" class="form-control" id="cardtitle" name="cardtitle" placeholder="Title Here"
                               value="{{ isset($editData) ? $editData->title : old('cardtitle') }}" 
                               required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="cardtext" class="form-label  d-flex justify-content-start">Text</label>
                        <textarea class="form-control" id="cardtext" placeholder="Text Here" name="cardtext" rows="1" 
                                  required>{{ isset($editData) ? $editData->content : old('cardtext') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="cardimage" class="form-label">Image</label>
                        @if(isset($editData) && $editData->image)
                            <img src="{{ asset('storage/' . $editData->image) }}" alt="Current Image" class="img-thumbnail" >
                        @endif
                        <input type="file" class="form-control" id="image" name="image" 
                               {{ !isset($editData) ? 'required' : '' }}>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        {{ isset($editData) ? 'Update' : 'Submit' }}
                    </button>
                    
                    @if(isset($editData))
                        <a href="{{ route('card.index') }}" class="btn btn-secondary mt-2 w-100 bt-2">Cancel</a>
                    
                    @endif
                </form>
            </div>
        </div>

        <!-- Data Table -->
        {{-- <div class="table-container">
            <h3 class="mb-4">Content Management</h3>
            <table class="table table-bordered table-hover align-middle text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Card Title</th>
                        <th>Card Text</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($var as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->content }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $item->image) }}" alt="Image">
                        </td>
                        <td>
                            <a href="{{ route('card.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ url('/deleteCARD/' . $item->id) }}" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> --}}
        <div class="container" style="margin-left: 16%; width:84%">
            <div class="table-container" >
              <div class="table-wrapper">
                <table>
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Card Title</th>
                      <th>Card</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($var as $item)
                    <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->title}}</td>
                      <td>{{$item->content}}</td>
                      <td>
                        <img src="{{ asset('storage/' . $item->image) }}" alt="Image" width="50px">
                        </td>
                        <td class="action-cell">
                            <a href="{{Route('card.edit',['id'=>$item->id])}}" class="btn btn-action btn-edit" title="Edit">
                              <i class="fas fa-edit"></i> Edit
                            </a>
                            {{-- <a href="{{url('/deleteCARD/')}}/{{$item->id}}" class="btn btn-action btn-delete" title="Delete">
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
              <a href="{{url('/deleteCARD/')}}/{{$item->id}}" class="btn btn-action btn-delete col-md-5" style="margin-left: 4%;" title="Delete">
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