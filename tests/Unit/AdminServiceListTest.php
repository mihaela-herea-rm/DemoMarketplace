<?php

namespace Tests\Unit;

use App\Enums\Gender;
use App\Enums\UserRoles;
use App\Http\Livewire\AdminServiceList;
use App\Http\Livewire\ContactForm;
use App\Mail\ContactFormMail;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class AdminServiceListTest  extends TestCase
{
    use DatabaseTransactions;

    protected $user;

    protected function fakeUser()
    {
        $this->user = User::factory()->create([
            'email' => 'mihaela.herea+adminlist@imobiliare.ro',
            'password' => bcrypt('mihaela123'),
            'role' => UserRoles::ADMIN,
        ]);
    }

    /** @test */
    public function it_loads_the_correct_livewire_component()
    {
        $this->fakeUser();
        $this->actingAs($this->user);
        $this->get('admin/services')->assertSeeLivewire('admin-service-list');
    }

    /** @test */
    public function datatables_searches_name_correctly()
    {
        $this->fakeUser();
        $this->actingAs($this->user);
        $service1 = Service::factory()->create([
            'title' => 'This is my first service title',
            'slug' => 'some-slug-for-the-first-service',
            'excerpt' => 'This is my first service excerpt',
            'body' => 'This is my first service body',
            'city_id' => 1,
            'category_id' => 1,
            'price' => 200,
            'user_id' => $this->user->id,
            'gender' => Gender::FEMALE,
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg')
        ]);

        $service2 = Service::factory()->create([
            'title' => 'This is my service second title',
            'slug' => 'some-slug-for-the-second-service',
            'excerpt' => 'This is my second service excerpt',
            'body' => 'This is my second service body',
            'city_id' => 1,
            'category_id' => 1,
            'price' => 200,
            'user_id' => $this->user->id,
            'gender' => Gender::FEMALE,
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg')
        ]);

        Livewire::test(AdminServiceList::class)
            ->set('search', 'second title')
            ->assertSee($service1->name)
            ->assertDontSee($service2->name);
    }

    /** @test */
    public function datatables_sorts_name_asc_correctly()
    {
        $this->fakeUser();
        $this->actingAs($this->user);
        $service1 = Service::factory()->create([
            'title' => 'A First service title',
            'slug' => 'some-slug-for-the-first-service',
            'excerpt' => 'This is my first service excerpt',
            'body' => 'This is my first service body',
            'city_id' => 1,
            'category_id' => 1,
            'price' => 200,
            'user_id' => $this->user->id,
            'gender' => Gender::FEMALE,
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg')
        ]);

        $service3 = Service::factory()->create([
            'title' => 'C Third service title',
            'slug' => 'some-slug-for-the-third-service',
            'excerpt' => 'This is my third service excerpt',
            'body' => 'This is my third service body',
            'city_id' => 1,
            'category_id' => 1,
            'price' => 200,
            'user_id' => $this->user->id,
            'gender' => Gender::FEMALE,
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg')
        ]);

        $service2 = Service::factory()->create([
            'title' => 'B Second service title',
            'slug' => 'some-slug-for-the-second-service',
            'excerpt' => 'This is my second service excerpt',
            'body' => 'This is my second service body',
            'city_id' => 1,
            'category_id' => 1,
            'price' => 200,
            'user_id' => $this->user->id,
            'gender' => Gender::FEMALE,
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg')
        ]);

        Livewire::test(AdminServiceList::class)
            ->call('sortBy', 'title')
            ->assertSeeHtmlInOrder(['A First service title', 'B Second service title', 'C Third service title']);
    }

    /** @test */
    public function datatables_sorts_name_desc_correctly()
    {
        $this->fakeUser();
        $this->actingAs($this->user);
        $service1 = Service::factory()->create([
            'title' => 'A First service title',
            'slug' => 'some-slug-for-the-first-service',
            'excerpt' => 'This is my first service excerpt',
            'body' => 'This is my first service body',
            'city_id' => 1,
            'category_id' => 1,
            'price' => 200,
            'user_id' => $this->user->id,
            'gender' => Gender::FEMALE,
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg')
        ]);

        $service3 = Service::factory()->create([
            'title' => 'C Third service title',
            'slug' => 'some-slug-for-the-third-service',
            'excerpt' => 'This is my third service excerpt',
            'body' => 'This is my third service body',
            'city_id' => 1,
            'category_id' => 1,
            'price' => 200,
            'user_id' => $this->user->id,
            'gender' => Gender::FEMALE,
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg')
        ]);

        $service2 = Service::factory()->create([
            'title' => 'B Second service title',
            'slug' => 'some-slug-for-the-second-service',
            'excerpt' => 'This is my second service excerpt',
            'body' => 'This is my second service body',
            'city_id' => 1,
            'category_id' => 1,
            'price' => 200,
            'user_id' => $this->user->id,
            'gender' => Gender::FEMALE,
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg')
        ]);

        Livewire::test(AdminServiceList::class)
            ->call('sortBy', 'title')
            ->call('sortBy', 'title')
            ->assertSeeHtmlInOrder(['C Third service title', 'B Second service title', 'A First service title']);
    }

    /** @test */
    public function datatables_sorts_price_asc_correctly()
    {
        $this->fakeUser();
        $this->actingAs($this->user);
        $service1 = Service::factory()->create([
            'title' => 'A First service title',
            'slug' => 'some-slug-for-the-first-service',
            'excerpt' => 'This is my first service excerpt',
            'body' => 'This is my first service body',
            'city_id' => 1,
            'category_id' => 1,
            'price' => 500,
            'user_id' => $this->user->id,
            'gender' => Gender::FEMALE,
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg')
        ]);

        $service3 = Service::factory()->create([
            'title' => 'C Third service title',
            'slug' => 'some-slug-for-the-third-service',
            'excerpt' => 'This is my third service excerpt',
            'body' => 'This is my third service body',
            'city_id' => 1,
            'category_id' => 1,
            'price' => 200,
            'user_id' => $this->user->id,
            'gender' => Gender::FEMALE,
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg')
        ]);

        $service2 = Service::factory()->create([
            'title' => 'B Second service title',
            'slug' => 'some-slug-for-the-second-service',
            'excerpt' => 'This is my second service excerpt',
            'body' => 'This is my second service body',
            'city_id' => 1,
            'category_id' => 1,
            'price' => 800,
            'user_id' => $this->user->id,
            'gender' => Gender::FEMALE,
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg')
        ]);

        Livewire::test(AdminServiceList::class)
            ->call('sortBy', 'price')
            ->assertSeeHtmlInOrder(['C Third service title', 'A First service title', 'B Second service title']);
    }


    /** @test */
    public function datatables_sorts_price_desc_correctly()
    {
        $this->fakeUser();
        $this->actingAs($this->user);
        $service1 = Service::factory()->create([
            'title' => 'A First service title',
            'slug' => 'some-slug-for-the-first-service',
            'excerpt' => 'This is my first service excerpt',
            'body' => 'This is my first service body',
            'city_id' => 1,
            'category_id' => 1,
            'price' => 500,
            'user_id' => $this->user->id,
            'gender' => Gender::FEMALE,
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg')
        ]);

        $service3 = Service::factory()->create([
            'title' => 'C Third service title',
            'slug' => 'some-slug-for-the-third-service',
            'excerpt' => 'This is my third service excerpt',
            'body' => 'This is my third service body',
            'city_id' => 1,
            'category_id' => 1,
            'price' => 200,
            'user_id' => $this->user->id,
            'gender' => Gender::FEMALE,
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg')
        ]);

        $service2 = Service::factory()->create([
            'title' => 'B Second service title',
            'slug' => 'some-slug-for-the-second-service',
            'excerpt' => 'This is my second service excerpt',
            'body' => 'This is my second service body',
            'city_id' => 1,
            'category_id' => 1,
            'price' => 800,
            'user_id' => $this->user->id,
            'gender' => Gender::FEMALE,
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg')
        ]);

        Livewire::test(AdminServiceList::class)
            ->call('sortBy', 'price')
            ->call('sortBy', 'price')
            ->assertSeeHtmlInOrder(['B Second service title', 'A First service title', 'C Third service title']);
    }

}
