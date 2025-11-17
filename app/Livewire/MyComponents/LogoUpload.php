<?php

namespace App\Livewire\MyComponents;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class LogoUpload extends Component
{
    use WithFileUploads;
    public $company;
    public $logo;
    public $previewUrl;

    protected $rules = [
        'logo' => 'required|image|max:2048'
    ];

    public function mount(Company $company){
        $this->company = $company;
        $this->previewUrl = $company->logo ? asset('storage/' . $company->logo) : null;
    }
    public function updatedLogo(){
        $this->validateOnly('logo');
        $this->previewUrl = $this->logo->temporaryUrl();
    }
    public function save(){
        $this->validate();
        if($this->company->logo){
            Storage::disk('public')->delete($this->company->logo);
        }
        $path = $this->logo->store('logos', 'public');
        $this->company->update(['logo'=>$path]);
        $this->previewUrl = asset('storage/' . $path);
        session()->flash('success', 'Logo atualizado com sucesso.');
    }

    public function render()
    {
        return view('livewire.logo-upload');
    }
}
