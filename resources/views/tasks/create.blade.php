@extends('layouts.app')

@section('content')
<script>
function validateForm() {
    document.getElementById("name").required = true;
    document.getElementById("description").required = true;
    document.getElementById("slug").required = true;
}
</script>
<div class="container">
<form name="create" action="{{ route('projects.tasks.store',[$project->id,$project->slug]) }}" method="POST">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    
    <input type="hidden" name="pid" value="{{$project->id}}">
    <input type="hidden" name="pslug" value="{{$project->slug}}">

    <lable for="name" style="display:inline-block;width:100px;">Name</lable>
    <input type="text" name="name" id="name" placeholder="Name">
    <br>
    <label for="description" style="display:inline-block;width:100px;">Description</label>
    <input type="text" name="description" id="description" placeholder="Description">
    <br>
    <label for="slug" style="display:inline-block;width:100px;">Slug</label>
    <input type="text" name="slug" id="slug" placeholder="Slug">
    <br>
    <input type="submit" class="btn btn-primary" onclick="validateForm()" value="Create">
</form>
</div>

@endsection