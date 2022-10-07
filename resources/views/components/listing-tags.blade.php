{{-- from the database Comma separated value CSV --}}
@props(['tagsCsv'])

@php
    // explode is a built-in function of php that splits a string into different strings on our database the value is laravel,api,backend return value if explode is laravel api backend
    $tags = explode(',', $tagsCsv);
@endphp
<ul class="flex">
    @foreach($tags as $tag)
    <li
        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
    >
        <a href="/?tag={{$tag}}">{{$tag}}</a>
    </li>
    @endforeach
</ul>