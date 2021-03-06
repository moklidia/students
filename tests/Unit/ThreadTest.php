<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;
    
    protected $thread;
    
    public function setUp()
    {
        parent::setUp();

        $this->thread = create('App\Models\Thread');
    }
    /**
     * @test
     */
    public function a_thread_can_have_replies()
    {
        

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);
    }

    /**
     * @test
     */
    public function a_thread_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->thread->creator);
    }

     /**
      * @test
      */
    public function a_thread_can_have_a_reply()
    {
        $this->thread->addReply(
            [
            'body' => 'Foobar',
            'user_id' => 1
            ]
        );

        $this->assertCount(1, $this->thread->replies);
    }

    /**
      * @test
      */
    public function a_thread_belongs_to_a_channel()
    {
      
        $this->assertInstanceOf('App\Models\Channel', $this->thread->channel);
    }

      /**
      * @test
      */
    public function a_thread_can_make_a_string_path()
    {
        /*$thread = create('App\Models\Thread');*/
        $this->assertEquals('/threads/'.$this->thread->channel->slug.'/'.$this->thread->id, $this->thread->path());
    }
}
