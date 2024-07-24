// resources/views/slides/create.blade.php

@extends('dashboard.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Create Slide</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sliders.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control @error('heading') is-invalid @enderror" id="inputSlideHeading" type="text" name="heading" value="{{ old('heading') }}" placeholder="Enter slide heading" />
                                <label for="inputSlideHeading">Slide Heading</label>
                                @error('heading')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control @error('title') is-invalid @enderror" id="inputSlidetitle" type="text" name="title" value="{{ old('title') }}" placeholder="Enter slide title" />
                                <label for="inputSlideHeading">Slide title</label>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control @error('textData') is-invalid @enderror" id="inputSlideTextData" name="textData" placeholder="Enter slide text" style="height: 100px;">{{ old('textData') }}</textarea>
                                <label for="inputSlideTextData">Slide Text</label>
                                @error('textData')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                           
                            <div class="mb-3">
                                <label for="inputSlideImage" class="form-label">Slide Image</label>
                                <input class="form-control @error('image') is-invalid @enderror" id="inputSlideImage" type="file" name="image" />
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-block" type="submit">Create Slide</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="{{ route('sliders.index') }}">View All Slides</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
