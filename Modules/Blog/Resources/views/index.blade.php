<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <link href="{{asset('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="{{asset('backend/vendor/bootstrap-fileinput/css/fileinput.min.css')}}" rel="stylesheet">
  <link href="{{asset('backend/vendor/summernote/summernote-bs4.min.css')}}" rel="stylesheet">

</head>
<body>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
          <div class="ml-auto">
            <a href="{{url('dashboard/create_post')}}" class="btn btn-primary">
                <span class="icon-text-white-50">
                    <i class="fa fa-plus"></i>
                </span>
                <span class="text">Add New Post</span>
            </a>
          </div>

        </div>
        <div class="card-header py-3 d-flex">
            <div class="ml-auto">
              <a href="{{url('dashboard/add_user')}}" class="btn btn-primary">
                  <span class="icon-text-white-50">
                      <i class="fa fa-plus"></i>
                  </span>
                  <span class="text">Add New User</span>
              </a>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Date</th>
                  <th class="text-center" style="width: 30px">Add Comment</th>
                  <th>Comments</th>
                </tr>
              </thead>

              <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td>
                            <img src="{{asset($post->image)}}" width="100px" height="100px">
                        </td>

                        <td>

                            <p class="text-gray-400"><b>{{$post->title}}</b></p>
                        </td>
                        <td>{{$post->date}}</td>
                        <td>
                            <form action="{{url('dashboard/comment/'.$post->id)}}" method="post">
                                @csrf
                                <textarea name="comment" id="" cols="30" rows="5" required></textarea>
                                <span class="icon-text-white-50">

                                    <button type="submit">  <i class="fa fa-plus"> <span class="text">Comment</span></i></button>
                                </span>
                                </a>
                            </form>



                        </td>
                        <td>
                            <a href="{{url('dashboard/comments/'.$post->id)}}"><i class="fa fa-eye">View Comments</i></a>
                        </td>

                  </tr>
                  @empty
                  <tr>
                      <td colspan="6" class="text-center">No Users found</td>
                  </tr>
              @endforelse
              </tbody>
              <tfoot>

              </tfoot>
          </table>
          </div>

      </div>


</body>
</html>
