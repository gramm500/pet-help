@extends('layouts.app')

<div>
    <h2>I would like to play a game with you</h2>
    <form method="POST" action="/play">
        @csrf
        <button style="cursor:pointer" type="submit" class="btn btn-primary">Play</button>
    </form>
</div>>