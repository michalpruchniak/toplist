@extends('layouts.app')

@section('content')
<div class="container">
    <ul class="top">
        @foreach($toplists as $toplist)
    <a href="{{ route('toplist.top', ['slug' => $toplist->slug]) }}">
            <li>
            <div  class="singleElement"  style ="background-image: url('{{ $toplist->cover }}')" >
                    <div class="name">{{ $toplist->name }}</div>
                </div>
            </li>
            </a>
        @endforeach
    </ul>
</div>
@endsection
