@extends('layouts.app')

@section('content')

<div class="container">
<form action="{{ route('projects.tasks.update',[$project->id,$task->id]) }}" method="POST">
    {{ method_field('PATCH') }}
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    
    <input type="hidden" name="pslug" value="{{$project->slug}}">

    <lable for="name" style="display:inline-block;width:100px;">Name</lable>
    <input type="text" name="name" id="name" value="{{$task->name}}">
    <br>
    <label for="description" style="display:inline-block;width:100px;">Description</label>
    <input type="text" name="description" id="description" value="{{$task->description}}">
    <br>
    <label for="slug" style="display:inline-block;width:100px;">Slug</label>
    <input type="text" name="slug" id="slug" value="{{$task->slug}}">
    <br>
    <input type="submit" class="btn btn-primary" onclick="formcheck()" value="Sửa">
</form>
</div>
<script>
    function formcheck(){
        document.getElementById("slug").required = true;
        document.getElementById("name").required = true;
        document.getElementById("description").required = true;
    }
</script>

@endsection