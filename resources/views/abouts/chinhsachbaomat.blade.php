@extends('layouts.app')
@section('content')
<div
      class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden"
    >
      <div class="layout-container flex h-full grow flex-col">
        <div class="flex flex-1 justify-center">
          <div
            class="layout-content-container flex flex-col max-w-[1280px] flex-1"
          >
            <main>
              <section
                class="relative py-16 md:py-24 px-4 sm:px-8 md:px-12 lg:px-20"
              >
                <div
                  class="absolute inset-0 bg-slate-50 dark:bg-slate-900"
                ></div>
                <div class="relative z-10 mx-auto max-w-4xl text-center">
                  <h1
                    class="text-4xl md:text-5xl font-extrabold text-slate-900 dark:text-white leading-tight tracking-tighter"
                  >
                    Chính Sách Bảo Mật
                  </h1>
                  <p class="mt-6 text-lg text-slate-600 dark:text-slate-300">
                    HealthBooker cam kết bảo vệ thông tin cá nhân của bạn. Chính
                    sách này mô tả cách chúng tôi thu thập, sử dụng và bảo vệ dữ
                    liệu của bạn khi bạn sử dụng dịch vụ của chúng tôi.
                  </p>
                  <p class="mt-4 text-sm text-slate-500 dark:text-slate-400">
                    Cập nhật lần cuối: 24 tháng 7, 2024
                  </p>
                </div>
              </section>
              <section
                class="py-16 md:py-24 px-4 sm:px-8 md:px-12 lg:px-20 xl:px-40"
              >
                <div class="mx-auto max-w-4xl">
                  <div
                    class="prose prose-lg dark:prose-invert max-w-none text-slate-700 dark:text-slate-300 space-y-8"
                  >
                    <div class="space-y-4">
                      <h2
                        class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white"
                      >
                        1. Thông tin chúng tôi thu thập
                      </h2>
                      <p>
                        Chúng tôi thu thập các loại thông tin sau để cung cấp và
                        cải thiện dịch vụ:
                      </p>
                      <ul class="list-disc pl-6 space-y-2">
                        <li>
                          <strong>Thông tin cá nhân:</strong> Họ tên, ngày sinh,
                          giới tính, số điện thoại, địa chỉ email, địa chỉ liên
                          lạc.
                        </li>
                        <li>
                          <strong>Thông tin sức khỏe:</strong> Lịch sử khám
                          bệnh, triệu chứng, thông tin bảo hiểm y tế và các dữ
                          liệu liên quan khác bạn cung cấp khi đặt lịch.
                        </li>
                        <li>
                          <strong>Thông tin kỹ thuật:</strong> Địa chỉ IP, loại
                          trình duyệt, hệ điều hành, thông tin thiết bị và dữ
                          liệu cookie khi bạn truy cập trang web của chúng tôi.
                        </li>
                      </ul>
                    </div>
                    <div class="space-y-4">
                      <h2
                        class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white"
                      >
                        2. Mục đích sử dụng thông tin
                      </h2>
                      <p>
                        Thông tin của bạn được sử dụng cho các mục đích sau:
                      </p>
                      <ul class="list-disc pl-6 space-y-2">
                        <li>Xác nhận và quản lý lịch hẹn khám bệnh của bạn.</li>
                        <li>
                          Cung cấp thông tin cho bác sĩ và cơ sở y tế để chuẩn
                          bị cho buổi khám.
                        </li>
                        <li>
                          Gửi thông báo, nhắc nhở và các thông tin liên quan đến
                          lịch hẹn.
                        </li>
                        <li>
                          Cải thiện chất lượng dịch vụ, cá nhân hóa trải nghiệm
                          người dùng.
                        </li>
                        <li>Liên lạc và hỗ trợ khi bạn có yêu cầu.</li>
                        <li>
                          Tuân thủ các yêu cầu pháp lý và quy định của ngành y
                          tế.
                        </li>
                      </ul>
                    </div>
                    <div class="space-y-4">
                      <h2
                        class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white"
                      >
                        3. Chia sẻ thông tin
                      </h2>
                      <p>
                        Chúng tôi cam kết không bán, cho thuê hoặc trao đổi
                        thông tin cá nhân của bạn với bất kỳ bên thứ ba nào vì
                        mục đích thương mại. Thông tin của bạn chỉ có thể được
                        chia sẻ trong các trường hợp sau:
                      </p>
                      <ul class="list-disc pl-6 space-y-2">
                        <li>
                          <strong>Với bác sĩ và cơ sở y tế:</strong> Khi bạn đặt
                          lịch hẹn, thông tin liên quan sẽ được chia sẻ để phục
                          vụ cho việc khám chữa bệnh.
                        </li>
                        <li>
                          <strong>Theo yêu cầu của pháp luật:</strong> Khi có
                          yêu cầu từ cơ quan nhà nước có thẩm quyền.
                        </li>
                        <li>
                          <strong>Để bảo vệ quyền lợi của chúng tôi:</strong>
                          Trong các trường hợp cần thiết để bảo vệ an ninh hoặc
                          quyền lợi của HealthBooker.
                        </li>
                      </ul>
                    </div>
                    <div class="space-y-4">
                      <h2
                        class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white"
                      >
                        4. Bảo mật dữ liệu
                      </h2>
                      <p>
                        Chúng tôi áp dụng các biện pháp bảo mật vật lý, kỹ thuật
                        và quản trị tiên tiến để bảo vệ thông tin của bạn khỏi
                        bị truy cập, sử dụng hoặc tiết lộ trái phép. Dữ liệu
                        được mã hóa trong quá trình truyền tải và lưu trữ.
                      </p>
                    </div>
                    <div class="space-y-4">
                      <h2
                        class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white"
                      >
                        5. Quyền của bạn
                      </h2>
                      <p>Bạn có quyền đối với thông tin cá nhân của mình:</p>
                      <ul class="list-disc pl-6 space-y-2">
                        <li>
                          <strong>Quyền truy cập:</strong> Xem lại thông tin cá
                          nhân mà chúng tôi đang lưu trữ.
                        </li>
                        <li>
                          <strong>Quyền chỉnh sửa:</strong> Yêu cầu cập nhật,
                          chỉnh sửa thông tin không chính xác.
                        </li>
                        <li>
                          <strong>Quyền xóa:</strong> Yêu cầu xóa thông tin cá
                          nhân của bạn khỏi hệ thống của chúng tôi (có thể bị
                          giới hạn bởi các quy định pháp luật).
                        </li>
                        <li>
                          <strong>Quyền rút lại sự đồng ý:</strong> Rút lại sự
                          đồng ý cho phép xử lý dữ liệu của bạn bất cứ lúc nào.
                        </li>
                      </ul>
                      <p>
                        Để thực hiện các quyền này, vui lòng liên hệ với chúng
                        tôi qua email:
                        <a
                          class="text-primary hover:underline"
                          href="mailto:privacy@healthbooker.com"
                          >privacy@healthbooker.com</a
                        >.
                      </p>
                    </div>
                    <div class="space-y-4">
                      <h2
                        class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white"
                      >
                        6. Thay đổi chính sách
                      </h2>
                      <p>
                        Chúng tôi có thể cập nhật Chính sách Bảo mật này theo
                        thời gian. Mọi thay đổi sẽ được đăng trên trang này và
                        ngày cập nhật sẽ được sửa đổi. Chúng tôi khuyến khích
                        bạn thường xuyên xem lại chính sách để nắm rõ cách chúng
                        tôi bảo vệ thông tin của bạn.
                      </p>
                    </div>
                  </div>
                </div>
              </section>
            </main>
          </div>
        </div>
      </div>
    </div>
@endsection