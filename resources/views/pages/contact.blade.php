@extends('dashboard.layout')


@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Contact</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Contact</li>
    </ol>
    
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Registerd Contact
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Current Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Current Date</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($contactForms as $contactForm)
                <tr>
                    <td>{{ $contactForm->id }}</td>
                    <td>{{ $contactForm->name }}</td>
                    <td>{{ $contactForm->email }}</td>
                    <td>{{ $contactForm->phone }}</td>
                    <td>{{ $contactForm->message }}</td>
                    <td>{{ $contactForm->current_date }}</td>
                    <td>
                        {{-- <a href="{{ route('contact.show', $contactForm->id) }}" class="btn btn-info">View</a> --}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
