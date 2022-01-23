@extends('./master-layout')
@section('title') Show Product @endsection
@section('content')

<div class="row">
    <div class="col-xl-6 col-lg-6 col-12 m-auto">
        <a href="{{route('product.index')}}" class="btn btn-danger btn-sm float-right"> Back to Products </a>
    </div>
</div>

    <div class="row mt-2">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 m-auto">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="card-title"> CRUD Application</h5>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="name"> Product Name <span class="text-danger">*</span> </label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" readonly value="@if(!empty($product)){{$product->name}}@else {{old('name')}} @endif" />
                    </div>

                    <div class="form-group">
                        <label for="description"> Description <span class="text-danger">*</span> </label>
                        <textarea class="form-control" name="description" readonly placeholder="Enter Description">@if(!empty($product)){{$product->description}}@else{{old('description')}}@endif</textarea>
                    </div>

                    <div class="form-group">
                        <label for="longdescription"> Long Description <span class="text-danger">*</span> </label>
                        <textarea class="form-control" name="longdescription" readonly placeholder="Enter Long Description">@if(!empty($product)){{$product->long_description}}@else{{old('long_description')}}@endif</textarea>
                    </div>

                    <div class="form-group">
                        <label for="barcode"> BarCode <span class="text-danger">*</span> </label>
                        <textarea class="form-control" name="barcode" readonly placeholder="Enter BarCode">@if(!empty($product)){{$product->barcode}}@else{{old('barcode')}}@endif</textarea>
                    </div>

                    <div class="form-group">
                        <label for="stock"> Stock <span class="text-danger">*</span> </label>
                        <textarea class="form-control" name="stock" readonly placeholder="Enter Stock">@if(!empty($product)){{$product->stock}}@else{{old('stock')}}@endif</textarea>
                    </div>

                    <div class="form-group">
                        <label for="price"> Price <span class="text-danger">*</span> </label>
                        <textarea class="form-control" name="price" readonly placeholder="Enter Price">@if(!empty($product)){{$product->price}}@else{{old('price')}}@endif</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection