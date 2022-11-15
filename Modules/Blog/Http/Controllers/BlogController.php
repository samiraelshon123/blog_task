<?php

namespace Modules\Blog\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Modules\Blog\Entities\Comment;
use Modules\Blog\Entities\Post;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $posts = Post::all();
        return view('blog::index', compact('posts'));
    }
    public function create_post()
    {
        return view('blog::create');
    }

    public function store_post(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts',
            'date' => 'required|date',
            'image' => 'required|mimes:jpeg,jpg,png|max:2000',
        ]);


        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();

        }

        $file_name = $request->image->hashName();

        $path = 'images';
        $request->image->move($path, $file_name);

        $data['title'] = $request->title;
        $data['user_id'] = auth()->user()->id;
        $data['date'] = $request->date;
        $data['author'] = auth()->user()->type;
        $data['image'] = $path .'/'. $file_name;

        Post::create($data);
        return redirect('dashboard/index');
    }
    public function comment(Request $request, $id)
    {

        Comment::create([
            'comment' => $request->comment,
            'post_id' => $id,
            'user_id' => auth()->user()->id

        ]);
        return redirect('dashboard/index');
    }
    public function comments(Post $post)
    {

        $comments = $post->comments;

        return view('blog::comments', compact('comments'));
    }
    public function comment_delete($id){
        $comment = Comment::find($id);
         $comment->delete();
        return redirect('dashboard/index');
    }
    public function add_user(){

            return view('add_user');


    }
    public function store_user(Request $request){

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6',
            'type' => 'required'


        ],[],[]);

        $news = User::create( [

            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'type' => request('type'),

        ]);
        return redirect('dashboard/index');
    }
}
