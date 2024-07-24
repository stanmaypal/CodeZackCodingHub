@extends('dashboard.layout');


@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Slide</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Slider</li>
    </ol>
    
    <div class="card-header">   
        <i class="fas fa-table me-1"></i>
        Registerd Slide
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="card-body">
        <table id="datatablesSimple" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Heading</th>
                    {{-- <th>Text</th> --}}
                    <th>Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Heading</th>
                    {{-- <th>Text</th> --}}
                    <th>Actions</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($slides as $slide)
                <tr>
                    <td>{{ $slide->id }}</td>
                    <td>
                        @if($slide->image)
                            <img src="{{ asset($slide->image) }}" width="100" alt="{{ $slide->heading }}">
                        @endif
                    </td>
                    <td>{{ $slide->heading }}</td>
                    {{-- <td>{{ $slide->textData }}</td> --}}
                    <td>
                        <a href="{{ route('sliders.edit', $slide->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('sliders.destroy', $slide->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this slide?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
