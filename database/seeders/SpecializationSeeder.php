<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationSeeder extends Seeder
{
    public function run()
    {
        DB::table('specializations')->truncate();
        DB::table('specializations')->insert([
            ['id' => 1, 'name' => 'Tim mạch', 'description' => 'Chuyên khoa tim mạch', 'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBove9SKTk4mYxWwDBXnnjMWZnZprwVPtZVhyStQKO6vg9hJp4sfI1f1QwGuDkMEO2dBJpU0r00b-9wDgXtKfq0NBp5A63If6yRrdFQzCLQ-NPlfapfm6JiIwS-o1FX2Z9_It6K8VkHY8zjXdHjR7VKncvgqdgkI3r2wDdC7QtNbLMiHexebyeJaz-8jC5UAkdoz53bGshRKx-jhw1c5uGTnwpN-Hdes-wwml2zZ5L2T91_1ofT4mFEptY6cqdL9mhQkcYPGWu37tI', 'created_at' => '2025-11-26 18:00:17', 'updated_at' => '2025-11-26 18:00:17'],
            ['id' => 2, 'name' => 'Da liễu', 'description' => 'Chuyên khoa da liễu', 'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCNyEk30uNzYZ11FHMQARMqK5KUsOcL8JusPKtBMZSkS1smSQVlJSNM_7c-2QLFnLSFtw_8jOnmxR4jz8UITgUlhEVjkTutbcf1UT5IpDTBRg9vLqxW2juPdcvzuG7WBTj3NJHOSufbRE3j-s6CYCxdJiPWV8Uuh35UCtAQI8XdZjEVnTM8f4trf53KJGgjo4INVwVeSoLohUVod6YKPZvqopSbq6PSKKcWtkDNqdd87uUGy24MHYISRNdtOYFEORmA3yq-UMkb6yc', 'created_at' => '2025-11-26 18:00:17', 'updated_at' => '2025-11-26 18:00:17'],
            ['id' => 3, 'name' => 'Nhi khoa', 'description' => 'Chuyên khoa nhi', 'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBalBlwXCPu7263yiWUjJuBXac1BeRuTxqEV6dX_c25ehMB5SRgEY3cd8MOF3fuUlBpI8oBjipBOZHoFMce0zvCCU1HGNY4zeTDXKcj6Tidy8jmjzdnpQuryGQwakAaykmRCHXWo4suSI2LtFLz5rR5bLT3S6SuxijTz8SYc8jz_nbPN3RQFQoF-ZbLu2x8_LOHU-AJyX8uj9R5inkEMZmy57Mj3fvooOaJz5q4oNldtjQD1ytcs7Av55cUUGVtV0uwT-v45I0fC-I', 'created_at' => '2025-11-26 18:00:17', 'updated_at' => '2025-11-26 18:00:17'],
            ['id' => 4, 'name' => 'Tiêu hóa', 'description' => 'Chuyên khoa tiêu hóa', 'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuB5x_4rjHQlXM-fsarNCF2Ug9RJ8SCbzfExHp7x7NOtm_AYvILVyG_V-KIJzVGy2vECBN7mEBhZcT_2uQOQR0JmeP9EReG3U1rTV7IHVB0djo4a84UIXlnEz2AJBbWm_hKkl3C34G-lJ834UW022sHbB1o0bEv6LFLgtAxkwsRCHZ2Rmi-cYvDiz1UQqZn6saqFirvliQ_qR9UghYzxDnAKDXE_e0a_U4RLRK-zhK9bPm3zVA0sTHre8824WcvGah_KUaeTbNJUe70', 'created_at' => '2025-11-26 18:00:17', 'updated_at' => '2025-11-26 18:00:17'],
            ['id' => 5, 'name' => 'Sản phụ khoa', 'description' => 'Chuyên khoa sản phụ khoa', 'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuD4gRWSx6rvXWzwPH2T1LLBHrKZiP4FwtnO_9vb781iUrlDi0GTC-QSw06d386v93JPuV30MkrcDXpcrF79XA8-gddyaKq04nMJwgk47lK2_cE-j43ChDul4ZBF0aozqlhoIpOC6lVk5E8C9JdtLC7t1thqh-YiikrLsF1fXbDZt4MS9Fb09eDiVqvdkgOdK4KuuewkMf4PfenLHkg26DFfx1sIBCqDZvkiv7a601GwmvYCW3ckEh7RyfLy4MfNtgtnAt6XUd4iOqU', 'created_at' => '2025-11-26 18:00:17', 'updated_at' => '2025-11-26 18:00:17'],
            ['id' => 6, 'name' => 'Cơ xương khớp', 'description' => 'Chuyên khoa cơ xương khớp', 'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAF3DzSNqjzCeZdWeHuPtiUVU4J5-9gO1ZYkY4_lcjRHOFCs136_5p-CBxJXRRwS8hE80H-llbOjr5FzNWM8dBC9NshmuEk1SxnL-zPeNkRfaNmgaEPyeUgCuDmHkYGSdDK-NPFsVJIuAGvOEOPAZhkqo7zGmo9_k47334qCfL1xkqRmaHpgiam1ZQpXFyQyqRaMBAotFL0fw1Iw1JOwKIRfn59xJLaoRXeTOE5gCkmPcMNsOUH1acE7E_F7F03aoysEafO7a4YXzk', 'created_at' => '2025-11-26 18:00:17', 'updated_at' => '2025-11-26 18:00:17'],
            ['id' => 7, 'name' => 'Mắt', 'description' => 'Chuyên khoa nhãn khoa', 'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDy4yJoid5y4Lc6BQS3fzvxlRmUsED7xnWUXWlThOZam4a-GKM6Ee3g9UcAtC-7wdy8QtGlMBaQj6B4V0SgeHASNnzaiUquspZJkzn67ZvogHsT7RZtLFh9Ff9mYyWnqvn_C0duSpTEvktvzJZt4b7maoPo3M2zaIo39aokl52tWMMnof-gFvdY9cYnW7rS0O7QJv5w3WlkgkaMOxiZ9aHwi5uG4pwEywVFlVePhvZrxJpgT0HT55buRGtDo7p5fCN5MIAo7q94u1A', 'created_at' => '2025-11-26 18:00:17', 'updated_at' => '2025-11-26 18:00:17'],
            ['id' => 8, 'name' => 'Nha Khoa', 'description' => 'Chuyên khoa Nha Khoa', 'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBfUeMdzm50xLTWEuaEugJVq4WjKNysYoudMcf72D1GmIEcnMsPt5ioZ0K1ApRX-Hx1WbJB88R3Q75V505UjuqPaOht7DmXR3AMG996x_iFL6LSGmCxzcvTXCx30e-7vdg0sdqe5cqfprO_NnejxvQAb41EOIOTse-t4rq46CAOORqmjCkqlSiRFOhlqYe3La_LC-S8qSWvs5M5JQFuPSxyG3LOg7kOobqg7lJEp6WHTK_ne7lS1aXuuWnNUjChHzzIn82dleJcLTg', 'created_at' => '2025-11-26 11:00:17', 'updated_at' => '2025-11-26 11:00:17'],
        ]);
    }
}