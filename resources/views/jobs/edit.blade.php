@extends('layouts.main')
@section('content')
    <div>
        <h2>Edite sua vaga</h2>
        <div>
            <x-my_components.job-offer-form 
            :action="route('job-offers.update', $job)" 
            method="PUT" 
            :company="$company" 
            :job="$job">
                </x-job-offer-form>
        </div>
    </div>
@endsection
