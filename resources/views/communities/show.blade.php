@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Community: {{ $community->name }}</h2></div>

                <div class="card-body">
{{--                    <span class="mb-2 mr-2 font-weight-bold">{{ $community->followers(auth()->user())->count() }} followers</span>--}}
{{--                    <form action="{{ route('communities.follow', $community->id) }}"--}}
{{--                          method="POST"--}}
{{--                          style="display: inline-block">--}}
{{--                        @csrf--}}
{{--                        <button type="submit" class="btn btn-sm btn-primary">--}}
{{--                            {{ auth()->user()->isFollowing($community) ? 'Unfollow Community' : 'Follow Community' }}--}}
{{--                        </button>--}}
{{--                    </form>--}}
                    @livewire('follow', ['communityId' => $community->id])
                    <br /><hr /><br />
                    <h3 class="mb-4">Latest posts</h3>
                    @forelse ($posts as $post)
                        <a href="{{ route('communities.posts.show', [$community, $post]) }}">
                            <h4>{{ $post->title }}</h4>
                        </a>
                        <p>{{ \Illuminate\Support\Str::words($post->post_text, 10) }}</p>
                        <hr />
                    @empty
                        No posts found.
                    @endforelse

                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
