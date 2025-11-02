@extends('layouts.main')
@section('content')
    <div>
        <h2>Preencha os campos abaixo para publicar uma nova vaga</h2>
        <div>
            <x-my_components.job-offer-form :action="route('job-offers.store')" method="POST" :company="$company">
                </x-job-offer-form>
        </div>
    </div>
@endsection
