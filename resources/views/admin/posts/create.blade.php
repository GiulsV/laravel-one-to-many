@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Creazione nuovo post</h1>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">
                    Vai a tutti i posts
                    </a>
                </div>
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Titolo</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                placeholder="Inserisci titolo" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Categoria</label>
                        <select name="category_id">
                            <option value="">--Seleziona categoria--</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                {{ $category->id == old('category_id') ? 'selected' : ''}}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label>Contenuto</label>
                        <textarea name="content" class="form-control" @error('content') is-invalid @enderror" rows="10"
                                  placeholder="Scrivi qualcosa" required>
                        {{ old('content') }}
                        </textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            Crea post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection