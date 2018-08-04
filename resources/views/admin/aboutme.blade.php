@extends('layouts.app_admin')

@section('title')
    About Me
@endsection

@section('content')
    @include('admin/sidebar')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">About Me</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">About Me</h1>
			</div>
		</div><!--/.row-->
		
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form">
                        <form action="{{ route('aboutme.save') }}" method="POST">
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
                                    <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Save!</button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form">
                                    <div class="form-group">
                                        <br>
                                        <textarea name="editor">{{ count($section) > 0? $section[0]->description: '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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