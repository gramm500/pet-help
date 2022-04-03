@extends('layouts.app')
@section('content')
    <div>


        @if($rewards !== [])
            <h2> Your rewards are </h2>
        @else
            <h2> You don't have rewards yet</h2>
        @endif

        @foreach($rewards as  $reward)
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">  {{$reward['reward_type']}}</h5>
                    <p class="card-text"> {{$reward['value']}}</p>
                    <form method="post" action="/get-reward/{{$reward['id']}}">
                        {{ csrf_field() }}
                        <button style="cursor:pointer" type="submit" class="btn btn-primary">Get this reward</button>
                    </form>
                    <button style="cursor:pointer" type="submit" id="{{$reward['id']}}"
                            class="deleteButton btn btn-danger">I refuse
                    </button>
                </div>

            </div>

        @endforeach
    </div>
@endsection