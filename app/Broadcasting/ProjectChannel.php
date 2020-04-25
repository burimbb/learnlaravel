<?php

namespace App\Broadcasting;

use App\User;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectChannel
{
    /**
     * Authenticate the user's access to the channel.
     *
     * @param  \App\User  $user
     * @return array|bool
     */
    public function join(User $user, Project $project)
    {
        return true;
    }
}
