<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookReservationTest
 extends TestCase
{
    /** @test */
    public function test_a_book_can_be_added_to_the_libraly(){

        $this->withoutExceptionHandling();

        $response = $this->post('/books', [
            'title' => 'Cool book title',
            'author' => 'John Doe',
        ]);

        $response->assertOk();
        $this->assertCount(1, Book::all());
    }
}
