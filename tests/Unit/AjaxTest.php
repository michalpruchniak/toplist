<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AjaxTest extends TestCase
{

    public function test_status_of_display_elements()
    {
        $response = $this->get('/ajax/displayelements/1');
        $response->assertStatus(200);
    }

    public function test_two_elements_belongs_to_toplist()
    {
        $response = $this->get('/ajax/displayelements/1');
         $response->assertJsonCount(2, $key = null);
    }

    public function test_empty_json_if_toplist_doesnt_exist()
    {
        $response = $this->get('/ajax/displayelements/99999');
        $response->assertJsonCount(0, $key = null);
    }

}
