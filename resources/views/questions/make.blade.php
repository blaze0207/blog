@extends('layouts.app')
@section('content')
@include('vendor.ueditor.assets')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">發布問題</div>
				<div class="panel-body">
					<form action="/questions" method="post">
						{!! csrf_field() !!}
						<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
							<label for="title" class="form-label">標題</label>
							<input id="title" type="text" value="{{ old('title') }}" name="title" class="form-control" placeholder="標題">
              @if ($errors->has('title'))
              <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
              @endif
						</div>
            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
              <script id="container" name="body" type="text/plain">{!! old('body') !!}</script>
              @if ($errors->has('body'))
              <span class="help-block"><strong>{{ $errors->first('body') }}</strong></span>
              @endif
            </div>
						<button type="submit" class="btn btn-success pull-right">送出</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    var ue = UE.getEditor('container');
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
    });
</script>
@endsection