<?php
namespace Tests\Unit;
use App\Notifications\NotifyDeletePost;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Notifications\NotifyNewPost;
use App\Notifications\NotifyUpdatePost;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;
class NotificationsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testNewAnswer()
    {
        Notification::fake();
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $user->notify(new NotifyNewPost());
        Notification::assertSentTo(
            [$user], NotifyNewPost::class
        );
    }
    public function testUpdateAnswer()
    {
        Notification::fake();
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $user->notify(new NotifyUpdatePost());
        Notification::assertSentTo(
            [$user], NotifyUpdatePost::class
        );
    }
    public function testDeleteAnswer()
    {
        Notification::fake();
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $user->notify(new NotifyDeletePost());
        Notification::assertSentTo(
            [$user], NotifyDeletePost::class
        );
    }
    public function testNewAnswerNotify()
    {
        Mail::fake();
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $user->notify(new NotifyNewPost());
        if (Mail::failures()) {
            self::assertTrue(false);
        } else {
            self::assertTrue(true);
        }
    }
    public function testUpdateAnswerNotify()
    {
        Mail::fake();
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $user->notify(new NotifyUpdatePost());
        if (Mail::failures()) {
            self::assertTrue(false);
        } else {
            self::assertTrue(true);
        }
    }
    public function testDeleteAnswerNotify()
    {
        Mail::fake();
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $user->notify(new NotifyDeletePost());
        if (Mail::failures()) {
            self::assertTrue(false);
        } else {
            self::assertTrue(true);
        }
    }
}