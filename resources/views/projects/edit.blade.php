@extends('layouts.app') 
@section('content')
<script>
    function formcheck() {
        document.getElementById("name").required = true;
        document.getElementById("slug").required = true;
    }
</script>
<div class="container">
		<h2>Edit Project</h2>
	<form action="{{ route('projects.update', $project->id) }}" method="POST">
		{{ method_field('PATCH') }}
        <div class="required">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <label for="name" style="display:inline-block;width:100px;">Project Name</label>
        <input type="text" name="name" value="{{$project->name}}" id="name">
        <br>
        <label for="project-slug" style="display:inline-block;width:100px;">Project Slug</label>
        <input type="text" name="slug" value="{{$project->slug}}" id="slug">
        <br>
        </div>
		<input type="submit" class="btn btn-danger" onclick="formcheck()" value="Edit">
    </form>
    
</div>
@endsection