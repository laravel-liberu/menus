<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelLiberu\Forms\TestTraits\CreateForm;
use LaravelLiberu\Forms\TestTraits\DestroyForm;
use LaravelLiberu\Forms\TestTraits\EditForm;
use LaravelLiberu\Menus\Models\Menu;
use LaravelLiberu\Tables\Traits\Tests\Datatable;
use LaravelLiberu\Users\Models\User;
use Tests\TestCase;

class MenuTest extends TestCase
{
    use CreateForm, Datatable, DestroyForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'system.menus';

    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = Menu::factory()
            ->make();
    }

    /** @test */
    public function can_store_menu()
    {
        $response = $this->post(
            route('system.menus.store'),
            $this->testModel->toArray()
        );

        $menu = Menu::whereName($this->testModel->name)
            ->first();

        $response->assertStatus(200)
            ->assertJsonFragment([
                'redirect' => 'system.menus.edit',
                'param' => ['menu' => $menu->id],
            ])->assertJsonStructure(['message']);
    }

    /** @test */
    public function can_update_menu()
    {
        $this->testModel->save();

        $this->testModel->name = 'edited';

        $this->patch(
            route('system.menus.update', $this->testModel->id, false),
            $this->testModel->toArray()
        )->assertStatus(200)->assertJsonStructure(['message']);

        $this->assertEquals('edited', $this->testModel->fresh()->name);
    }

    /** @test */
    public function cant_destroy_if_is_parent()
    {
        $parentMenu = Menu::factory()->create([
            'permission_id' => null,
            'has_children' => true,
        ]);

        $this->testModel->parent_id = $parentMenu->id;
        $this->testModel->save();
        $this->delete(route('system.menus.destroy', $parentMenu->id, false))
            ->assertStatus(409);

        $this->assertNotNull($parentMenu->fresh());
    }
}
