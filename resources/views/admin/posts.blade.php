@extends('layouts.app_admin')

@section('title')
    Posts
@endsection

@section('content')

    @include('admin/sidebar')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Posts</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Posts</h1>
			</div>
		</div><!--/.row-->
		
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <a href="{{ route('posts.create') }}" class="btn btn-default bg-green"><i class="fas fa-puzzle-piece"></i> Add new post</a>
                    </div>
                    <div class="col-md-12">
                        <br>
                        <table id="table-post" class="table"></table>
                    </div>
                </div>
            </div>
        </div>
	</div>	<!--/.main-->
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#table-post').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: '{{ route("posts.get") }}',
                type: 'POST'
            },
            "order": [[ 0, "desc" ]],
            "columns": [
                { "data": "id", "name":"id", "title": "ID#" },
                { "data": "title", "title": "Title" },
                { 
                    "data": function(data) {
                        if(data.status == "1")
                            return '<label class="label label-success">published</label>'
                        else 
                            return '<label class="label label-danger">not published</label>'
                    },"name":"id", "title": "Status" 
                },
                { "data": "name", "title": "Posted By" },
                { "data": "created_at", "title": "Date Posted" },
                { 
                    "data": function(data) {
                        return '<a href="/admin/posts/show/' + data.id + '" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>';
                    },"name":"id", "title": "Action"
                },
            ]
            
        });
    });
</script>
@endsection