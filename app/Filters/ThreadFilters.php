<?php

namespace App\Filters;

use App\Models\User;

class ThreadFilters extends Filters
{
    protected $filters = ['by', 'popular'];

    // Filter a query by username
    public function by($username)
    {
        $user = User::where('name', $username)->firstOrFail();

        return $this->builder->where('user_id', $user->id);
    }

    //Filter threads by popularity

    public function popular()
    {
        /*$this->builder->getQuery()->orders = [];*/
        return $this->builder->orderBy('replies_count', 'desc');
    }
}
