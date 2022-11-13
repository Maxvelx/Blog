@extends('admin.layouts.main')

@section('title')
    Create a new post
@endsection

@section('content')

    <div class="card-body col-12">
        <form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-6">
                <input class="form-control" name="title" type="text" placeholder="Type title new post"
                       value="{{old('title')}}">
                @error('title')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mt-5 col-10">
                <textarea id="summernote" name="content">{{old('content')}}</textarea>
                @error('content')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mt-5 col-4">
                <select name="category_id" class="custom-select">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group col-md-6 pt-5">
                <label for="exampleInputFile">Image input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6 pt-5">
                <label>Select Tag</label>
                <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Select a Tag"
                        style="width: 100%;">
                    @foreach($tags as $tag)
                        <option
                            {{is_array(old('tag_ids')) && in_array($tag->id , old('tag_ids')) ? 'selected' : ''}}
                                                                            value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
                @error('tag_ids')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-2 pt-4">
                <button type="submit" class="btn btn-block bg-gradient-primary btn-lg">Create</button>
            </div>

        </form>
    </div>


@endsection
