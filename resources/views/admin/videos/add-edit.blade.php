
@extends('admin.template.layout')

@section('title', $title)
@section('description', 'Videos')

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
            @if (isset($videos))
                {{ Form::model($videos, ['route' => ['video.update', $videos->id], 'method' => 'put','files' => true]) }}
            @else
                {{ Form::open(['route' => 'video.store', 'method' => 'post','files' => true]) }}
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

                <div class="col-md-12">
                    <div class="form-group">
                        {{ Form::label('video', 'Video') }}
                        <span class="text-danger">*</span>
                        {{ Form::text('videofile',null,['class' => 'form-control']) }}
                    </div>
                    <!-- @isset($post)
                    <img src="{{$post->video}}" width="100px">
                    @endisset -->
                </div>
               <div class="col-md-1">
                    <div class="form-group">
                        {{ Form::label('popular', 'Popular') }}
                        <span class="text-danger">*</span>
                        @if(isset($videos))
                            @if($videos->popular == 'on')
                            {{ Form::checkbox('popular','on',true,['class' => 'form-control']) }}
                            @else
                            {{ Form::checkbox('popular','off',false,['class' => 'form-control']) }}
                            @endif
                        @else
                        {{ Form::checkbox('popular','off',false,['class' => 'form-control']) }}
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        {{ Form::hidden('type','Videos', null, ['class' => 'form-control']) }}
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
