<!DOCTYPE html>
<html>
  <head> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('admin.css')
    <style type="text/css">
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
    }

    .title_des {
        font-size: 30px;
        font-weight: bold;
        color: whitesmoke;
        padding: 30px;
        text-align: center;
    }

    .table_des {
        border: 1px solid #ddd;
        width: 80%;
        text-align: center;
        margin: 20px auto;
        background-color: #fff;
        border-collapse: collapse;
    }

    .th_des {
        background-color: #f8f9fa;
        color: #333;
    }

    .table_des th, .table_des td {
        padding: 15px;
        border: 1px solid #ddd;
    }

    .img_des {
        height: 100px;
        width: 150px;
        padding: 10px;
    }

    .btn {
        padding: 10px 20px;
        text-decoration: none;
        margin: 5px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
    }

    .btn-success {
        background-color: #28a745;
        color: #fff;
    }

    .btn-outline-secondary {
        background-color: #6c757d;
        color: #fff;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
    }

    </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        @if(session()->has('message'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">close</button>
            {{session()->get('message')}}
        </div>
        @endif
        <h1 class="title_des">All Post</h1>
        <table class="table_des">
            <tr class="th_des">
                <th>Post title</th>
                <th>Description</th>
                <th>Post by</th>
                <th>Post Status</th>
                <th>UserType</th>
                <th>Image</th>
                <th>Delete</th>
                <th>Edit</th>
                <th>Status Accept</th>
                <th>Status Reject</th>
            </tr>
            @foreach($post as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td>{{$post->name}}</td>
                <td>{{$post->post_status}}</td>
                <td>{{$post->usertype}}</td>
                <td>
                    <img class="img_des" src="postimage/{{$post->image}}">
                </td>
                <td>
                    <a href="{{url('delete_post', $post->id)}}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                </td>
                <td>
                    <a href="{{url('edit_post', $post->id)}}" class="btn btn-success">Edit</a>
                </td>
                <td>
                    <a onclick="return confirm('Are you want to accept this post?')" href="{{url('accept_post', $post->id)}}" class="btn btn-outline-secondary">Accept</a>
                </td>
                <td>
                    <a onclick="return confirm('Are you want to reject this post?')" href="{{url('reject_post', $post->id)}}" class="btn btn-primary">Reject</a>
                </td>
            </tr>
            @endforeach
        </table>
      </div>
      @include('admin.footer')
      <script type="text/javascript">
        function confirmation(ev){
            ev.preventDefault();
            var urlToRedirect=ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
                title:"Are you want to delete this?",
                text:"You won't be able to revert this delete",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })

            .then((willCancel)=>{
                if(willCancel){
                    window.location.href=urlToRedirect;
                }
            });
        }
      </script>
  </body>
</html>
