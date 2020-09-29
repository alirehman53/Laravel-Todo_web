@extends('todos.layout')

@section('content')

<h1 class="text-2xl border-b gb-4">Update this todo list</h1>


<x-alert />

<form class="py-5" method="post" action="{{ route('todo.update',$todo->id) }}">

@csrf
@method('patch')

<input class="py-2 px-2 border rounded" value="{{ $todo->title }}" type="text" name="title" />
<input value="Update" class="p-2 border rounded-lg" type="submit" name="Update" />


</form>

<a href="{{ route('todo.index')}}"  class="m-5 py-2 px-1 bg-white-400 cursor-pointer rounded text-black">
back</a>




@endsection