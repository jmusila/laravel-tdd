<?php

namespace Tests\Feature;

use App\Author;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PhpParser\Node\Expr\FuncCall;
use Tests\TestCase;

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_an_author_can_be_created(){

        $this->withoutExceptionHandling();

        $this->post('/author', [
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'dob' => '05/04/1998',
            'password' => 'Password'
        ]);

        $author = Author::all();

        $this->assertCount(1, $author);
        $this->assertInstanceOf(Carbon::class, $author->first()->dob);

    }
}
