<?php

namespace Tests\Feature;

use App\Filament\Resources\Products\Pages\CreateProduct;
use App\Filament\Resources\Products\Pages\EditProduct;
use App\Filament\Resources\Products\Pages\ListProducts;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ProductDashboardTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;
    private Category $category;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::factory()->create([
            'email' => 'admin@example.com',
            'name'  => 'System Admin',
        ]);

        $this->category = Category::query()->create([
            'name'  => 'أجهزة الكاشير',
            'slug'  => 'pos-devices',
            'image' => null,
        ]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function admin_can_view_products_list_page(): void
    {
        Product::query()->create([
            'category_id'  => $this->category->id,
            'name'         => 'Test Product',
            'slug'         => 'test-product',
            'brand'        => 'TestBrand',
            'description'  => 'وصف تجريبي',
            'price'        => null,
            'is_in_stock'  => true,
        ]);

        Livewire::actingAs($this->admin)
            ->test(ListProducts::class)
            ->assertSuccessful()
            ->assertSee('Test Product');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function admin_can_create_a_new_product(): void
    {
        Livewire::actingAs($this->admin)
            ->test(CreateProduct::class)
            ->fillForm([
                'category_id' => $this->category->id,
                'name'        => 'منتج جديد',
                'slug'        => 'new-product',
                'brand'       => 'GSAN',
                'description' => 'وصف المنتج الجديد.',
                'price'       => null,
                'is_in_stock' => true,
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('products', [
            'name'  => 'منتج جديد',
            'slug'  => 'new-product',
            'brand' => 'GSAN',
            'price' => null,
        ]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function admin_can_update_product_name_and_description(): void
    {
        $product = Product::query()->create([
            'category_id'  => $this->category->id,
            'name'         => 'اسم قديم',
            'slug'         => 'old-name',
            'brand'        => 'OldBrand',
            'description'  => 'وصف قديم',
            'price'        => null,
            'is_in_stock'  => true,
        ]);

        Livewire::actingAs($this->admin)
            ->test(EditProduct::class, ['record' => $product->slug])
            ->fillForm([
                'name'        => 'اسم جديد',
                'description' => 'وصف جديد محدث',
                'brand'       => 'NewBrand',
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('products', [
            'id'          => $product->id,
            'name'        => 'اسم جديد',
            'description' => 'وصف جديد محدث',
            'brand'       => 'NewBrand',
        ]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function admin_can_toggle_product_stock_status(): void
    {
        $product = Product::query()->create([
            'category_id'  => $this->category->id,
            'name'         => 'Scale Label Pro 15K PLU',
            'slug'         => 'scale-label-pro-15k',
            'brand'        => 'Label Pro',
            'description'  => 'ميزان تسعير',
            'price'        => null,
            'is_in_stock'  => true,
        ]);

        Livewire::actingAs($this->admin)
            ->test(EditProduct::class, ['record' => $product->slug])
            ->fillForm(['is_in_stock' => false])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('products', [
            'id'          => $product->id,
            'is_in_stock' => false,
        ]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function admin_can_set_product_price_from_null_to_value(): void
    {
        $product = Product::query()->create([
            'category_id'  => $this->category->id,
            'name'         => 'GSAN Cash Drawer 410mm',
            'slug'         => 'gsan-cash-drawer-410',
            'brand'        => 'GSAN',
            'description'  => 'درج نقود',
            'price'        => null,
            'is_in_stock'  => true,
        ]);

        Livewire::actingAs($this->admin)
            ->test(EditProduct::class, ['record' => $product->slug])
            ->fillForm(['price' => 3500])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('products', [
            'id'    => $product->id,
            'price' => 3500,
        ]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function product_edit_form_fails_validation_without_required_name(): void
    {
        $product = Product::query()->create([
            'category_id'  => $this->category->id,
            'name'         => 'اسم كامل',
            'slug'         => 'full-name',
            'brand'        => 'Brand',
            'description'  => 'وصف',
            'price'        => null,
            'is_in_stock'  => true,
        ]);

        Livewire::actingAs($this->admin)
            ->test(EditProduct::class, ['record' => $product->slug])
            ->fillForm(['name' => ''])
            ->call('save')
            ->assertHasFormErrors(['name']);
    }
}
