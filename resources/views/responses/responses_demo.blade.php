<style>
	.danger{color:red;}
	.info {color:blue;}
</style>
@if(Session::has('message'))
	<span class={!! Session::get('level') !!}>
		{!! Session::get('message') !!}
	</span>
	
@endif