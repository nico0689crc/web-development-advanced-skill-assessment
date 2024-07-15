<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MemberTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
        $this->actingAs($user);
    }

    /** @test */
    public function itShowsTheMembersIndexPage()
    {
        $response = $this->get(route('members.index'));

        $response->assertStatus(200);
        $response->assertViewIs('members.index');
        $response->assertSee('All members');
    }

    /** @test */
    public function it_shows_the_create_post_page()
    {
        $response = $this->get(route('members.create'));

        $response->assertStatus(200);
        $response->assertViewIs('members.create');
        $response->assertSee('Create New Post');
    }

    /** @test */
    public function it_shows_the_post_detail_page()
    {
        $post = Post::factory()->create();

        $response = $this->get(route('members.show', $post->id));

        $response->assertStatus(200);
        $response->assertViewIs('members.show');
        $response->assertSee($post->title);
        $response->assertSee($post->content);
    }

    /** @test */
    public function it_shows_the_edit_post_page()
    {
        $post = Post::factory()->create();

        $response = $this->get(route('members.edit', $post->id));

        $response->assertStatus(200);
        $response->assertViewIs('members.edit');
        $response->assertSee('Edit Post');
    }
}
