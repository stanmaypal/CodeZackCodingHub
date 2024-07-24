@extends('dashboard.layout')


@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">All Notice</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Notice</li>
    </ol>
    
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Total Notice
        
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
                    <th>Title</th>
                    <th>Content</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Date</th>
                    <th>Status</th>

                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($notices as $notice)
                <tr>
                    <td>{{ $notice->title }}</td>
                    <td>{{ $notice->content }}</td>
                    <td>{{ $notice->date }}</td>

                    

                        <td>
                            @if ($notice->status == 0)
                                <a class="btn btn-warning" href="{{ route('notices.changeStatus', ['notice' => $notice->id, 'status' => 1]) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            @else
                                <a class="btn btn-success" href="{{ route('notices.changeStatus', ['notice' => $notice->id, 'status' => 0]) }}"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('notices.edit', $notice->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                            <form action="{{ route('notices.destroy', $notice->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this Notice?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
