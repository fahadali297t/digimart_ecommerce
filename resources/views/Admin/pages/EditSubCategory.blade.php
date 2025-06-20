@extends('Admin.layout.dash')

@section('content')
<div class="page">
  <!-- Sidebar -->
  @include('Admin.layout.sidebar')

  {{-- Page Module --}}
  <div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
              DigiMart
            </div>

          </div>
          <!-- Page title actions -->

        </div>
      </div>
    </div>
    <!-- Page body -->
    <div class="page-body ">
      <div class="container-xl">
        <form action="{{ route('admin.subcategory.update' ) }}" enctype="multipart/form-data" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{ $singleCategory->id }}">
          <div class="row row-deck row-cards">

            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-item-center">
                  <h3 class="card-title">Update Category</h3>
                  <button type="submit" class="btn btn-primary">Update</button>

                </div>
                <div class="card_body p-5">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Category Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" name="name" value="{{ $singleCategory->name }}" placeholder="Category Name">
                      @error('name')
                        {{ $message }}
                      @enderror
                    </div>
                  </div>

                 

                </div>



              </div>
        </form>
      </div>
    </div>
    {{-- @include('Admin.layout.footer') --}}
  </div>
</div>


{{-- Report Modal --}}
@include('Admin.layout.reportModal')
@endsection