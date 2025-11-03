@extends('layouts.main')
@section('content')
    <div class="section">
        <h2 class="section-title">Edite sua vaga</h2>
        <div">
            <x-my_components.job-offer-form 
            :action="route('job-offers.update', $job_offer)" 
            method="PUT" 
            :company="$company" 
            :job_offer="$job_offer">
            </x-job-offer-form>
        </div>
    </div>
@endsection
