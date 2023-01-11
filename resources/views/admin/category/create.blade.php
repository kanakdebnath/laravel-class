@extends('admin.layouts.master')

@section('contain')

<div class="pagetitle">
    <h1>Category</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
        <li class="breadcrumb-item active">Create Category</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


  <section class="section">
    <div class="row">

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Category Create</h5>
            
            <!-- Custom Styled Validation -->
            <form class="row g-3 needs-validation" novalidate>
              <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Category name</label>
                <input type="text" class="form-control" name="category" id="validationCustom01" required>
              </div>
              <div class="col-md-6">
                <label for="validationCustom04" class="form-label">Status</label>
                <select class="form-select" name="status" id="validationCustom04" required>
                  <option selected disabled value="">Choose...</option>
                  <option value="Active">Active</option>
                  <option value="InActive">InActive</option>
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

@endsection