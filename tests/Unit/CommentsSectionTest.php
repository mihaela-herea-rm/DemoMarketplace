<?php

namespace Tests\Unit;

use App\Enums\Gender;
use App\Enums\UserRoles;
use App\Http\Livewire\CommentsSection;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;
use Livewire\Livewire;
use Tests\TestCase;

class CommentsSectionTest  extends TestCase
{
    use DatabaseTransactions;

    protected $user;

    protected function fakeUser($role = UserRoles::USER)
    {
        $this->user = User::factory()->create([
            'email' => 'mihaela.herea+comments@imobiliare.ro',
            'password' => bcrypt('mihaela123'),
            'role' => $role,
        ]);
    }

    /** @test */
    public function service_page_contain_livewire_component()
    {
        $this->fakeUser();
        $this->actingAs($this->user);
        $service = Service::factory()->create([
            'title' => 'Service title',
            'slug' => 'some-slug-for-the-service',
            'excerpt' => 'Service excerpt',
            'body' => 'Service body',
            'city_id' => 1,
            'category_id' => 1,
            'price' => 500,
            'user_id' => $this->user->id,
            'gender' => Gender::FEMALE,
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg')
        ]);

        $this->get(route('services.show', $service))
            ->assertSeeLivewire('comments-section');
    }

    /** @test */
    public function unlogged_user_can_see_comments()
    {
        $service = Service::factory()->create([
            'title' => 'Service title',
            'slug' => 'some-slug-for-the-service',
            'excerpt' => 'Service excerpt',
            'body' => 'Service body',
            'city_id' => 1,
            'category_id' => 1,
            'price' => 500,
            'user_id' => 1,
            'gender' => Gender::FEMALE,
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg')
        ]);

        $this->get(route('services.show', $service))
            ->assertSeeLivewire('comments-section');
    }

    /** @test */
    public function a_logged_user_can_post_a_comment()
    {
        $this->fakeUser();
        $this->actingAs($this->user);
        $service = Service::factory()->create([
            'title' => 'Service title',
            'slug' => 'some-slug-for-the-service',
        ]);

        Livewire::test(CommentsSection::class)
            ->set('service', $service)
            ->set('comment', 'This is a comment')
            ->call('postComment')
            ->assertSee('Comment was posted!')
            ->assertSee('This is a comment');
    }

    /** @test */
    public function a_unlogged_user_cannot_post_a_comment()
    {
        $service = Service::factory()->create([
            'title' => 'Service title',
            'slug' => 'some-slug-for-the-service',
        ]);

        Livewire::test(CommentsSection::class)
            ->set('service', $service)
            ->set('comment', 'This is a comment')
            ->call('postComment')
            ->assertDontSee('Comment was posted!')
            ->assertSee('Please log in before posting a comment');
    }

    /** @test */
    public function an_invalid_comment_cannot_be_posted()
    {
        $this->fakeUser();
        $this->actingAs($this->user);
        $service = Service::factory()->create([
            'title' => 'Service title',
            'slug' => 'some-slug-for-the-service',
        ]);

        Livewire::test(CommentsSection::class)
            ->set('service', $service)
            ->set('comment', '')
            ->call('postComment')
            ->assertHasErrors(['comment' => 'required'])
            ->assertDontSee('Comment was posted!')
            ->assertSee('The comment field is required');
    }
}
