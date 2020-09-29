@extends('todos.layout')

@section('content')

<div class="flex justify-center border-b gb-4 py-4">

<h1 class="text-2xl">All Your Todos</h1>
<a href="{{ route('todo.create') }}" class="mx-5 py-2 text-blue-400 cursor-pointer  text-white">
<span class="fas fa-plus-circle"></span></a>


</div>


<ul class="my-5">
<x-alert />
@if($todos->count() > 0)

@foreach($todos as $todo)

<li class="flex justify-between p-2">

<div>

@include('todos.completeButton')

</div>


@if($todo->completed)

<p class="line-through"> {{ $todo->title }} </p>

@else

<p> {{ $todo->title }} </p>

@endif

<div>



<a href="{{ route('todo.edit',$todo->id) }}" 
class="cursor-pointer  text-orange-400  text-white">
<span class="fas fa-edit px-2"></span></a>

<span onclick="event.preventDefault(); if( confirm('Are you really want to delete?') ){  document.getElementById('form-destroy-{{$todo->id}}').submit() }"
 class="fas fa-trash px-2  cursor-pointer  text-red-500  text-white">
</span>

<form style="display:none" id='form-destroy-{{$todo->id }}' action="{{ route('todo.destroy',$todo->id) }}" method="post">
@csrf
@method('delete')
</form>




</div>
</li>

@endforeach
@else
<p> No task Availble Create One</p>
@endif
</ul>


@endsection

