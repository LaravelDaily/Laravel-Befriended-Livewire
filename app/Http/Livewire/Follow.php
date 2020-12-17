<?php

namespace App\Http\Livewire;

use App\Models\Community;
use Livewire\Component;

class Follow extends Component
{
    public Community $community;
    public bool $following = false;

    public function mount($communityId)
    {
        $this->community = Community::find($communityId);
        $this->following = auth()->user()->isFollowing($this->community);
    }

    public function render()
    {
        return view('livewire.follow');
    }

    public function follow()
    {
        if ($this->following) {
            $this->community->revokeFollower(auth()->user());
        } else {
            auth()->user()->follow($this->community);
        }

        $this->following = !$this->following;
    }
}
