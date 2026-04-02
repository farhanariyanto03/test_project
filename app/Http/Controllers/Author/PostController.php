<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('page.author.post.index', [
            'posts' => Post::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('page.author.post.create.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request): RedirectResponse
    {
        Post::create($this->payload($request));

        return redirect()
            ->route('author.post.index')
            ->with('success', 'Post berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): RedirectResponse
    {
        return redirect()->route('author.post.edit', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {
        return view('page.author.post.update.index', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $post->update($this->payload($request, $post));

        return redirect()
            ->route('author.post.index')
            ->with('success', 'Post berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        if (! empty($post->content)) {
            $oldPath = public_path($post->content);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }
        }

        $post->delete();

        return redirect()
            ->route('author.post.index')
            ->with('success', 'Post berhasil dihapus.');
    }

    /**
     * Build payload for create and update.
     */
    private function payload(StorePostRequest|UpdatePostRequest $request, ?Post $post = null): array
    {
        $data = $request->validated();

        $payload = [
            'user_id' => Auth::id(),
            'title' => $data['title'],
            'date' => $data['date'],
        ];

        if ($request->hasFile('content')) {
            if ($post && ! empty($post->content)) {
                $oldPath = public_path($post->content);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }

            $file = $request->file('content');
            $directory = public_path('content');

            if (! File::isDirectory($directory)) {
                File::makeDirectory($directory, 0755, true);
            }

            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move($directory, $fileName);
            $payload['content'] = 'content/' . $fileName;
        }

        return $payload;
    }
}
