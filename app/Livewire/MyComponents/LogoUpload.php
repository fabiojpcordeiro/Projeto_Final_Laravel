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

    public function mount(Company $company)
    {
        $this->company = $company;
        if ($company->logo) {
            $this->previewUrl = asset('storage/' . $company->logo);
        } else {
            $this->previewUrl = asset('storage/logos/default/default_logo.png');
        }
    }
    public function updatedLogo()
    {
        $this->validateOnly('logo');
        $this->previewUrl = $this->logo->temporaryUrl();
    }
    public function save()
    {
        $this->validate();
        if ($this->company->logo) {
            Storage::disk('public')->delete($this->company->logo);
        }
        $path = $this->logo->store('logos', 'public');
        $this->company->logo = $path;
        $this->company->save();
        $this->previewUrl = asset('storage/' . $path);
        session()->flash('successLogo', 'Logo atualizado com sucesso.');
    }

    public function render()
    {
        return view('livewire.logo-upload');
    }
}
