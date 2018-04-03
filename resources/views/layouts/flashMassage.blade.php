@if (isset($success))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
        <strong><center>{{ $success }}</center></strong>
</div>



@elseif (isset($error))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
        <strong><center>{{ $error }}</center></strong>
</div>



@elseif (isset($warning))
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{{ $warning }}</strong>
</div>



@elseif (isset($info))
<div class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{{ $info }}</strong>
</div>

@endif
