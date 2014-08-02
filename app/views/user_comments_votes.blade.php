@extends('layout.user')

@section('title')
    <title>spreadit.io :: {{ $username }}'s comments votes</title>
@stop

@section('style')
@stop

@section('content')
<table>
    <thead>
        <tr>
            <td style="width: 20%">timestamp</td>
            <td style="width: 20%">when</td>
            <td style="width: 20%">username</td>
            <td style="width: 20%">vote</td>
            <td style="width: 20%">comment</td>
        </tr>
    </thead>
    <tbody>
    @foreach ($votes as $vote)
        <tr>
            <td>{{ $vote->created_at }}</td>
            <td>{{ UtilController::prettyAgo($vote->created_at) }}</td>
            <td><a href="/u/{{ $vote->username }}">{{ $vote->username }}</a>({{ $vote->points }})</td>
            <td>{{ $vote->updown == VoteController::UP ? '&#x25B2;' : '&#x25BC;' }} {{ $vote->upvotes }}-{{ $vote->downvotes}} {{ ($vote->upvotes - $vote->downvotes) }}</td>
            <td><a href="/comments/{{ $vote->id }}">{{ $vote->data }}</a></td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $votes->links() }}
@stop

@section('script')
@stop
