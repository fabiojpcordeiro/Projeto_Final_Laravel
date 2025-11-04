@extends('layouts.main')
@section('content')
    <div class="section">
        <h2 class="section-title">Preencha os dados de sua empresa para começar a anunciar.</h1>
        <div>
            <x-my_components.company-form :action="route('storeCompany')" method="POST" :company="isset($company)? $company : null" >
            </x-my_components.company-form>
        </div>
    </div>
@endsection 
