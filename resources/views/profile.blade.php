@extends('layouts.main')
@section('content')
    <div class="section">
        <div class="form-layout">

            <livewire:profile.update-profile-information-form />

            <livewire:profile.update-password-form />

            <livewire:profile.delete-user-form />

        </div>
    </div>
@endsection
