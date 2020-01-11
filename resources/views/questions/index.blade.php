@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>All Questions</h2>
                        <div class="ml-auto">
                            <a href="{{ route('question.create') }}" class="btn btn-success">Add question</a>
                        </div>
                    </div>

                </div>

                <div class="card-body">
                @include('layouts._message')
                   @foreach ($questions as $row)
                       <div class="media">
                           <div class="d-flex flex-column counters">
                                <div class="vote">
                                    <strong>{{$row->votes}} </strong> {{str_plural('vote',$row->votes)}}
                                </div>
                                <div class="status {{$row->status}}">
                                    <strong>{{$row->answers_count}} </strong> {{str_plural('answers',$row->answers_count)}}
                                </div>
                                <div class="view">
                                    {{$row->views . " " . str_plural('view',$row->views)}}
                                </div>
                           </div>
                           <div class="media-body">
                                <div class="d-flex align-items-center">
                                    <h3 class="mt-0">({{$row->id}})<a href="{{ $row->url }}">{{$row->title}}</a></h3>
                                    <div class="ml-auto">
                                        @if (Auth::user()->can('update-question',$row))
                                            <a href="{{ route('question.edit',$row->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
                                        @endif
                                        @if (Auth::user()->can('delete-question',$row))
                                            <form action="{{ route('question.destroy',$row->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        @endif
                                    
                                    </div>
                                </div>
                            
                                <p class="lead">
                                    Asked by 
                                <a href="{{$row->user->url}}">{{$row->user->name}}</a>
                                <small class="text-muted">{{$row->created_date}}</small>
                                </p>
                                    {{ str_limit($row->body,250)}}
                           </div>
                       </div>
                       <hr>
                       
                   @endforeach
                   {{$questions->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
