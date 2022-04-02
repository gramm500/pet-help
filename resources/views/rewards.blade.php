@extends('layouts.app')

<div>


    @if($rewards !== [])
        <h2>  Your rewards are </h2>
    @else
        <h2>   You don't have rewards yet</h2>
    @endif

@foreach($rewards as  $reward)
    <h2>
        {{$reward['reward_type']}}
        {{$reward['value']}}
        <form method="post" action="/get-reward/{{$reward['id']}}">
            {{ csrf_field() }}
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Get this reward</button>
        </form>

        <form method="DELETE" action="/delete/{{$reward['id']}}">
            {{ csrf_field() }}
            <button style="cursor:pointer" type="submit" id="{{$reward['id']}} class="deleteButton btn btn-danger">I refuse</button>
        </form>
    </h2>
@endforeach
</div>

<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".deleteButton").click(function(e){

        e.preventDefault();

        let id = $.this.attr('id')

        console.log(id)

        {{--$.ajax({--}}
        {{--    type:'DELETE',--}}
        {{--    url:"{{ route('ajaxRequest.post') }}",--}}
        {{--    data:{name:name, password:password, email:email},--}}
        {{--    success:function(data){--}}
        {{--        alert(data.success);--}}
        {{--    }--}}
        {{--});--}}

    });
</script>