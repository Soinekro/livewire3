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
    protected $id;

    public $action = 'create';

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

    public function destroy(Post $post)
    {
        $post->delete();
        $this->alert('El post <b>' . $post->title . '</b> se eliminó satisfactoriamente', 'error', 'satisfactorio');
    }

    public function create()
    {
        $this->open = true;
        $this->reset(['title', 'excerpt', 'body', 'status']);
    }
    public function edit(Post $post)
    {
        $this->post = $post;
        $this->action = 'update';
        $this->fill($post);

        $this->open = true;
    }

    public function save()
    {
        $this->validate();
        // dd($this->action);
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
        $this->alert('El post ' . $post->title . ' se '.$this->action.' satisfactoriamente', 'success', 'satisfactorio');
        $this->reset(['open', 'title', 'excerpt', 'body', 'status'/* , 'post' */, 'action']);
    }
}
