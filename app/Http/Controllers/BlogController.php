<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class BlogController extends Controller implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('auth', only: ['create', 'store'])
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('theme.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        //
        $data = $request->validated();
        $image = $request->image;
        $newImageName = time() . "_" . $image->getClientOriginalName();
        $image->storeAs('blogs', $newImageName, 'public');
        $slug = Str::slug($data['title'], '-');
        Blog::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'slug' =>  $slug,
            'category_id' => $data['category'],
            'user_id' => Auth::user()->id,
            'image' => $newImageName,
        ]);
        notyf()->success('Your Blog has been added.');
        return to_route('theme.index');
    }

    /**
     *
     * @param Blog $blog
     * @return void
     */
    public function show(Blog $blog)
    {
        //
        return view('theme.blogs.details', ['blog' => $blog]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
        if ($blog->user_id !== Auth::user()->id) {
            return to_route('theme.index');
        }
        return view('theme.blogs.edit', ['blog' => $blog]);
    }

    /**
     * Undocumented function
     *
     * @param BlogRequest $request
     * @param Blog $blog
     * @return void
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        //
        if ($blog->user_id !== Auth::user()->id) {
            return to_route('theme.index');
        }
        $data = $request->validated();
        if ($request->hasFile('image')) {
            Storage::delete("public/blogs/$blog->image");
            $image = $request->image;
            $newImageName = time() . "_" . $image->getClientOriginalName();
            $image->storeAs('blogs', $newImageName, 'public');
        }

        $slug = Str::slug($data['title'], '-');
        $blog->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'slug' =>  $slug,
            'category_id' => $data['category'],
            'user_id' => Auth::user()->id,
            'image' => $newImageName,
        ]);
        notyf()->success('Your Blog has been updated.');
        return to_route('theme.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
        $blog->delete();
        notyf()->success('Your Blog has been deletedk.');
        return to_route('theme.index');
    }
    /**
     *  Display  your own blogs 
     */
    public function myBlogs(Blog $blog)
    {
        $myBlogs = $blog->where('user_id', Auth::user()->id)->get();
        return view('theme.blogs.my-blogs', ['myBlogs' => $myBlogs]);
    }
}
