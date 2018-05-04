<!-- /resources/views/projects/index.blade.php -->
@extends('layouts.app')
 
@section('content')

            <div class="container">
    <h2>Projects</h2>
    @if(session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
    @endif

    @if ( !$projects->count() )
        You have no projects
    @else
    
        <ul>
            @foreach( $projects as $project )
                <div class="a">
                <a href="{{route('projects.show',$project->slug)}}">
                    {{$project->name}}
                </a>
                
                </div>

                <div class="b">
                <form action="{{route('projects.destroy',$project->slug)}}" method="POST" data-confirm="Bạn có chắc?">
                    {{ method_field('DELETE') }}
                    <!--tokem-->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                    <button type="submit" class="btn btn-danger" style="display:inline">Delete</button>     
                    <a href="{{route('projects.edit',$project->slug)}}" class="btn btn-primary">Edit</a> 
                </form>
                </div>
                <br>
            
            @endforeach
            <script>
                $(document).on('submit','form[data-confirm]',function(e){
                    if(!confirm($(this).data('confirm'))){
                        e.stopImmediatePropagation();
                        e.preventDefault();
                    }
                });
            </script>
        </ul>
    @endif
 
    <p>
        {!! link_to_route('projects.create', 'Create Project') !!}
    </p>
    </div>
@endsection