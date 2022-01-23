@extends('./master-layout')
@section('title') Update Product @endsection
@section('content')

<div class="row">
    <div class="col-xl-6 col-lg-6 col-12 m-auto">
        <a href="{{route('product.index')}}" class="btn btn-danger btn-sm float-right"> Back to Products </a>
    </div>
</div>


<form action="{{route('product.update',$product->id)}}" method="post">
    @method("PUT")
    @csrf
    <div class="row mt-2">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 m-auto">
            <div class="card shadow">

                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{Session::get("success")}}
                    </div>

                @elseif(Session::has('failed'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{Session::get("failed")}}
                    </div>
                @endif

                <div class="card-header">
                    <h5 class="card-title"> CRUD Application | Update Product</h5>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="name"> Product Name <span class="text-danger">*</span> </label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="@if(!empty($product)){{$product->name}}@else {{old('name')}} @endif" />
                        {!!$errors->first('name', '<small class="text-danger"> :message </small>') !!}
                    </div>

                    <div class="form-group">
                        <label for="description"> Description <span class="text-danger">*</span> </label>
                        <textarea class="form-control" name="description" placeholder="Enter Description">@if(!empty($product)){{$product->description}}@else{{old('description')}}@endif</textarea>
                        {!!$errors->first('description', '<small class="text-danger"> :message </small>') !!}
                    </div>

                    <div class="form-group">
                        <label for="longdescription"> Long Description <span class="text-danger">*</span> </label>
                        <textarea class="form-control" name="longdescription" placeholder="Enter Long Description">@if(!empty($product)){{$product->long_description}}@else{{old('long_description')}}@endif</textarea>
                        {!!$errors->first('long_description', '<small class="text-danger"> :message </small>') !!}
                    </div>

                    <div class="form-group">
                        <label for="barcode"> BarCode <span class="text-danger">*</span> </label>
                        <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Enter BarCode" value="@if(!empty($product)){{$product->barcode}}@else{{old('barcode')}} @endif" />
                        {!!$errors->first('barcode', '<small class="text-danger"> :message </small>') !!}
                    </div>

                    <div class="form-group">
                        <label for="stock"> Stock <span class="text-danger">*</span> </label>
                        <input type="text" name="stock" id="stock" class="form-control" placeholder="Enter Stock" value="@if(!empty($product)){{$product->stock}}@else{{old('stock')}} @endif" />
                        {!!$errors->first('stock', '<small class="text-danger"> :message </small>') !!}
                    </div>

                    <div class="form-group">
                        <label for="price"> Price <span class="text-danger">*</span> </label>
                        <input type="text" name="price" id="price" class="form-control" placeholder="Enter Price" value="@if(!empty($product)){{$product->price}}@else{{old('price')}} @endif" />
                        {!!$errors->first('price', '<small class="text-danger"> :message </small>') !!}
                    </div>


                </div>

                <div class="card-footer">
                   <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection