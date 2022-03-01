<?php

namespace Tests\Unit;

use App\Enums\Gender;
use App\Enums\UserRoles;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ServiceTest  extends TestCase
{
    use DatabaseTransactions;
    protected $user;
    protected $service;

    protected function initPrerequisites()
    {
        $this->fakeUser();
        $this->actingAs($this->user);
    }

    protected function fakeUser()
    {
        $this->user = User::factory()->create([
            'email' => 'mihaela.herea+login@imobiliare.ro',
            'password' => bcrypt('mihaela123'),
            'role' => UserRoles::ADMIN,
        ]);
    }

    protected function fakeService($slug)
    {
        $this->service = Service::factory()->create([
            'title' => 'This is my service title',
            'slug' => $slug,
            'excerpt' => 'This is my service excerpt',
            'body' => 'This is my service body',
            'city_id' => 1,
            'category_id' => 1,
            'price' => 200,
            'user_id' => $this->user->id,
            'gender' => Gender::FEMALE,
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg')
        ]);
    }

    /** @test */
    public function a_service_can_be_added()
    {
        $this->initPrerequisites();
        $this->fakeService('this-is-a-test-slug-add');

        $this->assertDatabaseHas('services', [
            'id' => $this->service->id
        ]);
    }

    /** @test */
    public function a_service_can_be_deleted()
    {
        $this->initPrerequisites();
        $this->fakeService('this-is-a-test-slug-delete');

        $this->assertDatabaseHas('services', [
            'id' => $this->service->id
        ]);
        $this->delete('/admin/services/' . $this->service->id)
            ->assertRedirect('/admin/services');

        $this->assertDatabaseMissing('services', [
            'id' => $this->service->id
        ]);
    }

    /** @test */
    public function a_service_can_be_edited()
    {
        $this->initPrerequisites();
        $this->fakeService('this-is-a-test-slug-update');

        $newTitle = 'This is a new title';

        $this->patch('/admin/services/' . $this->service->id, ['title' => $newTitle])
            ->assertRedirect();

        $this->assertDatabaseMissing('services', [
            'id' => $this->service->id,
            'title' => $newTitle
        ]);
        $this->assertDatabaseHas('services', [
            'id' => $this->service->id,
            'title' => $this->service->title
        ]);
    }

}
