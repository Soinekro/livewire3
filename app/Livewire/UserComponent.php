<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use WithPagination;

    #[Locked]
    public $id;

    private $user;
    #[Url()]
    public $search;
    #[Url()]
    public $sort = 'name';
    #[Url()]
    public $direction = 'desc';
    #[Url()]
    public $perPage = '5';

    public $readyToLoad = false;
    public $open = false;

    public $name;
    public $email;
    public $apellido_materno;
    public $apellido_paterno;
    public $password;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'apellido_materno' => 'required',
        'apellido_paterno' => 'required',
        'password' => 'required',
    ];

    public function edit(User $user)
    {
        $this->name = $user->name;
        $this->apellido_paterno = $user->apellido_paterno;
        $this->apellido_materno = $user->apellido_materno;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->open = true;
    }

    public function create()
    {
        $this->open = true;
    }

    public function update()
    {
        $this->validate();
        $this->user->save();
        $this->open = false;
        $this->reset('user');
    }

    public function loadUsers()
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

    public function render()
    {
        $users = User::query()
            ->where('name', 'LIKE', "%{$this->search}%")
            ->orWhere('email', 'LIKE', "%{$this->search}%")
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->perPage);

        return view('livewire.user-component', compact('users'));
    }
}
