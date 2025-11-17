@extends('layouts.main')
@section('content')
    <div class="section">
        <h2 class="section-title">Confira e edite os dados de sua empresa</h2>
        <div class="flex flex-col items-center gap-6 ">
            <div id="logo" class="form-layout mt-10 w-[41%] blue-gradient rounded-2xl p-2 self-center">
                @livewire('my_components.logo_upload', ['company'=>$company])
            </div>

            <div class="form-layout justify-center w-3/4">
                <x-my_components.company-form :action="route('company.update', $company)" method="PUT" :company="isset($company) ? $company : null">
                </x-my_components.company-form>
            </div>
        </div>
    </div>
@endsection
