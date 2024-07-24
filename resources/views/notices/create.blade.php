@extends('dashboard.layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Notice</h3></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('notices.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control @error('title') is-invalid @enderror" id="inputNoticeTitle" type="text" name="title" value="{{ old('title') }}" placeholder="Enter notice title" />
                            <label for="inputNoticeTitle">Notice Title</label>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control @error('content') is-invalid @enderror" id="inputNoticeContent" name="content" placeholder="Enter notice content" style="height: 100px;">{{ old('content') }}</textarea>
                            <label for="inputNoticeContent">Notice Content</label>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control @error('date') is-invalid @enderror" id="inputNoticeDate" type="date" name="date" value="{{ now()->format('Y-m-d') }}" readonly placeholder="Enter notice date" />
                            <label for="inputNoticeDate">Notice Date</label>
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-4 mb-0">
                            <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Create Notice</button></div>
                        </div>
                    </form>
                </div>
                {{-- <div class="card-footer text-center py-3">
                    <div class="small"><a href="{{ route('notices.index') }}">View All Notices</a></div>
                </div> --}}
            </div>
        </div>
    </div>
</div>

@endsection
