@extends('layouts.master')

@section('content')
	<h2>PHP</h2>
	<p>{!!$kh!!}</p>

	<?php $laptrinh = ['HTML', 'CSS', 'JS', 'PHP', 'Ruby']; ?>
	@forelse($laptrinh as $lt)
		@continue($lt=='JS')
		{{$lt}}
	@empty
		{{"Khong co khoa hoc lap trinh"}}
	@endforelse
@endsection
