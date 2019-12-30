@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List Questions</div>

                <div class="card-body">
                   @foreach ($questions as $row)
                       <div class="media">
                           <div class="d-flex flex-column counters">
                                <div class="vote">
                                    <strong>{{$row->votes}} </strong> {{str_plural('vote',$row->votes)}}
                                </div>
                                <div class="status {{$row->status}}">
                                    <strong>{{$row->answers}} </strong> {{str_plural('answers',$row->answers)}}
                                </div>
                                <div class="view">
                                    {{$row->views . " " . str_plural('view',$row->views)}}
                                </div>
                           </div>
                           <div class="media-body">
                           <h3 class="mt-0"><a href="{{ $row->url }}">{{$row->title}}</a></h3>
                            <div class="lead">
                                Asked by 
                            <a href="{{$row->user->url}}">{{$row->user->name}}</a>
                            <small class="text-muted">{{$row->created_date}}</small>
                            </div>
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
