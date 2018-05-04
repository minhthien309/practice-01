@extends('layouts.app')
 

@section('content')
<div class="container">
    @if(session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
    @endif
    <h2>
        {!! link_to_route('projects.show', $project->name, [$project->slug]) !!} -
        {{ $task->name }}
    </h2>
    </style>
    <label style="display:inline-block;width:100px;">Name</label> {{$task->name}}
    <br>
    <label style="display:inline-block;width:100px;">Description</label> {{$task->description}}
    <br>
    <label style="display:inline-block;width:100px;">Slug</label> {{$task->slug}}
    <br>
    <div class="btn">
    <form action="{{route('projects.tasks.destroy',[$project->slug,$task->slug])}}" method="POST" data-confirm="Bạn có chắc?">
        {{ method_field('DELETE')}}
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <button type="submit" class="btn btn-danger">Delete</button>
        <a href="{{route('projects.tasks.edit',[$project->slug,$task->slug])}}" class="btn btn-primary" id="edit">Edit</a>
    </form>
    
    </div>
    <script>
        $(document).on('submit','form[data-confirm]',function(e){
            if(!confirm($(this).data('confirm'))){
                e.stopImmediatePropagation();
                e.preventDefault();
            }
        });        
    </script>
</div>
@endsection