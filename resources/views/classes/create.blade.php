@extends('dashboard.layout')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Class</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('classes.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control @error('name') is-invalid @enderror" id="inputClassName" type="text" name="name" value="{{ old('name') }}" placeholder="Enter class name" />
                                <label for="inputClassName">Class Name</label>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control @error('description') is-invalid @enderror" id="inputClassDescription" name="description" placeholder="Enter class description" style="height: 100px;">{{ old('description') }}</textarea>
                                <label for="inputClassDescription">Class Description</label>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="inputClassLogo" class="form-label">Class Logo</label>
                                <input class="form-control @error('logo') is-invalid @enderror" id="inputClassLogo" type="file" name="logo" />
                                @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Create Class</button></div>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="card-footer text-center py-3">
                        <div class="small"><a href="{{ route('classes.index') }}">View All Classes</a></div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

@endsection
