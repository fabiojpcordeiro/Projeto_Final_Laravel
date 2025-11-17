@extends('layouts.main')
@section('content')
    <div class="section">
        <div class="form-layout flex flex-col gap-10">

            <livewire:profile.update-profile-information-form />
            <hr>
            <livewire:profile.update-password-form />
            <hr>
            <livewire:profile.delete-user-form />

        </div>
    </div>
@endsection
