@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                   <h3>Form create a question</h3>
                    <form action="{{ route('question.store') }}" method="post">
                        @include('questions._form',['buttonText' => 'Submit'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
