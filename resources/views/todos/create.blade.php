@extends('todos.layout')

@section('content')

<h1 class="text-2xl border-b gb-4">What next you need To-Do</h1>
<x-alert />

<form class="py-5" method="post" action="{{ route('todo.store') }}">

@csrf

<input class="py-2 px-2 border rounded" type="text" name="title" />
<input class="p-2 border rounded-lg" type="submit" name="Create" />


</form>

<a href=" {{ route('todo.index')}}" class="m-5 py-2 px-1 bg-white-400 cursor-pointer rounded text-black">
back</a>

@endsection