@extends('layouts.app')
@section('content')
<div
  class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden"
>
  <div class="layout-container flex h-full grow flex-col">
    <div
      class="px-4 sm:px-8 md:px-12 lg:px-20 xl:px-40 flex flex-1 justify-center py-5"
    >
      <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
        <main class="w-full py-10 px-4 md:px-0">
          <div class="flex flex-col gap-4 text-center mb-10">
            <h1
              class="text-3xl font-bold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl"
            >
              Khám Phá Các Chuyên Khoa
            </h1>
            <p class="text-lg text-slate-600 dark:text-slate-400">
              Tìm kiếm bác sĩ theo chuyên khoa phù hợp với nhu cầu sức khỏe của
              bạn.
            </p>
          </div>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div
              class="flex flex-col overflow-hidden rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 shadow-sm hover:shadow-lg transition-shadow duration-300"
            >
              <div
                class="w-full h-40 bg-center bg-no-repeat bg-cover"
                data-alt="Illustration representing cardiology with a heart symbol"
                style="
                  background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBove9SKTk4mYxWwDBXnnjMWZnZprwVPtZVhyStQKO6vg9hJp4sfI1f1QwGuDkMEO2dBJpU0r00b-9wDgXtKfq0NBp5A63If6yRrdFQzCLQ-NPlfapfm6JiIwS-o1FX2Z9_It6K8VkHY8zjXdHjR7VKncvgqdgkI3r2wDdC7QtNbLMiHexebyeJaz-8jC5UAkdoz53bGshRKx-jhw1c5uGTnwpN-Hdes-wwml2zZ5L2T91_1ofT4mFEptY6cqdL9mhQkcYPGWu37tI');
                "
              ></div>
              <div class="p-6 flex flex-col flex-grow">
                <h3
                  class="text-xl font-bold text-slate-900 dark:text-slate-50 mb-2"
                >
                  Tim mạch
                </h3>
                <p
                  class="text-slate-600 dark:text-slate-400 text-sm mb-4 flex-grow"
                >
                  Chuyên chẩn đoán và điều trị các bệnh lý liên quan đến tim và
                  mạch máu như bệnh mạch vành, suy tim, rối loạn nhịp tim.
                </p>
                <a
                  class="inline-flex items-center justify-center rounded-lg h-10 px-4 bg-primary text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors mt-auto"
                  href="ChuyenKhoa/ChuyenKhoaTimMach.html"
                  >Xem bác sĩ</a
                >
              </div>
            </div>
            <div
              class="flex flex-col overflow-hidden rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 shadow-sm hover:shadow-lg transition-shadow duration-300"
            >
              <div
                class="w-full h-40 bg-center bg-no-repeat bg-cover"
                data-alt="Image related to dermatology, possibly showing skin care products or a skin examination."
                style="
                  background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCNyEk30uNzYZ11FHMQARMqK5KUsOcL8JusPKtBMZSkS1smSQVlJSNM_7c-2QLFnLSFtw_8jOnmxR4jz8UITgUlhEVjkTutbcf1UT5IpDTBRg9vLqxW2juPdcvzuG7WBTj3NJHOSufbRE3j-s6CYCxdJiPWV8Uuh35UCtAQI8XdZjEVnTM8f4trf53KJGgjo4INVwVeSoLohUVod6YKPZvqopSbq6PSKKcWtkDNqdd87uUGy24MHYISRNdtOYFEORmA3yq-UMkb6yc');
                "
              ></div>
              <div class="p-6 flex flex-col flex-grow">
                <h3
                  class="text-xl font-bold text-slate-900 dark:text-slate-50 mb-2"
                >
                  Da liễu
                </h3>
                <p
                  class="text-slate-600 dark:text-slate-400 text-sm mb-4 flex-grow"
                >
                  Điều trị các bệnh về da, tóc, móng và các vấn đề thẩm mỹ da
                  như mụn trứng cá, vẩy nến, nám da.
                </p>
                <a
                  class="inline-flex items-center justify-center rounded-lg h-10 px-4 bg-primary text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors mt-auto"
                  href="ChuyenKhoa/ChuyenKhoaDaLieu.html"
                  >Xem bác sĩ</a
                >
              </div>
            </div>
            <div
              class="flex flex-col overflow-hidden rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 shadow-sm hover:shadow-lg transition-shadow duration-300"
            >
              <div
                class="w-full h-40 bg-center bg-no-repeat bg-cover"
                data-alt="A pediatrician gently examining a child."
                style="
                  background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBalBlwXCPu7263yiWUjJuBXac1BeRuTxqEV6dX_c25ehMB5SRgEY3cd8MOF3fuUlBpI8oBjipBOZHoFMce0zvCCU1HGNY4zeTDXKcj6Tidy8jmjzdnpQuryGQwakAaykmRCHXWo4suSI2LtFLz5rR5bLT3S6SuxijTz8SYc8jz_nbPN3RQFQoF-ZbLu2x8_LOHU-AJyX8uj9R5inkEMZmy57Mj3fvooOaJz5q4oNldtjQD1ytcs7Av55cUUGVtV0uwT-v45I0fC-I');
                "
              ></div>
              <div class="p-6 flex flex-col flex-grow">
                <h3
                  class="text-xl font-bold text-slate-900 dark:text-slate-50 mb-2"
                >
                  Nhi khoa
                </h3>
                <p
                  class="text-slate-600 dark:text-slate-400 text-sm mb-4 flex-grow"
                >
                  Chăm sóc sức khỏe toàn diện cho trẻ sơ sinh, trẻ nhỏ và thanh
                  thiếu niên, từ khám tổng quát đến tiêm chủng.
                </p>
                <a
                  class="inline-flex items-center justify-center rounded-lg h-10 px-4 bg-primary text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors mt-auto"
                  href="ChuyenKhoa/ChuyenKhoaNhiKhoa.html"
                  >Xem bác sĩ</a
                >
              </div>
            </div>
            <div
              class="flex flex-col overflow-hidden rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 shadow-sm hover:shadow-lg transition-shadow duration-300"
            >
              <div
                class="w-full h-40 bg-center bg-no-repeat bg-cover"
                data-alt="Illustration representing the digestive system."
                style="
                  background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuB5x_4rjHQlXM-fsarNCF2Ug9RJ8SCbzfExHp7x7NOtm_AYvILVyG_V-KIJzVGy2vECBN7mEBhZcT_2uQOQR0JmeP9EReG3U1rTV7IHVB0djo4a84UIXlnEz2AJBbWm_hKkl3C34G-lJ834UW022sHbB1o0bEv6LFLgtAxkwsRCHZ2Rmi-cYvDiz1UQqZn6saqFirvliQ_qR9UghYzxDnAKDXE_e0a_U4RLRK-zhK9bPm3zVA0sTHre8824WcvGah_KUaeTbNJUe70');
                "
              ></div>
              <div class="p-6 flex flex-col flex-grow">
                <h3
                  class="text-xl font-bold text-slate-900 dark:text-slate-50 mb-2"
                >
                  Tiêu hóa
                </h3>
                <p
                  class="text-slate-600 dark:text-slate-400 text-sm mb-4 flex-grow"
                >
                  Khám và điều trị các bệnh lý của hệ tiêu hóa, bao gồm dạ dày,
                  ruột, gan, mật, và tụy.
                </p>
                <a
                  class="inline-flex items-center justify-center rounded-lg h-10 px-4 bg-primary text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors mt-auto"
                  href="ChuyenKhoa/ChuyenKhoaTieuHoa.html"
                  >Xem bác sĩ</a
                >
              </div>
            </div>
            <div
              class="flex flex-col overflow-hidden rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 shadow-sm hover:shadow-lg transition-shadow duration-300"
            >
              <div
                class="w-full h-40 bg-center bg-no-repeat bg-cover"
                data-alt="Image related to obstetrics and gynecology, such as an ultrasound image."
                style="
                  background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD4gRWSx6rvXWzwPH2T1LLBHrKZiP4FwtnO_9vb781iUrlDi0GTC-QSw06d386v93JPuV30MkrcDXpcrF79XA8-gddyaKq04nMJwgk47lK2_cE-j43ChDul4ZBF0aozqlhoIpOC6lVk5E8C9JdtLC7t1thqh-YiikrLsF1fXbDZt4MS9Fb09eDiVqvdkgOdK4KuuewkMf4PfenLHkg26DFfx1sIBCqDZvkiv7a601GwmvYCW3ckEh7RyfLy4MfNtgtnAt6XUd4iOqU');
                "
              ></div>
              <div class="p-6 flex flex-col flex-grow">
                <h3
                  class="text-xl font-bold text-slate-900 dark:text-slate-50 mb-2"
                >
                  Sản phụ khoa
                </h3>
                <p
                  class="text-slate-600 dark:text-slate-400 text-sm mb-4 flex-grow"
                >
                  Cung cấp dịch vụ chăm sóc sức khỏe sinh sản cho phụ nữ, bao
                  gồm khám thai, điều trị phụ khoa, và tư vấn kế hoạch hóa gia
                  đình.
                </p>
                <a
                  class="inline-flex items-center justify-center rounded-lg h-10 px-4 bg-primary text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors mt-auto"
                  href="ChuyenKhoa/ChuyenKhoaSanPhuKhoa.html"
                  >Xem bác sĩ</a
                >
              </div>
            </div>
            
            <div
              class="flex flex-col overflow-hidden rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 shadow-sm hover:shadow-lg transition-shadow duration-300"
            >
              <div
                class="w-full h-40 bg-center bg-no-repeat bg-cover"
                data-alt="Image related to orthopedics, such as bones and joints."
                style="
                  background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAF3DzSNqjzCeZdWeHuPtiUVU4J5-9gO1ZYkY4_lcjRHOFCs136_5p-CBxJXRRwS8hE80H-llbOjr5FzNWM8dBC9NshmuEk1SxnL-zPeNkRfaNmgaEPyeUgCuDmHkYGSdDK-NPFsVJIuAGvOEOPAZhkqo7zGmo9_k47334qCfL1xkqRmaHpgiam1ZQpXFyQyqRaMBAotFL0fw1Iw1JOwKIRfn59xJLaoRXeTOE5gCkmPcMNsOUH1acE7E_F7F03aoysEafO7a4YXzk');
                "
              ></div>
              <div class="p-6 flex flex-col flex-grow">
                <h3
                  class="text-xl font-bold text-slate-900 dark:text-slate-50 mb-2"
                >
                  Cơ Xương Khớp
                </h3>
                <p
                  class="text-slate-600 dark:text-slate-400 text-sm mb-4 flex-grow"
                >
                  Điều trị các bệnh lý về cơ, xương, khớp và các mô liên quan
                  như viêm khớp, thoái hóa khớp, loãng xương.
                </p>
                <a
                  class="inline-flex items-center justify-center rounded-lg h-10 px-4 bg-primary text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors mt-auto"
                  href="ChuyenKhoa/ChuyenKhoaCoXuongKhop.html"
                  >Xem bác sĩ</a
                >
              </div>
            </div>
            <div
              class="flex flex-col overflow-hidden rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 shadow-sm hover:shadow-lg transition-shadow duration-300"
            >
              <div
                class="w-full h-40 bg-center bg-no-repeat bg-cover"
                data-alt="Image related to eyes and vision."
                style="
                  background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDy4yJoid5y4Lc6BQS3fzvxlRmUsED7xnWUXWlThOZam4a-GKM6Ee3g9UcAtC-7wdy8QtGlMBaQj6B4V0SgeHASNnzaiUquspZJkzn67ZvogHsT7RZtLFh9Ff9mYyWnqvn_C0duSpTEvktvzJZt4b7maoPo3M2zaIo39aokl52tWMMnof-gFvdY9cYnW7rS0O7QJv5w3WlkgkaMOxiZ9aHwi5uG4pwEywVFlVePhvZrxJpgT0HT55buRGtDo7p5fCN5MIAo7q94u1A');
                "
              ></div>
              <div class="p-6 flex flex-col flex-grow">
                <h3
                  class="text-xl font-bold text-slate-900 dark:text-slate-50 mb-2"
                >
                  Mắt
                </h3>
                <p
                  class="text-slate-600 dark:text-slate-400 text-sm mb-4 flex-grow"
                >
                  Khám và điều trị các bệnh về mắt, tật khúc xạ (cận thị, viễn
                  thị), và phẫu thuật mắt như phaco, lasik.
                </p>
                <a
                  class="inline-flex items-center justify-center rounded-lg h-10 px-4 bg-primary text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors mt-auto"
                  href="ChuyenKhoa/ChuyenKhoaNhanKhoa.html"
                  >Xem bác sĩ</a
                >
              </div>
            </div>
            
            <div
              class="flex flex-col overflow-hidden rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 shadow-sm hover:shadow-lg transition-shadow duration-300"
            >
              <div
                class="w-full h-40 bg-center bg-no-repeat bg-cover"
                data-alt="Image related to dentistry."
                style="
                  background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBfUeMdzm50xLTWEuaEugJVq4WjKNysYoudMcf72D1GmIEcnMsPt5ioZ0K1ApRX-Hx1WbJB88R3Q75V505UjuqPaOht7DmXR3AMG996x_iFL6LSGmCxzcvTXCx30e-7vdg0sdqe5cqfprO_NnejxvQAb41EOIOTse-t4rq46CAOORqmjCkqlSiRFOhlqYe3La_LC-S8qSWvs5M5JQFuPSxyG3LOg7kOobqg7lJEp6WHTK_ne7lS1aXuuWnNUjChHzzIn82dleJcLTg');
                "
              ></div>
              <div class="p-6 flex flex-col flex-grow">
                <h3
                  class="text-xl font-bold text-slate-900 dark:text-slate-50 mb-2"
                >
                  Nha khoa
                </h3>
                <p
                  class="text-slate-600 dark:text-slate-400 text-sm mb-4 flex-grow"
                >
                  Chăm sóc sức khỏe răng miệng, bao gồm khám tổng quát, cạo vôi
                  răng, trám răng, và các thủ thuật nha khoa khác.
                </p>
                <a
                  class="inline-flex items-center justify-center rounded-lg h-10 px-4 bg-primary text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors mt-auto"
                  href="ChuyenKhoa/ChuyenKhoaNhaKhoa.html"
                  >Xem bác sĩ</a
                >
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
</div>
@endsection