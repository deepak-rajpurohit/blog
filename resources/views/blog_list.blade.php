<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row mt-5">
            <div class="mb-4">
                <div class="float-end">
                    <a href="{{ route('create') }}" class="btn btn-info">New Blog</a>
                </div>
            </div>
            @foreach ($blogs as $blog)
            
            <div class="col-4 mb-3">
                <div class="card">
                    <div class="card-header">
                        <img src="{{ Storage::disk("public")->url("images/$blog->path") }}" class="img-fluid" alt="{{ $blog->author }}">
                    </div>
                    <div class="card-body">
                        <div class="card-title">{{ $blog->title }}</div>
                        <div class="">{{ $blog->description }}</div>
                        <br>
                        <div class="float-end">
                            {{ $blog->author }}
                        </div>
                    </div>
                    <div class='card-footer d-flex justify-content-between'>
                        <div class="btn btn-primary">
                            edit
                        </div>
                        <div class="btn btn-danger">
                            Delete
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
            <div class="pagination">
                {{ $blogs->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

</body>
</html>
