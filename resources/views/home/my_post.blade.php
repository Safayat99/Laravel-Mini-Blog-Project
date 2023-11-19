<!DOCTYPE html>
<html lang="en">
   <head>
      @include('home.homecss')
      <style type="text/css">
      .post_des{
        padding: 30px;
        text-align: center;
        background-color: black;
      }

      .title_des{
        font-size: 30px;
        font-weight: bold;
        padding: 15px;
        color: white;
      }

      .description_des{
        font-size: 18px;
        font-weight: bold;
        padding: 15px;
        color: whitesmoke;
      }

      .img_des{
        height: 200px;
        width: 300px;
        padding: 30px;
        margin: auto;
      }
      </style
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
        @foreach($data as $data)
         <div class="post_des">
            <img class="img_des" src="/postimage/{{$data->image}}">
            <h4 class="title_des">{{$data->title}}</h4>
            <p class="description_des">{{$data->description}}</p>
            <a onclick="return confirm('Are you want to delete this?')" href="{{url('my_post_del', $data)}}" class="btn btn-danger">Delete</a>

            <a href="{{url('post_update', $data->id)}}" class="btn btn-primary">Update</a>
         </div>
        @endforeach
      </div>
      <!-- header section end -->
      <!-- footer section start -->
      @include('home.footer')
   </body>
</html>