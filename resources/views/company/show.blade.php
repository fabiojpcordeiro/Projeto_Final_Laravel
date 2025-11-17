@extends('layouts.main')
@section('content')
    <div class="section">
        <h2 class="section-title">Confira e edite os dados de sua empresa</h2>
        <div class="form-layout">
            <x-my_components.company-form 
            :action="route('company.update', $company)" method="PUT" :company="isset($company)? $company : null">
            </x-my_components.company-form>
        </div>
    </div>
@endsection
