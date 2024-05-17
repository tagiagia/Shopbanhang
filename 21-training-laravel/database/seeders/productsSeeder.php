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
                'product_id' => 1,
                'category_id' => 2,
                'brand_id' => 1,
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
                'product_id' => 2,
                'category_id' => 2,
                'brand_id' => 1,
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
                'product_id' => 3,
                'category_id' => 2,
                'brand_id' => 1,
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
                'product_id' => 4,
                'category_id' => 2,
                'brand_id' => 1,
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
            [
                'product_id' => 5,
                'category_id' => 1,
                'brand_id' => 5,
                'product_name' => 'Laptop Dell Inspiron',
                'product_decs' => 'Laptop Dell Inspiron 5430: Vừa là laptop, vừa là tablet',
                'product_content' => 'Laptop Dell Inspiron 5430 sở hữu CPU Intel Core i5 U, card rời NVIDIA GeForce MX550 2 GB, màn hình 14" FHD 1920 x 1080, Ram DDR4 8GB, được Minh Tuấn Mobile phân phối chính thức tại Việt Nam.',
                'product_price' => '18.990.000',
                'product_image' => 'dell.png',
                'product_size' => null, 
                'product_status' => 0,
                'created_at' => null,
                'updated_at' => null,               
            ],   
            [
                'product_id' => 6,
                'category_id' => 1,
                'brand_id' => 4,
                'product_name' => 'Laptop MSI Gaming GF63 Thin',
                'product_decs' => 'Mẫu laptop Gaming "quốc dân" sở hữu mức giá thân thiện phù hợp với mọi game thủ',
                'product_content' => 'Laptop sở hữu bộ vi xử lý Intel Core i5 12450H được tích hợp chung với card rời NVIDIA GeForce RTX 2050 4 GB cho khả năng vận hành tốc độ mọi tác vụ bạn cần từ chơi game giải trí đến làm việc hay thậm chí đồ hoạ.',
                'product_price' => '23.990.000',
                'product_image' => 'laptop.jpg',
                'product_size' => null, 
                'product_status' => 0,
                'created_at' => null,
                'updated_at' => null,               
            ],      
            
        ]);
         DB::table('brand')->insert([
            [
                'brand_id' => 1,
                'brand_name' => 'SamSung',
                'brand_decs' => 'điện thoại samsung',
                'brand_status' => 1,
                'created_at' => '2024-05-14 09:45:25',
                'updated_at' => '2024-05-24 09:45:25',

            ],
            [
                'brand_id' => 2,
                'brand_name' => 'OPPO',
                'brand_decs' => 'điện thoại OPPO',
                'brand_status' => 1,
                'created_at' => '2024-05-14 09:45:25',
                'updated_at' => '2024-05-24 09:45:25',

            ],
            [
                'brand_id' => 3,
                'brand_name' => 'IPhone',
                'brand_decs' => 'điện thoại IPhone',
                'brand_status' => 1,
                'created_at' => '2024-05-14 09:45:25',
                'updated_at' => '2024-05-24 09:45:25',
            ],
            [
                'brand_id' => 4,
                'brand_name' => 'MSI',
                'brand_decs' => 'LapTop MSI',
                'brand_status' => 2,
                'created_at' => '2024-05-14 09:45:25',
                'updated_at' => '2024-05-24 09:45:25',
            ],
            [
                'brand_id' => 5,
                'brand_name' => 'DELL',
                'brand_decs' => 'LapTop DELL',
                'brand_status' => 2,
                'created_at' => '2024-05-14 09:45:25',
                'updated_at' => '2024-05-24 09:45:25',
            ],
        ]);

        DB::table('product_categories')->insert([
            [
                'category_id' => 1,
                'category_name' => 'LapTop',
                'category_decs' => 'LapTop',
                'category_status' => 2,
                'created_at' => '2024-05-14 09:45:25',
                'updated_at' => '2024-05-24 09:45:25',
            ],
            [
                'category_id' => 2,
                'category_name' => 'Điện Thoại',
                'category_decs' => 'Điện Thoại',
                'category_status' => 2,
                'created_at' => '2024-05-14 09:45:25',
                'updated_at' => '2024-05-24 09:45:25',
            ],
        ]);
    }
}
