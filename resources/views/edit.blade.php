<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Blog</title>
  </head>
  <body>
    <div class="p-3 mb-2 bg-dark text-white text-center">
        <h1>Write your blog here</h1>
    </div>
    <div class="row">
        <div class="col-sm-6 offset-3">
            <div class="card text-center">
                <div class="card-header outline bg-danger">
                    <p class="text-white ">Add Blog</p>
                </div>
                <div class="card-body">
                    <div class="pt-1">
                        <form action="{{ route('update',$data->id) }}" enctype="multipart/form-data" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group ">
                                <input type="text" name="title" value="{{ $data->title }}" id="title" class="form-control" placeholder="Enter title">
                                    <span style="color: red">@error('title'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group mt-1">
                                <textarea name="description" value="{{ $data->description }}" id="discription" class="form-control" cols="30" rows="10" placeholder="Write your blog here">@isset($data){{$data->description}}@else @endIf</textarea>
                                <span style="color: red">@error('descripton'){{ $message }}@enderror</span>
                              {{-- <input type="text" name="description" id="description" class="form-control" placeholder="Enter description"> --}}
                            </div>
                            <div class="form-group mt-1">
                                <input type="text" name="author" value="{{ $data->author }}" id="author" class="form-control" placeholder="Enter author name">
                                <span style="color: red">@error('author'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group mt-1">
                                <img src="{{ Storage::url("images/".$data->path) }}" alt="" width="50"/>
                                <label for="file"> Upload File: ({{ $data->path }})</label>
                                <input type="file" name="file" value="Upload"  id="file" class="form-control" >
                                <span style="color: red">@error('file'){{ $message }}@enderror</span>
                            </div>
                            <div class=" mt-2">
                                <button type="submit" class="btn btn-secondary">Update</button>
                                {{-- <a href="{{ route('list') }}" class="btn btn-secondary m-3">Update</a> --}}
                                <a href="{{ route('list') }}" class="btn btn-warning" hr>cancel</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
