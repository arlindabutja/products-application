@extends('./master-layout')
@section('title') Create New Product @endsection
@section('content')


<div class="row">
    <div class="col-xl-6 col-lg-6 col-12 m-auto">
        <a href="{{route('product.index')}}" class="btn btn-danger btn-sm float-right"> Back to Products </a>
    </div>
</div>

<form action="{{route('product.store')}}" method="post">
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
                    <h5 class="card-title"> CRUD Application</h5>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="name"> Product Name <span class="text-danger">*</span> </label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="{{old('name')}}" />
                        {!!$errors->first('name', '<small class="text-danger"> :message </small>') !!}
                    </div>

                    <div class="form-group">
                        <label for="description"> Description <span class="text-danger">*</span> </label>
                        <input type="text" name="description" id="description" class="form-control" placeholder="Enter Description" value="{{old('description')}}" />
                        {!!$errors->first('description', '<small class="text-danger"> :message </small>') !!}
                    </div>

                    <div class="form-group">
                        <label for="longdescription"> Long Description <span class="text-danger">*</span> </label>
                        <input type="text" name="longdescription" id="longdescription" class="form-control" placeholder="Enter Long Description" value="{{old('long_description')}}" />
                        {!!$errors->first('long_description', '<small class="text-danger"> :message </small>') !!}
                    </div>

                    <div class="form-group">
                        <label for="barcode"> BarCode <span class="text-danger">*</span> </label>
                        <textarea class="form-control" name="barcode" placeholder="Enter BbarCode">{{old('barcode')}}</textarea>
                        {!!$errors->first('barcode', '<small class="text-danger"> :message </small>') !!}
                    </div>

                    <div class="form-group">
                        <label for="stock"> Stock <span class="text-danger">*</span> </label>
                        <textarea class="form-control" name="stock" placeholder="Enter Stock">{{old('stock')}}</textarea>
                        {!!$errors->first('stock', '<small class="text-danger"> :message </small>') !!}
                    </div>

                    <div class="form-group">
                        <label for="price"> Price <span class="text-danger">*</span> </label>
                        <textarea class="form-control" name="price" placeholder="Enter Price">{{old('price')}}</textarea>
                        {!!$errors->first('price', '<small class="text-danger"> :message </small>') !!}
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Create Product</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection