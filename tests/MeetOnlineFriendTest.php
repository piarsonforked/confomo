<?php

use App\Conference;
use App\Friend;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class MeetOnlineFriendTest extends TestCase
{
    use DatabaseMigrations;

    public function test_when_i_meet_an_online_friend_then_that_person_is_marked_as_met()
    {
        $user = factory(User::class)->create();
        $conference = factory(Conference::class)->make();
        $user->conferences()->save($conference);

        $friend = $conference->planToMeetOnlineFriend('dead_lugosi');

        $this->be($user);
        $this->json('patch', 'api/conferences/' . $conference->id . '/online-friends/' . $friend->id, [
            'met' => true
        ]);

        $this->json('get', 'api/conferences/' . $conference->id . '/online-friends/' . $friend->id);

        $this->seeJson(['met' => true]);
    }
}
