@extends('layouts.app_admin')

@section('title')
    Post Form
@endsection

@section('content')
    @include('admin/sidebar')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li>
                    <a href="#">
                        <em class="fa fa-home"></em>
                    </a>
                </li>
            <li class="active"><a href="{{ route('posts') }}">Posts</a></li>
                <li class="active">New</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">New Post</h1>
			</div>
		</div><!--/.row-->
		
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="{{ route($request_type) }}" method="POST">
                        @csrf
                <div class="row">
                    <div class="col-md-7">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form">
                            <button type="submit" class="btn btn-info"><i class="fas fa-paper-plane"></i> Add this!</button>
                            <div class="form-group">
                                <br>
                                <label>Title</label>
                                <input name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                    <label>Subtitle</label>
                                    <input name="subtitle" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Header Image</label>
                                <input name="image_link" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="0" selected> -- Not Published -- </option>
                                    <option value="1"> -- Published -- </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category" class="form-control">
                                    @foreach($category as $item)
                                        <option value="{{ $item->id }}"> {{ $item->type }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form">
                            <div class="form-group">
                                <textarea name="editor"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
	</div>	<!--/.main-->
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor' );
</script>
@endsection