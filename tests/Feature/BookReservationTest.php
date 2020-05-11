<?php

namespace Tests\Feature;

use App\Author;
use App\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookReservationTest extends TestCase
{
    use RefreshDatabase;

    /** @booktest */
    public function test_a_book_can_be_added_to_the_libraly(){

        $response = $this->post('/books', [
            'title' => 'Cool book title',
            'author' => 'John Doe',
        ]);

        $book = Book::first()->id;

        $this->assertCount(1, Book::all());
        $response->assertRedirect('/books/' . $book);
    }

    /** @testtitle */
    public function test_a_title_should_not_be_empty(){

        $response = $this->post('/books', [
            'title' => '',
            'author' => 'John Doe',
        ]);
        
        $response->assertSessionHasErrors('title');
    }


    /** @testauthor */
    public function test_author_should_not_be_empty(){

        $response = $this->post('/books', [
            'title' => 'This is the title',
            'author' => '',
        ]);
        
        $response->assertSessionHasErrors('author');
    }

    /** @testupdatebook */
    public function test_a_book_can_be_updated(){

        $this->post('/books', [
            'title' => 'This is the title',
            'author' => 'John Doe',
        ]);

        $book = Book::first()->id;

        $response = $this->patch('/books/' . $book, [
            'title' => 'New title',
            'author' => 'Jane Doe'
        ]);

        $this->assertEquals('New title', Book::first()->title);
        $this->assertEquals('Jane Doe', Book::first()->author);
        $response->assertRedirect('/books/' .$book);

    }

    /** @testdeleteabook */
    public function test_book_can_be_deleted(){

        $this->post('/books', [
            'title' => 'This is the title',
            'author' => 'John Doe',
        ]);

        $book = Book::first()->id;

        $response = $this->delete('/books/' . $book);

        $this->assertCount(0, Book::all());
        $response->assertRedirect('/books');
    }

    /** @test */
    public function test_a_new_author_is_automatically_added(){

        $this->withoutExceptionHandling();

        $this->post('/books', [
            'title' => 'This is the title',
            'author' => 'John Doe',
        ]);

        $book = Book::first();
        $author = Author::first();

        $this->assertEquals($author->id, $book->author_id);
        $this->assertCount(1, Author::all());
    }
}
