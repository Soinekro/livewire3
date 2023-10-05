<?php

namespace App\Livewire\Admin\Post;

use App\Models\Post;
use App\Traits\AlertTrait;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Url;

class PostIndex extends Component
{
    use WithPagination;
    use AlertTrait;


    #[Locked]
    public $id;

    public $post;
    #[Url()]
    public $search;
    #[Url()]
    public $sort = 'title';
    #[Url()]
    public $direction = 'desc';
    #[Url()]
    public $perPage = '5';

    //carga de datos
    public $readyToLoad = false;

    private $slug;
    public $title;
    public $excerpt;
    public $body;
    public $status = 'draft';

    //modal
    public $open = false;

    protected $rules = [
        'title' => 'required',
        'excerpt' => 'required',
        'body' => 'required',
        'status' => "required|in:draft,published",
    ];

    public function render()
    {
        if ($this->readyToLoad) {
            $posts = Post::with('author')
                ->filter(['search' => $this->search])
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->perPage);
        } else {
            $posts = [];
        }
        return view('livewire.admin.post.post-index', compact('posts'));
    }

    public function loadPosts()
    {
        $this->readyToLoad = true;
    }


    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function destroy($post)
    {
        $post = Post::find($post);
        $post->delete();
        $this->alert('El post ' . $post->name . ' se eliminó satisfactoriamente', 'error', 'satisfactorio');
    }

    public function create()
    {
        $this->open = true;
        $this->reset(['title', 'excerpt', 'body', 'status']);
    }
    public function edit($post)
    {
        $this->post = Post::find($post);
        $this->title = $this->post->title;
        $this->excerpt = $this->post->excerpt;
        $this->body = $this->post->body;
        $this->status = $this->post->status;
        $this->slug = $this->post->slug;
        $this->open = true;
    }

    public function save()
    {
        $this->validate();
        $post = Post::updateOrCreate(
            [
                'id' => $this->post->id ?? null,
            ],
            [
                'title' => $this->title,
                'excerpt' => $this->excerpt,
                'body' => $this->body,
                'slug' => Str::slug($this->title),
                'status' => $this->status,
                'published_by' => auth()->user()->id,
            ]
        );
        $this->reset(['open', 'title', 'excerpt', 'body', 'status']);
        $this->alert('El post ' . $post->name . ' se guardó satisfactoriamente', 'success', 'satisfactorio');
    }
}
