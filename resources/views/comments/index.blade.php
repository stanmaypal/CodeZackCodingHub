@extends('dashboard.layout')


@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">All Comment</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Comments</li>
    </ol>
    
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Total Comment
        
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
                    <th scope="col">Student Name</th>
                    <th scope="col">Course</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Image</th>
                    <th scope="col">Date</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th scope="col">Student Name</th>
                    <th scope="col">Course</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Image</th>
                    <th scope="col">Date</th>
                    <th>Status</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->student->student_name }}</td>
                    <td>{{ $comment->student->classModel->name ?? $comment->course }}</td>
                    <td>{{ $comment->comment }}</td>
                    <td>
                        @if($comment->image)
                            <img src="{{ asset('storage/' . $comment->image) }}" alt="Comment Image" class="img-thumbnail" style="width: 100px;">
                        @else
                            No image
                        @endif
                    </td>
                    <td>{{ $comment->created_at->format('d-m-Y H:i') }}</td>
                    <td>
                        @if ($comment->status == 0)
                            <a class="btn btn-warning" href="{{ route('comments.changeStatus', ['comment' => $comment->id, 'status' => 1]) }}">Wait</a>
                        @else
                            <a class="btn btn-success" href="{{ route('comments.changeStatus', ['comment' => $comment->id, 'status' => 0]) }}">Done</a>
                        @endif
                    </td>
                    
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
