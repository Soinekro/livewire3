<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use WithPagination;

    // #[Locked]
    public $user;

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
    public $birthday;
    public $password;
    public $document_type = 'dni';
    public $document_number;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function edit(User $user)
    {

        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->document_type = $user->document_type;
        $this->document_number = $user->document_number;
        $this->open = true;
    }

    public function update()
    {
        $this->validate();
        $this->user->update([
            'name' => $this->name,
            'document_type' => $this->document_type,
            'document_number' => $this->document_number,
        ]);
        $this->open = false;
        //$this->reset('user', 'name', 'document_type', 'document_number');
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

    #[On('parametersPersona')]
    public function parametersPersona($persona)
    {
        $this->name = $persona->name;
        $this->email = $persona->email;
        $this->password = $persona->password;
        $this->open = true;
    }

    public function searchDocument()
    {
        $this->validate([
            'document_type' => 'required|in:dni,ruc',
            'document_number' => $this->document_type == 'dni'
                ? 'required|numeric|digits:8'
                : 'required|numeric|digits:11',
        ]);

        $curl = curl_init();

        // Buscar dni
        curl_setopt_array($curl, array(
            CURLOPT_URL => config('services.api_net.url') . $this->document_type . '?numero=' . $this->document_number,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 2,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Referer: https://apis.net.pe/consulta-dni-api',
                'Authorization: Bearer ' . config('services.api_net.token'),
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // Datos listos para usar
        $persona = json_decode($response);
        if (isset($persona->nombre)) {
            $this->name = $persona->nombre;
        } else {
            $this->name = null;
            $this->addError('document_number', 'El número de documento no existe');
        }
    }
}
