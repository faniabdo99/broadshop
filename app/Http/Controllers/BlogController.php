<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller{
    public function admin_posts(){
        $posts=Post::paginate(3);
        return view('admin.blog.all',compact('posts'));
    }
    public function getAdminAll(){
        $Posts = Post::where('active' , 1)->latest()->get();
        return view('admin.blog.index' , compact('Posts'));
    }
    public function getNew(){
        return view('admin.blog.new');
    }
    public function postNew(Request $r){
        $PostData = $r->except('photo');
        if($r->has('photo')){
            $PostData['photo'] = $r->slug.'.'.$r->photo->getClientOriginalExtension();
            $r->photo->storeAs('public/blog' , $PostData['photo']);
        }
        $PostData['user_id'] = auth()->user()->id;
        Post::create($PostData);
        return redirect(route('admin.blog.index'));
    }

    public function getIndex(){
        $AllPosts=Post::where('active' , 1)->latest()->get();
        return view('blog.index',compact('AllPosts'));
    }
    public function getSingle($slug,$id){
        $ThePost = Post::findOrFail($id);
        if($ThePost->active != 1){
            abort(404);
        }
        $OtherPosts = Post::where('active' , 1)->where('id' , '!=' , $id)->latest()->limit(3)->get();
        return view('blog.single' , compact('ThePost' , 'OtherPosts'));
    }
    public function show($post){
        $post_views=Post::orderBy('views','DESC')->get();
        $post=Post::find($post);
        return view('blog.show_post',compact('post','post_views'));
    }

    public function edit($id){
        $post=Post::find($id);
        return view('admin.blog.edit',compact('post'));
    }

    public function update(Request $request, $id){
        $post=Post::find($id);
        $fileNewName="m.jpg";
        if($request->hasFile('photo')){
            $fileWithExt=$request->file('photo')->getClientOriginalName();
            $fileWithoutExt=pathinfo($fileWithExt,PATHINFO_FILENAME);
            $fileExt=$request->file('photo')->getClientOriginalExtension();
            $fileNewName=$post->slug.'.'.$fileExt;
            $path=$request->file('photo')->storeAs('public/blog',$fileNewName);
        }
        $post->update([
            'title'=>$request->title,
            'keywords'=>$request->keywords,
            'body'=>$request->body,
            'description'=>$request->description,
            'photo'=>$fileNewName
        ]);
        return redirect()->route('admin.blog.index')->withSuccess('Post Updated Successfully!');
    }

    public function delete(Request $r){
        Post::find($r->item_id)->delete();
        return response('Post Deleted Successfully' , 200);
    }
}
