<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class AppTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Default App\Item assertion
     *
     * to keep it DRY
     *
     * @return array
     */
    protected function defaulItemtAttr(){
        return collect([
            'title' => 'new title', 
            'description' => 'hello desciption', 
            'image_url' => 'https://example.com/image/test',
        ]);
    }

    /**
     * Lets do a basic app check
     *
     * @return void
     */
    
    /** @test **/
    public function app_can_reach_ok()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /**
     * Function name explain itself 
     *
     * @return void
     */

    /** @test **/
    public function a_user_can_have_an_item() 
    {
        $this->withoutExceptionHandling();

        $user = factory('App\User')->create();

        $item = $user->items()->create($this->defaulItemtAttr()->all());

        $this->assertEquals($this->defaulItemtAttr()['title'], $item->title);
    }
}
