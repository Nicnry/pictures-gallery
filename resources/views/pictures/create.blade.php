@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New picture for gallery : ') }} {{$gallery->name}}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('galleries.pictures.store', $gallery) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="path" class="col-md-4 col-form-label text-md-right">{{ __('Chemin') }}</label>

                            <div class="col-md-6">
                                <input id="path" type="file" class="form-control{{ $errors->has('path') ? ' is-invalid' : '' }}" name="path" value="{{ old('path') }}" required autofocus>

                                @if ($errors->has('path'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('path') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input type="hidden" name="picture-url" value="{{ Directo::formUrl() }}">
                        {!! Directo::inputsAsHtml() !!}

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button id="create-picture" type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
