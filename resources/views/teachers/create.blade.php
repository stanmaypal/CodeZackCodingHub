@extends('dashboard.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Add New Teacher</h3></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('teachers.store') }}" enctype="multipart/form-data">
                        @csrf
                        @include('teachers.form')
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Add Teacher</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="{{ route('teachers.index') }}">View All Teachers</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
