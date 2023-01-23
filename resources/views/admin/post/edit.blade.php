@extends('admin.layouts.master')

@section('contain')

<div class="pagetitle">
    <h1>Post</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
        <li class="breadcrumb-item active">Update Post</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


  <section class="section">
    <div class="row">

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Post Update</h5>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            
            <!-- Custom Styled Validation -->
            <form action='{{ route('post_update') }}' enctype="multipart/form-data" method="post" class="row g-3 needs-validation" novalidate>
              @csrf
              <input type="hidden" name="id" value="{{ $result->id }}">
              <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Post Title</label>
                <input type="text" value="{{ $result->title }}" placeholder="Post Title" class="form-control" name="title" id="validationCustom01" required>
              </div>

              <div class="col-md-6">
                <label for="validationCustom05" class="form-label">Category</label>
                <select class="form-select" name="category_id" id="validationCustom05" required>
                  <option selected disabled value="">Choose...</option>
                  @foreach ($categories as $item)
                      <option {{ $result->category_id == $item->id?'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-12">
                <label for="validationCustom06" class="form-label">Short Description</label>
                <textarea name="short_description" required class="form-control" id="validationCustom06" cols="30" rows="10">{{ $result->short_description }}</textarea>
              </div>

              <div class="col-md-12">
                <label for="validationCustom04" class="form-label"> Description</label>
                <textarea name="description" required class="form-control summernote" id="" cols="30" rows="10">{!! $result->description !!}</textarea>
              </div>

              
              <div class="col-md-2">
                <label for="photo" class="form-label">Old Photo</label>
                <img width="120" height="90" src="{{ asset('uploads/product').'/'.$result->photo }}" alt="">
              </div>

              <div class="col-md-4">
                <label for="validationCustom09" class="form-label">Photo</label>
                <input type="hidden" name="old_photo" value="{{ $result->photo }}">
               <input type="file" name="photo" class="form-control">
              </div>

              <div class="col-md-6">
                <label for="validationCustom04" class="form-label">Status</label>
                <select class="form-select" name="status" id="validationCustom04" required>
                  <option selected disabled value="">Choose...</option>
                  <option {{ $result->status == 'Active'?'selected':'' }} value="Active">Active</option>
                  <option {{ $result->status == 'InActive'?'selected':'' }} value="InActive">InActive</option>
                </select>
              </div>
              <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit form</button>
              </div>
            </form><!-- End Custom Styled Validation -->

          </div>
        </div>

      </div>


    </div>
  </section>

  @push('script')
  <script type="text/javascript">
    $(document).ready(function() {
      $('.summernote').summernote({
        height: 400
    });
    });
    </script>
  @endpush
  
 

@endsection