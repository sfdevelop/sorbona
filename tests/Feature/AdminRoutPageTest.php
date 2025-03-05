<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminRoutPageTest extends TestCase
{
    use RefreshDatabase;

    public User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RoleSeeder::class);
        $this->seed(UserSeeder::class);

        $this->user = User::first();
    }

    /**
     * A basic feature test example.
     */
    public function test_admin_category_index_is_accessible()
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('admin.category.index'));

        $response->assertStatus(200);
        $response->assertSee(__('admin.category'));
    }

    public function test_admin_product_index_is_accessible()
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('admin.product.index'));
        $response->assertStatus(200);
        $response->assertSee(__('admin.product'));
    }

    public function test_admin_color_index_is_accessible()
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('admin.color.index'));
        $response->assertStatus(200);
        $response->assertSee(__('admin.color'));
    }

    public function test_admin_slider_index_is_accessible()
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('admin.slider.index'));
        $response->assertStatus(200);
        $response->assertSee(__('admin.slide'));
    }

    public function test_admin_chose_index_is_accessible()
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('admin.chose.index'));
        $response->assertOk();
        $response->assertSee(__('admin.chose'));
    }

    public function test_admin_why_choose_index_is_accessible()
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('admin.whyChoose.index'));
        $response->assertOk();
        $response->assertSee(__('admin.whyChoose'));
    }

    public function test_admin_values_index_is_accessible()
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('admin.values.index'));
        $response->assertOk();
        $response->assertSee(__('admin.values'));
    }

    public function test_admin_offer_index_is_accessible()
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('admin.offer.index'));
        $response->assertOk();
        $response->assertSee(__('admin.offer'));
    }

    public function test_admin_comment_index_is_accessible()
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('admin.comment.index'));
        $response->assertOk();
        $response->assertSee(__('admin.comments'));
    }

    public function test_admin_order_index_is_accessible()
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('admin.order.index'));
        $response->assertOk();
        $response->assertSee(__('admin.orders'));
    }

    public function test_admin_feedback_index_is_accessible()
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('admin.feedback.index'));
        $response->assertOk();
        $response->assertSee(__('admin.feedback'));
    }

    public function test_admin_subscribe_index_is_accessible()
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('admin.subscribe.index'));
        $response->assertOk();
        $response->assertSee(__('admin.subscribe'));
    }
}
