<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Create Admin User (only if not exists)
        if (!User::where('email', 'admin@admin.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]);
        }

        // Create Customer Users
        User::create([
            'name' => 'Nguyễn Văn A',
            'email' => 'nguyenvana@email.com',
            'password' => Hash::make('123456'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Trần Thị B',
            'email' => 'tranthib@email.com',
            'password' => Hash::make('123456'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Lê Minh C',
            'email' => 'leminhc@email.com',
            'password' => Hash::make('123456'),
            'role' => 'user',
        ]);

        // Create Categories - KFT Vietnam style
        $ga = Category::create(['name' => 'Gà', 'description' => 'Gà giòn và gà nước KFT']);
        $pizza = Category::create(['name' => 'Pizza', 'description' => 'Pizza các loại']);
        $burger = Category::create(['name' => 'Burger', 'description' => 'Burger và sandwich']);
        $side = Category::create(['name' => 'Phụ gia', 'description' => 'Khoai tây, nước uống']);
        $combo = Category::create(['name' => 'Combo', 'description' => 'Các combo tiết kiệm']);

        // Gà
        Product::create([
            'category_id' => $ga->id,
            'name' => 'Gà Giòn Cay',
            'description' => '6 miếng gà giòn cay đặc trưng, giòn rụm bên ngoài, mềm ngọt bên trong',
            'price' => 79000,
            'image' => 'https://images.unsplash.com/photo-1626082927389-6cd097cdc6ec?w=400',
        ]);

        Product::create([
            'category_id' => $ga->id,
            'name' => 'Gà Miến Trộn',
            'description' => 'Gà xé trộn với miến, rau mầm và sốt đậu phộng',
            'price' => 65000,
            'image' => 'https://images.unsplash.com/photo-1567620832903-9fc6debc209f?w=400',
        ]);

        Product::create([
            'category_id' => $ga->id,
            'name' => 'Gà Nước Truyền Thống',
            'description' => 'Gà nấu theo công thức cổ điển, thơm ngon đậm đà',
            'price' => 89000,
            'image' => 'https://images.unsplash.com/photo-1527477396000-e27163b481c2?w=400',
        ]);

        Product::create([
            'category_id' => $ga->id,
            'name' => 'Gà Popcorn',
            'description' => 'Gà từ thịt ức, cắt nhỏ, giòn tan',
            'price' => 55000,
            'image' => 'https://images.unsplash.com/photo-1598515214211-89d3c73ae83b?w=400',
        ]);

        Product::create([
            'category_id' => $ga->id,
            'name' => 'Gà Xiên Que',
            'description' => '4 xiên gà nướng thơm lừng, ăn kèm sốt BBQ',
            'price' => 49000,
            'image' => 'https://images.unsplash.com/photo-1529692236671-f1f6cf9683ba?w=400',
        ]);

        // Pizza
        Product::create([
            'category_id' => $pizza->id,
            'name' => 'Pizza Gà Nướng',
            'description' => 'Pizza với gà nướng, phô mai mozzarella, nấm và hành tây',
            'price' => 99000,
            'image' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=400',
        ]);

        Product::create([
            'category_id' => $pizza->id,
            'name' => 'Pizza Hải Sản',
            'description' => 'Pizza với tôm, mực, cá ngừ và rau mồng tơi',
            'price' => 129000,
            'image' => 'https://images.unsplash.com/photo-1574071318508-1cdbab80d002?w=400',
        ]);

        Product::create([
            'category_id' => $pizza->id,
            'name' => 'Pizza Phô Mai',
            'description' => 'Pizza 4 loại phô mai: Mozzarella, Cheddar, Parmesan, Gorgonzola',
            'price' => 119000,
            'image' => 'https://images.unsplash.com/photo-1513104890138-7c749659a591?w=400',
        ]);

        Product::create([
            'category_id' => $pizza->id,
            'name' => 'Pizza Thịt Nguội',
            'description' => 'Pizza với thịt nguội, xúc xích, olive và paprika',
            'price' => 109000,
            'image' => 'https://images.unsplash.com/photo-1594007654729-407eedc4be65?w=400',
        ]);

        // Burger
        Product::create([
            'category_id' => $burger->id,
            'name' => 'Zinger Burger',
            'description' => 'Burger gà cay với lớp vỏ bánh mì giòn, phô mai và rau xà lách',
            'price' => 69000,
            'image' => 'https://images.unsplash.com/photo-1610440042657-612c34d95e9f?w=400',
        ]);

        Product::create([
            'category_id' => $burger->id,
            'name' => 'Chicken Burger',
            'description' => 'Burger gà simple nhưng ngon, phù hợp mọi lứa tuổi',
            'price' => 45000,
            'image' => 'https://images.unsplash.com/photo-1550547660-d9450f859349?w=400',
        ]);

        Product::create([
            'category_id' => $burger->id,
            'name' => 'Whopper Jr',
            'description' => 'Burger bò nhỏ với thịt bò nướng, phô mai, cà chua và rau',
            'price' => 55000,
            'image' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=400',
        ]);

        // Phụ gia
        Product::create([
            'category_id' => $side->id,
            'name' => 'Khoai Tây Chiên (Lớn)',
            'description' => 'Khoai tây chiên giòn vàng, size lớn',
            'price' => 32000,
            'image' => 'https://images.unsplash.com/photo-1573080496219-bb080dd4f877?w=400',
        ]);

        Product::create([
            'category_id' => $side->id,
            'name' => 'Khoai Tây Nghiền',
            'description' => 'Khoai tây nghiền mịn màng, béo ngậy',
            'price' => 25000,
            'image' => 'https://images.unsplash.com/photo-1598866594230-a7c12756260f?w=400',
        ]);

        Product::create([
            'category_id' => $side->id,
            'name' => 'Bánh Tẩy Bơ',
            'description' => 'Bánh mì bơ nướng giòn, thơm ngon',
            'price' => 18000,
            'image' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?w=400',
        ]);

        Product::create([
            'category_id' => $side->id,
            'name' => 'Coca Cola',
            'description' => 'Nước ngọt có gas',
            'price' => 15000,
            'image' => 'https://images.unsplash.com/photo-1629203851122-3726ecdf080e?w=400',
        ]);

        Product::create([
            'category_id' => $side->id,
            'name' => 'Trà Đá',
            'description' => 'Trà đá mát lạnh, giải khát',
            'price' => 12000,
            'image' => 'https://images.unsplash.com/photo-1556679343-c7306c1976bc?w=400',
        ]);

        // Combo
        Product::create([
            'category_id' => $combo->id,
            'name' => 'Combo Gà Giòn',
            'description' => '6 Miếng gà giòn + Khoai tây lớn + 2 Ly nước',
            'price' => 149000,
            'image' => 'https://images.unsplash.com/photo-1562967914-608f82629710?w=400',
        ]);

        Product::create([
            'category_id' => $combo->id,
            'name' => 'Combo Burger Gà',
            'description' => '2 Chicken Burger + Khoai tây lớn + 2 Ly nước',
            'price' => 119000,
            'image' => 'https://images.unsplash.com/photo-1551782450-a2132b4ba21d?w=400',
        ]);

        Product::create([
            'category_id' => $combo->id,
            'name' => 'Combo Gia Đình',
            'description' => '12 Miếng gà giòn + 2 Khoai tây lớn + 4 Ly nước',
            'price' => 349000,
            'image' => 'https://images.unsplash.com/photo-1576201836106-db1758fd1c97?w=400',
        ]);

        Product::create([
            'category_id' => $combo->id,
            'name' => 'Combo Kids',
            'description' => '4 Miếng gà popcorn + Khoai tây nhỏ + Nước ép + Toy',
            'price' => 79000,
            'image' => 'https://images.unsplash.com/photo-1594212699903-ec8a3eca50f5?w=400',
        ]);
    }
}
