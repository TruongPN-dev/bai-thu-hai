<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4ggtYFKmJujfqX50s7Ss+KCvpg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<script>
    function checkDelete (msg){
        if(window.confirm(msg)){
            return true
        }
        return false
    }
</script>
@if(session('success'))
    <div id="successAlert" class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(() => {
            const alert = document.getElementById('successAlert');
            if (alert) {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 300);
            }
        }, 3000);
    </script>
@endif
<body>
    <div class="container">
        <h1>Movie Management</h1>

        <!-- Add Movie Form -->
        <form action="{{ route('admin.movie.store') }}" id="addMovieForm" class="mt-3" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="movieTitle">Movie Title:</label>
                <input type="text" class="form-control" id="movieTitle" name="movieTitle" required>
            </div>
            <div class="form-group">
                <label for="director">Director:</label>
                <input type="text" class="form-control" id="director" name="director" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" id="image" name="image" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre:</label>
                <select class="form-control" id="genre" name="genre">
                    <option value="1">Action</option>
                    <option value="2">Romance</option>
                    <option value="3">Horror</option>
                    <option value="4">Comedy</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="visible" value="1" checked>
                    <label class="form-check-label" for="visible">Visible</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="hidden" value="2">
                    <label class="form-check-label" for="hidden">Hidden</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add Movie</button>
        </form>

        <br>

        <table class="table table-striped mt-3" align="center">
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Title</th>
                    <th>Director</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Genre</th>
                    <th>Status</th>
                    <th>Create At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($movie as $item)
                @php
                   $image = file_exists(public_path('uploads/' . $item->image)) ? asset('uploads/' . $item->image) : asset('uploads/404.jpg');

                @endphp
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->movieTitle}}</td>
                        <td>{{$item->director}}</td>
                        <td>{{$item->description}}</td>
                        <td><image src="{{$image}}" width="70px"></td>
                            <td>
                                @if($item->genre == 1)
                                    Action
                                @elseif($item->genre == 2)
                                    Romance
                                @elseif($item->genre == 3)
                                    Horror
                                @elseif($item->genre == 4)
                                    Comedy
                                @endif
                            </td>
                            <td>
                                @if($item->status == 1)
                                    Visible
                                @elseif($item->genre == 2)
                                    Hiden
                                @endif
                            </td>
                            <td>
                                {{ date("d-m-Y H:i:s", strtotime($item->created_at)) }}
                            </td>
                        <td>
                            <button class="btn btn-sm btn-info">Edit</button>
                            <button onclick="return checkDelete('Are you sure!!!')" class="btn btn-sm btn-danger"><a href={{ route('admin.movie.destroy', ['id' => $item->id]) }}>Delete</a></button>
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="9" align="center">No Movie Show</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
