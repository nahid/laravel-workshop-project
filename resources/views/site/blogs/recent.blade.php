@extends('site.layouts.master', ['title' => 'Recent Blog'])

@section('container')
    @foreach($blogs as $blog)
<div class="post-preview">
    <a href="post.html">
        <h2 class="post-title">
            {{$blog->title}}
        </h2>
        <h3 class="post-subtitle">
            {!! strip_tags(substr($blog->blog, 0, 100)) !!}
        </h3>
    </a>
    <p class="post-meta">Posted by <a href="#">{{$blog->user->name}}</a> Category <a href="#">{{$blog->category->name}}</a> on {{$blog->time_ago}}</p>
</div>
<hr>
@endforeach
<!-- Pager -->
<ul class="pager">
    <li class="next">
        <a href="#">Older Posts &rarr;</a>
    </li>
</ul>
@endsection
