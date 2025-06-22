@extends('Admin.layout.dash')

@section('content')
<div class="page">
    <!-- Sidebar -->
    @include('Admin.layout.sidebar')

    <!-- Page Module -->
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            DigiMart
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <form action="{{ route('admin.product.add') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row row-deck row-cards">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h3 class="card-title">Add Product</h3>
                                    <button type="submit" class="btn btn-primary">Publish Product</button>
                                </div>

                                <div class="card_body p-5">
                                    {{-- Product Title --}}
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 col-form-label">Product Title <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="title" class="form-control" name="title" placeholder="Product Name">
                                            <span class="text-danger d-block mt-2">
                                                @error('title') {{ $message }} @enderror
                                            </span>
                                        </div>
                                    </div>

                                    {{-- Product Description --}}
                                    <div class="form-group mt-5 row">
                                        <label for="description" class="col-sm-2 col-form-label">Product Description <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                                            <span class="text-danger d-block mt-2">
                                                @error('description') {{ $message }} @enderror
                                            </span>
                                        </div>
                                    </div>
                                    {{-- product Categories and sub_categories --}}
                                  <div class="row">
                                      {{-- Select Category --}}
                                    <div class="col-12 col-md-6">
                                      <div class="form-group row mt-5">
                                        <label for="category" class=" col-md-12 col-form-label">Select a Category<span class="text-danger">*</span></label>
                                          <div class="col-md-12">
                                            <select class="form-select" id="category" name="category">
                                                <option selected value="">Select a category</option>
                                                @forelse ($catges as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                            <span class="text-danger d-block mt-2">
                                                @error('category') {{ $message }} @enderror
                                            </span>
                                          </div>
                                      </div>
                                    </div>

                                        {{-- Select Subcategory --}}
                                        <div class="col-12 col-md-6">
                                          <div class="form-group row mt-5">
                                            <label for="sub_category" class=" col-md-12 col-form-label">Select Sub Category<span class="text-danger">*</span></label>
                                              <div class="col-md-12">
                                                <select class="form-select" id="sub_category" name="sub_category">
                                                    <option selected value="">Select category first</option>
                                                  
                                                </select>
                                                <span class="text-danger d-block mt-2">
                                                    @error('sub_category') {{ $message }} @enderror
                                                </span>
                                              </div>
                                          </div>
                                        </div>
                                  </div>
                                  {{-- price and Quantity --}}
                                  <div class="row">
                                    {{-- Product Price --}}
                                    <div class="col-12 col-md-6">
                                        <div class="form-group row mt-5">
                                          <label for="price" class=" col-md-12 col-form-label">Product Price in PKR<span class="text-danger">*</span></label>
                                            <div class="col-md-12">
                                                <input type="number" id="price" class="form-control" name="price" placeholder="Product Price">
                                              <span class="text-danger d-block mt-2">
                                                  @error('price') {{ $message }} @enderror
                                              </span>
                                            </div>
                                        </div>
                                      </div>

                                      {{-- Product Quantity --}}
                                      <div class="col-12 col-md-6">
                                        <div class="form-group row mt-5">
                                          <label for="quantity" class=" col-md-12 col-form-label">Product Quantity<span class="text-danger">*</span></label>
                                            <div class="col-md-12">
                                                <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Product Quantity">
                                              <span class="text-danger d-block mt-2">
                                                  @error('quantity') {{ $message }} @enderror
                                              </span>
                                            </div>
                                        </div>
                                      </div>
                                </div>
                                  {{-- Product Images --}}
                                  <div class="row mt-5">
                                    <div class="col-12 mb-2">
                                        <label class=" form-label ">Product Images:</span></label>

                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4"> 
                                        <div >
                                         <label class="form-label imgUpload" for="coverImg" data-default="Cover Image*">
                                            <div class="d-flex flex-column gap-2 justify-content-center align-items-center">
                                                <div>
                                                    <i class="fa-solid fa-arrow-up-from-bracket"></i> &nbsp; Cover Image<span class="text-danger">*</span>
                                                </div>
                                                <div class="text-danger">
                                                    @error('cover')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </label>
                                         <input class="form-control image_upload d-none" name="cover" accept="image/*"  type="file" id="coverImg">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4"> 
                                        <div>
                                            <label class="form-label imgUpload" data-default="Product Image 1*" for="product_image1">
                                                <i class="fa-solid fa-arrow-up-from-bracket"></i> &nbsp; Product Image 1<span class="text-danger">*</span>
                                            </label>
                                         <input class="form-control image_upload d-none" name="product_image1" accept="image/*"   type="file" id="product_image1">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4"> 
                                        <div>
                                         <label class="form-label imgUpload" for="product_image2">
                                            <i class="fa-solid fa-arrow-up-from-bracket" data-default="Product Image 2*" ></i> &nbsp; Product Image 2<span class="text-danger">*</span>
                                        </label>
                                         <input class="form-control d-none image_upload"  name="product_image2" accept="image/*"   type="file" id="product_image2">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4"> 
                                        <div>
                                         <label class="form-label imgUpload" for="product_image3" data-default="Product Image 3*">
                                            <i class="fa-solid fa-arrow-up-from-bracket"></i> &nbsp; Product Image 3<span class="text-danger">*</span>
                                        </label>
                                         <input class="form-control image_upload d-none" name="product_image3" accept="image/*"   type="file" id="product_image3">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4"> 
                                        <div>
                                         <label class="form-label imgUpload" for="product_image4" data-default="Product Image 4">
                                            <i class="fa-solid fa-arrow-up-from-bracket"></i> &nbsp; Product Image 4
                                        </label>
                                         <input class="form-control image_upload d-none" name="product_image4" accept="image/*"   type="file" id="product_image4">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4"> 
                                        <div>
                                         <label class="form-label imgUpload" data-default="Product Image 5" for="product_image5">
                                            <i class="fa-solid fa-arrow-up-from-bracket"></i> &nbsp; Product Image 5
                                        </label>
                                         <input class="form-control image_upload d-none" name="product_image5" accept="image/*"   type="file" id="product_image5">
                                        </div>
                                    </div>

                                     
                                     
                                    
                                  </div>
                                  {{--  --}}
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

<script>

document.addEventListener('DOMContentLoaded', function () {
  const categorySelect = document.getElementById('category');
  const subCategorySelect = document.getElementById('sub_category');

  categorySelect.addEventListener('change', function () {
    const categoryId = this.value;

    // Clear subcategory options first
    subCategorySelect.innerHTML = '<option value="">Select Sub Category</option>';

    if (categoryId) {
      fetch(`/admin/subcategories/${categoryId}`)
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.json();
        })
        .then(data => {
          // Append options to subcategory select
          data.forEach(function (subCat) {
            const option = document.createElement('option');
            option.value = subCat.id;
            option.textContent = subCat.name;
            subCategorySelect.appendChild(option);
          });
        })
        .catch(error => {
          console.error('There was a problem with the fetch operation:', error);
        });
    }
  });
});
</script>



</script>
{{-- Report Modal --}}
@include('Admin.layout.reportModal')
@endsection


