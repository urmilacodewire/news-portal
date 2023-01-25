
@extends('admin.template.layout')

@section('title', $title)
@section('description', 'Posts')

{{-- page content --}}
@section('content')
<div class="container-fluid">
    <div class="card card-custom card-custom gutter-t" id="estimator">
        <div class="card-header py-3">
            <div class="card-title">
                <h3 class="card-label">{{ $title }}</h3>
            </div>
        </div>
        <div class="card-body">
            @if (isset($posts))
                {{ Form::model($posts, ['route' => ['posts.update', $posts->id], 'method' => 'put','files' => true]) }}
            
            @else
                {{ Form::open(['route' => 'posts.store', 'method' => 'post','files' => true]) }}
            @endif
            <div class="row">
                 <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('Category', 'Choose Category') }}
                        <span class="text-danger">*</span>
                         {{ Form::select('category',$categories, null, ['class' => 'form-control','placeholder' => 'Select']) }}
                    
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('title', 'Title') }}
                        <span class="text-danger">*</span>
                        {{ Form::text('title', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-md-6">  
                    <div class="form-group">
                        {{ Form::label('image', 'Image') }}
                        <span class="text-danger">*</span>
                        {{ Form::file('image',['class' => 'form-control']) }}
                    </div>
                    @isset($post)
                    <img src="{{$post->image}}" width="100px">
                    @endisset
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('title', 'SEO Title') }}
                        <span class="text-danger">*</span>
                        {{ Form::text('meta_title', null, ['class' => 'form-control','maxlength'=>60]) }}
                    </div>
                </div>
                <div class="col-md-6">  
                    <div class="form-group">
                        {{ Form::label('metakeywords', 'SEO Keywords') }}
                        <span class="text-danger">*</span>
                        {{ Form::text('meta_keyword',null,['class' => 'form-control','maxlength'=>100]) }}
                    </div>
                </div>
               
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('metadesc', 'SEO Description') }}
                        <span class="text-danger">*</span>
                        {{ Form::textarea('meta_desc', null, ['class' => 'form-control','rows'=>'1','maxlength'=>160]) }}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        {{ Form::label('description', 'Description') }}
                        <span class="text-danger">*</span>
                        {{ Form::textarea('description', null, ['class' => 'form-control','rows'=>2]) }}
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        {{ Form::label('popular', 'Popular') }}
                        <span class="text-danger">*</span>
                        @if(isset($posts))
                            @if($posts->popular == 'on')
                            {{ Form::checkbox('popular','on',true,['class' => 'form-control']) }}
                            @else
                            {{ Form::checkbox('popular','off',false,['class' => 'form-control']) }}
                            @endif
                        @else
                        {{ Form::checkbox('popular','off',false,['class' => 'form-control']) }}
                        @endif

                        </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">    
                        {{ Form::hidden('type','Blogs', null, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-light-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection


@section('style')
@endsection

@section('script')

<script>
CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{ route('posts.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
})
</script>
@endsection
