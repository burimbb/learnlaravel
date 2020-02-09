<?php

namespace Tests\Feature;

use Tests\TestCase;

class AchievmentsTest extends TestCase
{
    /**
     * @test
     */
    public function an_achievment_badge_is_unlocked_when_user_experience_points_pass_100()
    {
        $user = create('App\User');

        $user->getExperience()->awardExperience(1001);

        $this->assertCount(1, $user->achievments);
    }
}
