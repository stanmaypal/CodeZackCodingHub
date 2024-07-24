// resources/views/slides/edit.blade.php

@extends('dashboard.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Edit Slide</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sliders.update', $slide->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-floating mb-3">
                                <input class="form-control @error('heading') is-invalid @enderror" id="inputSlideHeading" type="text" name="heading" value="{{ old('heading', $slide->heading) }}" placeholder="Enter slide heading" />
                                <label for="inputSlideHeading">Slide Heading</label>
                                @error('heading')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control @error('title') is-invalid @enderror" id="inputSlidetitle" type="text" name="title" value="{{ old('title', $slide->title) }}" placeholder="Enter slide title" />
                                <label for="inputSlidetitle">Slide Heading</label>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control @error('textData') is-invalid @enderror" id="inputSlideTextData" name="textData" placeholder="Enter slide text" style="height: 100px;">{{ old('textData', $slide->textData) }}</textarea>
                                <label for="inputSlideTextData">Slide Text</label>
                                @error('textData')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="inputSlideImage" class="form-label">Slide Image</label>
                                <input class="form-control @error('image') is-invalid @enderror" id="inputSlideImage" type="file" name="image" />
                                @if($slide->image)
                                    <img src="{{ asset($slide->image) }}" width="100" alt="{{ $slide->heading }}">
                                @endif
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-block" type="submit">Update Slide</button>
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
