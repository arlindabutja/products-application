@extends('./master-layout')
@section('title')Product Listing | CRUD Application @endsection
@section('content')

<div class="row mb-2">
    <div class="col-xl-12 col-lg-12 col-12 m-auto">
        <a href="{{route('product.create')}}" class="btn btn-primary btn-sm float-right"> Add New Product</a>
    </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th> ID </th>
            <th> Name </th>
            <th> Description </th>
            <th> Long Description </th>
            <th> BarCode </th>
            <th> Stock </th>
            <th> Price </th>
        </tr>
    </thead>
    <tbody>
        @if(!@empty($products))
            @foreach($products as $product)
                <tr>
                    <td> {{$product->id}} </td>
                    <td> {{$product->name}} </td>
                    <td> {{$product->description}} </td>
                    <td> {{$product->long_description}} </td>
                    <td> {{$product->barcode}} </td>
                    <td> {{$product->stock}} </td>
                    <td> {{$product->price}} </td>

                    <td> @if($product->published == 1) <span class="badge badge-success">Published</span> @else NA @endif </td>
                    <td>
                        <form action="{{route('product.destroy', $product->id)}}" method="post">
                        <a href="{{route('product.show', $product->id)}}" class="btn btn-info btn-sm"> View </a>
                        <a href="{{route('product.edit', $product->id)}}" class="btn btn-success btn-sm"> Edit </a>
                        @csrf
                        @method("DELETE")
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
@endsection