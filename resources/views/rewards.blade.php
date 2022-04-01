@extends('layouts.app')

<div>
    Your rewards are
@foreach($rewards as  $reward)
    <h2>
        {{$reward->id}}
        {{$reward->reward_type}}
        {{$reward->value}}
        <form method="post" action="/get-reward/{{$reward->id}}">
            {{ csrf_field() }}
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Get this reward</button>
        </form>
    </h2>
@endforeach
</div>>