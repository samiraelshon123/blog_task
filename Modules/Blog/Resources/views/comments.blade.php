
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

          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                    <th>Comments</th>
                    <th>User Name</th>
                    <th>Action</th>
                </tr>
              </thead>

              <tbody>
                @forelse ($comments as $comment)
                    <tr>
                        <td>{{$comment->comment}}</td>
                        <td>{{$comment->user->name}}</td>
                        <td>
                            <form action="{{url('dashboard/comment_delete/'.$comment->id)}}" method="post">
                                @csrf
                                <button class="btn btn-danger">Delete Comment</button>
                            </form>
                        </td>
                  </tr>
                  @empty
                  <tr>
                      <td colspan="6" class="text-center">No Comments found</td>
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
