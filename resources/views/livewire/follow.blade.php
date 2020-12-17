<div>
    <span class="mb-2 mr-2 font-weight-bold">{{ $community->followers(auth()->user())->count() }} followers</span>
    <button wire:click="follow" type="button" class="btn btn-sm btn-primary">
        {{ $following ? 'Unfollow Community' : 'Follow Community' }}
    </button>
</div>
