@extends('admin.layouts.main')

@section('title')
    Update this post: {{$posts->title}}
@endsection

@section('content')

    <div class="card-body col-12">
        <form action="{{route('admin.posts.update', $posts->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="col-6">
                <input class="form-control" name="title" type="text" placeholder="Title"
                       value="{{$posts->title}}">
                @error('title')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mt-5 col-10">
                <label for="summernote">Content for Post</label>
                <textarea id="summernote" name="content">{{$posts->content}}</textarea>
                @error('content')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mt-5 col-4">
                <label for="category">Select the category</label>
                <select id="category" name="category_id" class="custom-select">
                    @foreach($categories as $category)
                        <option
                            {{$category->id == $posts->category_id ? 'selected' : ''}}
                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group col-md-6 pt-5">
                <div>
                    <img src="{{Storage::url($posts->image)}}" alt="image" class="w-50">
                </div>
                <label for="exampleInputFile">Image input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6 pt-5">
                <label for="tag">Select Tag</label>
                <select id="tag" class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Select a Tag"
                        style="width: 100%;">
                    @foreach($tags as $tag)
                        <option
                            {{$posts->tags->contains($tag->id) ? 'selected' : ''}}
                            value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
                @error('tag_ids')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-2 pt-4">
                <button type="submit" class="btn btn-block bg-gradient-primary btn-lg">Update</button>
            </div>

        </form>
    </div>


@endsection
