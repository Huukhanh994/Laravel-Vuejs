@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                   <h3>Edit Quesion</h3>
                    <form action="{{ route('question.update',$question->id) }}" method="post">
                        {{method_field('PUT')}}
                        @include('questions._form',['buttonText' => 'Update question'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
