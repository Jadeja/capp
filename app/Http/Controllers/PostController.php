<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post = Post::latest();
        return view('post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('post.create');
    }
                                 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*        //  validate title in request form
                $this->validate($request, [
                    'title' => 'required|max:50'
                ]);
        */  

        $input = $request->all();
        
        if($file = $request->file('file'))
        {
            $name = $file->getClientOriginalName();
            $file->move('name',$name);
            $input['path'] = $name;
        }

        Post::create($input);
        /*       
            Post::create($request->all());
            return redirect('/post');
        */        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show posts
        $post = Post::find($id);
        return view('post.show',compact('post'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //  validate title in request form
        $this->validate($request, [
            'title' => 'required|max:50'
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());

/*        if(isset($post->id))
        {
            $post->title =  $request->title;
            $post->save();
        }
*/
        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::whereId($id)->delete();
        return redirect('/post');
    }
}
