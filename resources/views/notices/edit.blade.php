@extends('dashboard.layout')

@section('content')

<div class="container mt-5">
    <h2>Edit Notice</h2>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form method="POST" action="{{ route('notices.update', $notice->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $notice->title }}" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $notice->date }}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="3" required>{{ $notice->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Notice</button>
    </form>
</div>

@endsection
