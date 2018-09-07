@extends('layouts.app_admin')

@section('title')
    Media
@endsection

@section('content')
    @include('admin/sidebar')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Media</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Media</h1>
			</div>
		</div><!--/.row-->

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('media.upload') }}" method="POST" enctype="multipart/form-data">
                        <div class="input-group">
                                @csrf
                                <input name="media[]" type="file" class="form-control input-md" multiple>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-md"> Upload</button>
                                </span>
                        </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <br>
                        <div class="form">
                            <div class="form-group">
                                {{ $media->links() }}
                                <div class="row">
                                @foreach ($media as $item)
                                    <div class="col-md-3">
                                        <div class="thumbnail">
                                            <img src="/storage/{{ $item->path }}" style="width:220px; height:220px;">
                                            <div class="caption">
                                                <h4>Size: {{ $item->size }} Format: {{ $item->format }}</h4>
                                                <br>
                                                Copy this: <input readonly class="form-control" value="/storage/{{ $item->path }}">
                                                <br><br>
                                                <a href="{{ route('media.delete', $item->id) }}" class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>	<!--/.main-->
@endsection

@section('scripts')
<script>

</script>
@endsection