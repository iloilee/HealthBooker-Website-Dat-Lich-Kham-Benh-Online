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
        <main class="w-full py-10 md:py-16">
          <div class="flex flex-col gap-10 px-4">
            <div class="text-center">
              <h1
                class="text-slate-900 dark:text-slate-50 text-4xl font-black leading-tight tracking-[-0.033em] md:text-5xl"
              >
                Liên Hệ Với Chúng Tôi
              </h1>
              <p
                class="mt-3 text-slate-600 dark:text-slate-400 text-base md:text-lg max-w-2xl mx-auto"
              >
                Chúng tôi luôn sẵn sàng lắng nghe bạn. Vui lòng điền vào biểu
                mẫu bên dưới hoặc sử dụng thông tin liên hệ trực tiếp.
              </p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
              <div
                class="bg-white dark:bg-slate-800 p-8 rounded-xl shadow-md border border-slate-200 dark:border-slate-700"
              >
                <h2
                  class="text-2xl font-bold text-slate-900 dark:text-slate-50 mb-6"
                >
                  Gửi Tin Nhắn
                </h2>
                <form id="contactForm" class="space-y-6">
                  @csrf
                  
                  <!-- Alert thông báo -->
                  <div id="alertMessage" class="hidden rounded-lg p-4 mb-4"></div>

                  <div>
                      <label
                          class="text-sm font-medium text-slate-700 dark:text-slate-300"
                          for="name"
                      >Họ và Tên <span class="text-red-500">*</span></label>
                      <input
                          class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-slate-50 dark:bg-slate-700 text-slate-900 dark:text-slate-50 focus:border-primary focus:ring-primary"
                          id="name"
                          name="name"
                          placeholder="Họ tên của bạn..."
                          type="text"
                          required
                      />
                      <span class="text-red-500 text-sm hidden" id="nameError"></span>
                  </div>

                  <div>
                      <label
                          class="text-sm font-medium text-slate-700 dark:text-slate-300"
                          for="email"
                      >Email <span class="text-red-500">*</span></label>
                      <input
                          class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-slate-50 dark:bg-slate-700 text-slate-900 dark:text-slate-50 focus:border-primary focus:ring-primary"
                          id="email"
                          name="email"
                          placeholder="email@example.com"
                          type="email"
                          required
                      />
                      <span class="text-red-500 text-sm hidden" id="emailError"></span>
                  </div>

                  <div>
                      <label
                          class="text-sm font-medium text-slate-700 dark:text-slate-300"
                          for="message"
                      >Tin nhắn của bạn <span class="text-red-500">*</span></label>
                      <textarea
                          class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-slate-50 dark:bg-slate-700 text-slate-900 dark:text-slate-50 focus:border-primary focus:ring-primary"
                          id="message"
                          name="message"
                          placeholder="Nội dung tin nhắn..."
                          rows="5"
                          required
                      ></textarea>
                      <span class="text-red-500 text-sm hidden" id="messageError"></span>
                  </div>

                  <button
                      id="submitBtn"
                      class="w-full flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-5 bg-primary text-slate-50 text-base font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                      type="submit"
                  >
                      <span id="btnText" class="truncate">Gửi đi</span>
                      <span id="btnLoading" class="hidden">
                          <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                          </svg>
                      </span>
                  </button>
              </form>

              <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const form = document.getElementById('contactForm');
                    const submitBtn = document.getElementById('submitBtn');
                    const btnText = document.getElementById('btnText');
                    const btnLoading = document.getElementById('btnLoading');
                    const alertMessage = document.getElementById('alertMessage');

                    form.addEventListener('submit', async function(e) {
                        e.preventDefault();

                        // Reset errors
                        clearErrors();

                        // Disable button
                        submitBtn.disabled = true;
                        btnText.classList.add('hidden');
                        btnLoading.classList.remove('hidden');

                        const formData = new FormData(form);

                        try {
                            const response = await fetch('{{ route("contact.store") }}', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                    'Accept': 'application/json',
                                },
                                body: formData
                            });

                            const data = await response.json();

                            if (data.success) {
                                showAlert('success', data.message);
                                form.reset();
                            } else {
                                if (data.errors) {
                                    displayErrors(data.errors);
                                } else {
                                    showAlert('error', data.message);
                                }
                            }
                        } catch (error) {
                            showAlert('error', 'Có lỗi xảy ra. Vui lòng thử lại sau.');
                            console.error('Error:', error);
                        } finally {
                            // Enable button
                            submitBtn.disabled = false;
                            btnText.classList.remove('hidden');
                            btnLoading.classList.add('hidden');
                        }
                    });

                    function showAlert(type, message) {
                        alertMessage.classList.remove('hidden', 'bg-green-100', 'bg-red-100', 'text-green-800', 'text-red-800');
                        
                        if (type === 'success') {
                            alertMessage.classList.add('bg-green-100', 'text-green-800');
                        } else {
                            alertMessage.classList.add('bg-red-100', 'text-red-800');
                        }
                        
                        alertMessage.textContent = message;
                        
                        // Auto hide after 5 seconds
                        setTimeout(() => {
                            alertMessage.classList.add('hidden');
                        }, 5000);
                    }

                    function displayErrors(errors) {
                        for (const [field, messages] of Object.entries(errors)) {
                            const errorElement = document.getElementById(field + 'Error');
                            if (errorElement) {
                                errorElement.textContent = messages[0];
                                errorElement.classList.remove('hidden');
                            }
                        }
                    }

                    function clearErrors() {
                        const errorElements = document.querySelectorAll('[id$="Error"]');
                        errorElements.forEach(el => {
                            el.textContent = '';
                            el.classList.add('hidden');
                        });
                        alertMessage.classList.add('hidden');
                    }
                });
              </script>
              </div>
              <div class="space-y-8">
                <div
                  class="flex items-start gap-4 p-6 bg-white dark:bg-slate-800 rounded-xl shadow-md border border-slate-200 dark:border-slate-700"
                >
                  <div
                    class="flex-shrink-0 size-12 bg-primary/10 text-primary rounded-full flex items-center justify-center"
                  >
                    <span class="material-symbols-outlined">location_on</span>
                  </div>
                  <div>
                    <h3
                      class="text-lg font-bold text-slate-900 dark:text-slate-50"
                    >
                      Địa chỉ văn phòng
                    </h3>
                    <a href="https://maps.google.com/?q=Phường+8,+Thành+phố+Vĩnh+Long" target="_blank">
                      <p class="text-slate-600 dark:text-slate-400 mt-1">
                        123 Đường ABC, Phường 8, Thành phố Vĩnh Long, tỉnh Vĩnh
                        Long
                      </p>
                    </a>
                  </div>
                </div>
                <div
                  class="flex items-start gap-4 p-6 bg-white dark:bg-slate-800 rounded-xl shadow-md border border-slate-200 dark:border-slate-700"
                >
                  <div
                    class="flex-shrink-0 size-12 bg-primary/10 text-primary rounded-full flex items-center justify-center"
                  >
                    <span class="material-symbols-outlined">mail</span>
                  </div>
                  <div>
                    <h3
                      class="text-lg font-bold text-slate-900 dark:text-slate-50"
                    >
                      Email
                    </h3>
                    <a href="mailto:contact@healthbooker.com">
                      <p class="text-slate-600 dark:text-slate-400 mt-1">
                        contact@healthbooker.com
                      </p>
                    </a>
                  </div>
                </div>
                <div
                  class="flex items-start gap-4 p-6 bg-white dark:bg-slate-800 rounded-xl shadow-md border border-slate-200 dark:border-slate-700"
                >
                  <div
                    class="flex-shrink-0 size-12 bg-primary/10 text-primary rounded-full flex items-center justify-center"
                  >
                    <span class="material-symbols-outlined">call</span>
                  </div>
                  <div>
                    <h3
                      class="text-lg font-bold text-slate-900 dark:text-slate-50"
                    >
                      Điện thoại
                    </h3>
                    <a href="tel:02838123456">
                      <p class="text-slate-600 dark:text-slate-400 mt-1">
                        (028) 3812 3456
                      </p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-12">
              <h2
                class="text-3xl font-bold text-slate-900 dark:text-slate-50 text-center mb-6"
              >
                Vị Trí Của Chúng Tôi
              </h2>

              <div
                class="w-full h-96 bg-slate-200 dark:bg-slate-700 rounded-xl overflow-hidden"
              >
                <iframe
                  width="100%"
                  height="100%"
                  style="border: 0"
                  loading="lazy"
                  allowfullscreen
                  referrerpolicy="no-referrer-when-downgrade"
                  src="https://www.google.com/maps?q=Phường+8,+Thành+phố+Vĩnh+Long&output=embed"
                ></iframe>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
</div>
@endsection