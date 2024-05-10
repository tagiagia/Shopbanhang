<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product')->insert([
            [
                'product_id' => 3,
                'category_id' => 3,
                'brand_id' => 3,
                'product_name' => 'Galaxy A25 5G',
                'product_decs' => 'Samsung Galaxy A25 5G 8GB một trong những mẫu điện thoại tầm trung mới nhất của Samsung được ra mắt vào tháng 12 năm 2023.',
                'product_content' => 'Galaxy A25 5G là một biểu tượng mới của sự tinh tế và hiệu suất trong thiết kế, mang đến trải nghiệm người dùng đỉnh cao',
                'product_price' => '4.240.000',
                'product_image' => 'samsunga15.jpg',
                'product_size' => null, 
                'product_status' => 0,
                'created_at' => null,
                'updated_at' => null,               
            ],    
            [
                'product_id' => 4,
                'category_id' => 4,
                'brand_id' => 4,
                'product_name' => 'Galaxy S23 Ultra 5G',
                'product_decs' => 'Samsung Galaxy S23 Ultra 5G 256GB là chiếc smartphone cao cấp nhất của nhà Samsung',
                'product_content' => 'Galaxy S23 Ultra đã gây ấn tượng mạnh mẽ khi ra mắt với thiết kế đột phá và hiệu suất vượt trội. Vào cuối tháng 3 năm 2024',
                'product_price' => '18.790.000',
                'product_image' => 'samsung00.jpg',
                'product_size' => null, 
                'product_status' => 0,
                'created_at' => null,
                'updated_at' => null,               
            ],           
            [
                'product_id' => 5,
                'category_id' => 5,
                'brand_id' => 5,
                'product_name' => 'Samsung Galaxy A54 5G',
                'product_decs' => 'Samsung Galaxy A54 5G 128GB là mẫu điện thoại tầm trung hiện đang làm mưa làm gió tại thị trường Việt Nam',
                'product_content' => 'Sau hơn 2 tuần trải nghiệm chiếc Galaxy A54 mình thực sự đã rất ngạc nhiên về khả năng chụp ảnh',
                'product_price' => '4.920.000',
                'product_image' => 'samsungGalaxy0.jpg',
                'product_size' => null, 
                'product_status' => 0,
                'created_at' => null,
                'updated_at' => null,               
            ],           
            [
                'product_id' => 6,
                'category_id' => 6,
                'brand_id' => 6,
                'product_name' => 'Samsung  Galaxy M53 5G',
                'product_decs' => 'Tiếp nối thành công của Galaxy M53 5G, Samsung tiếp tục tung ra thị trường mẫu điện thoại Samsung Galaxy M54 5G.',
                'product_content' => 'Điểm đầu tiên mà mình muốn nói sau khi trải nghiệm Galaxy M54 5G chính là phần hiệu năng, máy được trang bị con chip Exynos 1380 8 nhân đầy mạnh mẽ',
                'product_price' => '8.990.000',
                'product_image' => 'samsunggalaxi.png',
                'product_size' => null, 
                'product_status' => 0,
                'created_at' => null,
                'updated_at' => null,               
            ],           
            
        ]);
    }
}
