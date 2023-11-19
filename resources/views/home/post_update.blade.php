<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
      @include('home.homecss')

      <style type="text/css">
      .title_des{
        padding: 30px;
        font-size: 30px;
        font-weight: bold;
        color: white;
      }

      .div_des{
        text-align: center;
        background-color: black;
      }
    
      .img_des{
        height: 150px;
        width: 250px;
        margin: auto;
      }

      label{
        font-size: 18px;
        font-weight: bold;
        width: 200px;
        color: white;
      }

      .in_des{
        padding: 30px;
      }
      </style>
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
         @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">close</button>
            {{session()->get('message')}}
        </div>
        @endif
      <div class="div_des">
        <h1 class="title_des">Update Post</h1>
        <form action="{{url('update_post_data', $data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="in_des">
                <label>Title</label>
                <input type="text" name="title" value="{{$data->title}}">
            </div>
            <div class="in_des">
                <label>Description</label>
                <textarea name="description">{{$data->description}}</textarea>
            </div>
            <div class="in_des">
                <label>Current Image</label>
                <img class="img_des" src="/postimage/{{$data->image}}">
            </div>
            <div class="in_des">
                <label>Update Image</label>
                <input type="file" name="image">
            </div>
            <div class="in_des">
                <input type="submit" class="btn btn-outline-secondary" value="Update">
            </div>
        </form>
      </div>
      </div>
      <!-- header section end -->

      <!-- footer section start -->
      @include('home.footer')
   </body>
</html>