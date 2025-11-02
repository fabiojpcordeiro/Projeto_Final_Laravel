@extends('layouts.main')
@section('content')
    <div class="text-center">
        
        <livewire:profile.update-profile-information-form />

        <livewire:profile.update-password-form />

        <livewire:profile.delete-user-form />

    </div>
@endsection
