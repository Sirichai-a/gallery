@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('addimage')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image">
                    <button type="submit" name="submit">Submit</button>
                </form>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Extension</th>
                        <th scope="col">Size</th>
                        <th scope="col">image</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($images as $image)
                        <tr>
                        <th>{{ $image->id }}</th>
                        <td>{{ $image->name }}</td>
                        <td>{{ $image->extension }}</td>
                        <td>{{ $image->size }}</td>
                        <td><img src="{{ asset('storage/'.$image->path)}}" width="100px;" height="100px;" alt="Image"></td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>

                
            </div>    
        </div>
    </div>
    

</body>
</html>
@endsection