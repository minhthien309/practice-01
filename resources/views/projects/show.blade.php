@extends('layouts.app')
 
@section('content')
<div class="container">
<h2>{{ $project->name }}</h2>
    @if(session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
    @endif

    @if ( !$project->tasks->count() )
        Your project has no tasks.
    @else
        <ul>
            @foreach( $project->tasks as $task )
                <li><a href="{{ route('projects.tasks.show', [$project->slug, $task->slug]) }}">{{ $task->name }}</a></li>
            @endforeach
            
        </ul>
    @endif
    <a href="{{route('projects.tasks.create',$project->slug) }}">Create</a> 
</div>
@endsection