<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Item Form - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/table.css') }}">
    <style>
        th{
            width:50px !important;
        }
        td{
            width: 50px !important;
        }
        @media (min-width: 1024px) {
  .bento-grid {
    grid-template-columns: repeat(2, 1fr) !important;
  }
}
.form-container {
      margin: 50px auto;
      padding: 30px;
      background-color: #f8f9fa;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    </style>
</head>
<body>
    @include('sidebar')

    <div class="content">
        <div style="margin-left:16%; width:84%;">
            <!-- Form Card -->
            <div style="padding:2% 7% ;">
            <div class="form-container">
                <div class="card-header">
                    <h2 class="mb-4 text-center">Explore Card {{ isset($editData) ? 'Edit' : 'Create' }}</h2>
                </div>
                <div class="card-body">
                    <form action="{{ isset($editData) ? route('explore.update', $editData->id) : route('explore.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($editData))
                            @method('PUT')
                        @endif
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Primary Image</label>
                                    @if(isset($editData) && $editData->image)
                                        <img src="{{ asset('storage/' . $editData->image) }}" alt="Current Image" class="img-thumbnail mb-2" width="50px" height="50px">
                                    @endif
                                    <input type="file" class="form-control" id="image" name="image" {{ !isset($editData) ? 'required' : '' }}>
                                </div>

                                <div class="mb-3">
                                    <label for="type" class="form-label">Type</label>
                                    <select class="form-select" id="type" name="type" required>
                                        <option value="">Select Type</option>
                                        <option value="best_rated" {{ (isset($editData) && $editData->type == 'best_rated') ? 'selected' : '' }}>Best Rated</option>
                                        <option value="featured" {{ (isset($editData) && $editData->type == 'featured') ? 'selected' : '' }}>Featured</option>
                                        <option value="most_view" {{ (isset($editData) && $editData->type == 'most_view') ? 'selected' : '' }}>Most View</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" 
                                           value="{{ isset($editData) ? $editData->title : old('title') }}" 
                                           required maxlength="10" placeholder="Enter Title">
                                </div>

                                <div class="mb-3">
                                    <label for="rating" class="form-label">Rating (e.g. 4.9)</label>
                                    <input type="number" class="form-control" id="rating" name="rating" 
                                           value="{{ isset($editData) ? $editData->rating : old('rating') }}" 
                                           step="0.1" min="0" max="5" required placeholder="Enter Rating">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="no_of_ratings" class="form-label">Number of Ratings</label>
                                    <input type="number" class="form-control" id="no_of_ratings" name="no_of_ratings" 
                                           value="{{ isset($editData) ? $editData->no_of_ratings : old('no_of_ratings') }}" 
                                           required>
                                </div>

                                <div class="mb-3">
                                    <label for="price" class="form-label">Price (e.g. 5$ - 100$)</label>
                                    <input type="text" class="form-control" id="price" name="price" 
                                           value="{{ isset($editData) ? $editData->price : old('price') }}" 
                                           required placeholder="Enter Price">
                                </div>

                                <div class="mb-3">
                                    <label for="extra_text" class="form-label">More Content</label>
                                    <input type="text" class="form-control" id="extra_text" name="extra_text" 
                                           value="{{ isset($editData) ? $editData->extra_text : old('extra_text') }}" 
                                           maxlength="20" placeholder="Enter Content">
                                </div>

                                <div class="mb-3">
                                    <label for="secondary_image" class="form-label">Secondary Image</label>
                                    @if(isset($editData) && $editData->profilepic)
                                        <img src="{{ asset('storage/' . $editData->profilepic) }}" alt="Current Image" class="img-thumbnail mb-2" width="50px" height="50px">
                                    @endif
                                    <input type="file" class="form-control" id="secondary_image" name="secondary_image">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="content" class="form-label">Content</label>
                                    <textarea class="form-control" id="content" name="content" rows="1" placeholder="Content Here" maxlength="70">{{ isset($editData) ? $editData->content : old('content') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label d-block">Status</label>
                                    <div style="display: flex; ">
                                    <div class="form-check" style="padding-right:20px;">
                                        <input class="form-check-input" type="radio" name="status" id="open" value="open" 
                                               {{ (isset($editData) && $editData->status == 'open') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="open">Open Now</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="close" value="close" 
                                               {{ (isset($editData) && $editData->status == 'close') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="close">Close Now</label>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-primary w-100">
                                {{ isset($editData) ? 'Update' : 'Submit' }}
                            </button>
                            @if(isset($editData))
                                <a href="{{ route('explore.index') }}" class="btn btn-secondary  mt-2 w-100">Cancel</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>

            <!-- Table Card -->
            <div class="dashboard-card" >
                <div class="card-body p-0">
                    <div class="container">
                    <div class="table-container" >
                        <div class="table-wrapper">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Type</th>
                                        <th>Title</th>
                                        <th>Rating</th>
                                        {{-- <th>Ratings</th> --}}
                                        {{-- <th>Price</th> --}}
                                        <th>Extra Text</th>
                                        <th>Profile Pic</th>
                                        <th>Content</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($exp as $y)
                                    <tr>
                                        <td><img src="{{ asset('storage/' . $y->image) }}" alt="explore image" class="img-thumbnail"></td>
                                        <td>{{$y->type}}</td>
                                        <td>{{$y->title}}</td>
                                        <td>{{$y->rating}}</td>
                                        {{-- <td>{{$y->no_of_ratings}}</td> --}}
                                        {{-- <td>{{$y->price}}</td> --}}
                                        <td>{{$y->extra_text}}</td>
                                        <td><img src="{{ asset('storage/' . $y->profilepic) }}" alt="explore image" class="img-thumbnail"></td>
                                        <td>{{ \Illuminate\Support\Str::limit($y->content, 20) }}</td>
                                        <td>
                                            @if($y->status == 'open')
                                                <span class="status-open"><i class="fas fa-unlock"></i> Open</span>
                                            @else
                                                <span class="status-close"><i class="fas fa-lock"></i> Closed</span>
                                            @endif
                                        </td>
                                        <td class="action-cell">
                                            {{-- <a href="{{Route('explore.edit',['id'=>$y->id])}}" class="btn-action btn-edit" title="Edit">
                                                <i class="fas fa-edit"></i>Edit
                                            </a> --}}
                                            <a href="{{Route('explore.edit',['id'=>$y->id])}}" class="btn btn-action btn-edit" title="Edit">
                                                <i class="fas fa-edit"></i> Edit
                                              </a>
                                            {{-- <a href="{{url('/deleteEXPLORE')}}/{{$y->id}}" class="btn-action btn-delete" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
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
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
              <a href="{{url('/deleteEXPLORE')}}/{{$y->id}}" class="btn btn-action btn-delete col-md-5" style="margin-left: 4%;" title="Delete">
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