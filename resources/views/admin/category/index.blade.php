@extends('admin.layouts.master')

@section('contain')


<div class="pagetitle">
    <h1>Category</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
        <li class="breadcrumb-item active">Category List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


  <section class="section">
    <div class="row">

      <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Category List</h5>
              
              <!-- Bordered Table -->
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($results as $item)
                      
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                      <a href="{{ route('category_edit', $item->id) }}">
                      <span class="badge rounded-pill text-bg-warning">Edit</span>
                    </a>
                    <a class="button-delete" data-id="{{$item->id}}" data-url='{{ route('category_delete') }}' href='#'>
                      <span class="badge rounded-pill text-bg-danger">Delete</span>
                    </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Bordered Table -->

            </div>
          </div>

      </div>


    </div>
  </section>

@endsection