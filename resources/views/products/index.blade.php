@extends('layouts.app')
 
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6 ">
                            <h2>Products - List</h2>
                        </div>
                        <div class="col-md-6 text-right">
                            <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                            <a class="btn btn-primary" href="{{ route('home') }}"> Back Home</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->detail }}</td>
                            <td class="text-right">
                                <form action="{{ route('products.destroy',$product->id) }}" method="POST" class="">
                    
                                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                
                                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                    
                                    @csrf
                                    @method('DELETE')
                        
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                        {!! $products->links() !!}
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
      
@endsection