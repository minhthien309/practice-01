@extends('layouts.app')

@section('content')
<div class="container">
<h2>Create Project</h2>

<form action="{{ route('projects.store')}}" method="POST">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<lable for="name" style="display:inline-block;width:100px;">Project Name</lable>
<input type="text" name="name" id="name" placeholder="Project_name">
<br>
<lable for="slug" style="display:inline-block;width:100px;">Project Slug</lable>
<input type="text" name="slug" id="slug" placeholder="Project-slug">
<br>
    <input type="submit" class="btn btn-primary" onclick="formcheck()">
</form>
</div>

<script>
    function formcheck(){
        document.getElementById("name").required = true;
        document.getElementById("slug").required = true;
    }
</script>

@endsection('content')
