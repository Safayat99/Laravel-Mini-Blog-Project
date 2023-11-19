<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')
    <style type="text/css">
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .post_title {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: whitesmoke;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        img {
            display: block;
            margin: 10px auto;
            max-width: 100%;
            height: auto;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <div class="page-content">
        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">close</button>
            {{session()->get('message')}}
        </div>
        @endif
        <h1 class="post_title">Update Post</h1>
        <form action="{{url('update_post', $post->id)}}" method="POST" enctype="multipart/form-data" class="form-container">
            @csrf
            <div class="form-group">
                <label for="title">Post Title</label>
                <input type="text" name="title" value="{{$post->title}}" id="title">    
            </div>
            <div class="form-group">
                <label for="description">Post Description</label>
                <textarea name="description" id="description">{{$post->description}}</textarea>    
            </div>
            <div class="form-group">
                <label>Old Image</label>
                <img src="/postimage/{{$post->image}}" alt="Old Image">
            </div>
            <div class="form-group">
                <label>Update Old Image</label>
                <input type="file" name="image">    
            </div>
            <div class="form-group">
                <input type="submit" value="Update" class="btn btn-primary">    
            </div>
        </form>
      </div>
      @include('admin.footer')
  </body>
</html>
