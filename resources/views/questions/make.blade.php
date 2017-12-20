@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">發布問題</div>
				<div class="panel-body">
					<form action="/questions" method="post">
						{!! csrf_field() !!}
						<div class="form-group">
							<label for="title" class="form-label">標題</label>
							<input id="title" type="text" name="title" class="form-control" placeholder="標題">
						</div>
						<div class="form-group">
							<label for="body" class="form-label">內容</label>
							<textarea id="body" name="body" rows="8" class="form-control" placeholder="輸入內容"></textarea>
						</div>
						<!-- 编辑器容器 -->
						<button type="submit" class="btn btn-success pull-right">送出</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection