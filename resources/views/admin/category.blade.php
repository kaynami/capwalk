@extends('layouts.app_admin')

@section('title')
    Category
@endsection

@section('content')
    @include('admin/sidebar')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Category</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Category</h1>
			</div>
		</div><!--/.row-->
		
        <div class="panel panel-default">
            <div class="panel-body">
                <form method="GET" action="{{ route('category.store') }}">
                    <div class="row">
                        <div class="col-md-6">
                            <br>
                            <div class="input-group">
                                <input name="category" class="form-control input-md" placeholder="Type new category here...">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary btn-md">Add</button>
                                </span>
                            </div>
                        </div>
                </form>
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
                url: '{{ route("category.table") }}',
                type: 'POST'
            },
            "order": [[ 0, "desc" ]],
            "columns": [
                { "data": "id", "name":"id", "title": "ID#" },
                { "data": "type", "name":"type", "title": "Type" },
                { 
                    "data": function(data) {
                        return '<a href="/admin/category/delete/' + data.id + '" class="btn btn-warning btn-sm"><i class="fas fa-trash-alt"></i> Delete</a>';
                    },"name":"type", "title": "Action"
                },
            ]
            
        });
    });
</script>
@endsection