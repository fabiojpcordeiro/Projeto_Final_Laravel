@extends('layouts.main')
@section('content')
    <div class="mt-24">
        <form action="{{ route('company.destroy', $company) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Deletar</button>
        </form>
    </div>
@endsection
