@extends('layouts.app')

@section('title', 'Edit User - Eliska Catering')

@section('content')
<h2>Edit User</h2>

<div class="card mt-3">
    <div class="card-body">
        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            @include('users._form')

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection