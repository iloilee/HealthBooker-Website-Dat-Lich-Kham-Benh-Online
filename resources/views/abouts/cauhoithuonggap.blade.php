@extends('layouts.app')
@section('content')
@php
$categoryLabels = [
    'dat-lich' => 'Đặt lịch & Quản lý hẹn',
    'thanh-toan' => 'Thanh toán & Chi phí',
    'ho-so' => 'Hồ sơ & Tài khoản',
    'dich-vu' => 'Dịch vụ & Chuyên khoa',
];
@endphp
<div
      class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden"
    >
      <div class="layout-container flex h-full grow flex-col">
        <div class="flex flex-1 justify-center">
          <div
            class="layout-content-container flex flex-col max-w-[1280px] flex-1"
          >
            <main>
              <section class="relative py-16 md:py-24 px-4 sm:px-8">
                <div
                  class="absolute inset-0 bg-primary/10 dark:bg-primary/20"
                ></div>
                <div class="relative z-10 mx-auto max-w-4xl text-center">
                  <h1
                    class="text-4xl md:text-5xl font-extrabold text-slate-900 dark:text-white leading-tight tracking-tighter"
                  >
                    Câu Hỏi Thường Gặp
                  </h1>
                  <p
                    class="mt-4 text-lg md:text-xl text-slate-600 dark:text-slate-300"
                  >
                    Tìm câu trả lời cho các câu hỏi phổ biến nhất về
                    HealthBooker.
                  </p>
                  <div class="mt-8 mx-auto max-w-lg">
                    <div class="relative">
                      <input
                        id="search-input"
                        class="w-full h-14 pl-12 pr-4 rounded-full border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                        placeholder="Tìm kiếm câu hỏi..."
                        type="search"
                      />
                      <div
                        class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-500 dark:text-slate-400"
                      >
                        <span class="material-symbols-outlined">search</span>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <section
                class="py-16 md:py-24 px-4 sm:px-8 md:px-12 lg:px-20 xl:px-40"
              >
                <div class="grid lg:grid-cols-3 gap-12">
                  <aside class="lg:col-span-1">
                    <h2
                      class="text-2xl font-bold text-slate-900 dark:text-white mb-6"
                    >
                      Chủ đề
                    </h2>
                    <ul class="space-y-2">
                      <li>
                        <a
                          class="block py-2 px-4 rounded-lg bg-primary/10 text-primary dark:bg-primary/20 dark:text-primary-300 font-semibold"
                          href="#dat-lich"
                          >Đặt lịch &amp; Quản lý hẹn</a
                        >
                      </li>
                      <li>
                        <a
                          class="block py-2 px-4 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-700 dark:text-slate-300 font-medium"
                          href="#thanh-toan"
                          >Thanh toán &amp; Chi phí</a
                        >
                      </li>
                      <li>
                        <a
                          class="block py-2 px-4 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-700 dark:text-slate-300 font-medium"
                          href="#ho-so"
                          >Hồ sơ &amp; Tài khoản</a
                        >
                      </li>
                      <li>
                        <a
                          class="block py-2 px-4 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-700 dark:text-slate-300 font-medium"
                          href="#dich-vu"
                          >Dịch vụ &amp; Chuyên khoa</a
                        >
                      </li>
                    </ul>
                  </aside>
                  <div class="lg:col-span-2 space-y-12">
                    @foreach($faqs as $category => $faqList)
                    <div id="{{ $category }}">
                      <h3 class="text-3xl font-bold text-slate-900 dark:text-white mb-6">
                        {{ $categoryLabels[$category] ?? ucfirst(str_replace('-', ' ', $category)) }}
                      </h3>
                      <div class="space-y-4">
                        @foreach($faqList as $faq)
                        <details class="group rounded-lg bg-slate-50 dark:bg-slate-800 p-4 transition-all duration-300">
                          <summary class="flex cursor-pointer list-none items-center justify-between font-semibold text-slate-900 dark:text-white">
                            {{ $faq->question }}
                            <span class="material-symbols-outlined rotate-icon transition-transform duration-300">expand_more</span>
                          </summary>
                          <div class="mt-4 text-slate-600 dark:text-slate-300">
                            {!! nl2br(e($faq->answer)) !!}
                          </div>
                        </details>
                        @endforeach
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </section>
            </main>
          </div>
        </div>
      </div>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search-input');
        const faqContainer = document.querySelector('.lg\\:col-span-2');

        let debounceTimer;

        searchInput.addEventListener('input', function() {
          clearTimeout(debounceTimer);
          debounceTimer = setTimeout(() => {
            const query = searchInput.value.trim();
            if (query === '') {
              // Reload page or reset to original
              location.reload();
            } else {
              fetch(`/api/faqs/search?q=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                  renderFaqs(data);
                })
                .catch(error => console.error('Error:', error));
            }
          }, 300);
        });

        function renderFaqs(faqs) {
          if (faqs.length === 0) {
            faqContainer.innerHTML = '<p class="text-center text-slate-600 dark:text-slate-300">Không tìm thấy câu hỏi nào khớp với từ khóa.</p>';
            return;
          }

          const grouped = faqs.reduce((acc, faq) => {
            if (!acc[faq.category]) acc[faq.category] = [];
            acc[faq.category].push(faq);
            return acc;
          }, {});

          let html = '';
          for (const [category, list] of Object.entries(grouped)) {
            const categoryLabel = @json($categoryLabels)[category] || category.replace('-', ' ').replace(/\b\w/g, l => l.toUpperCase());
            html += `
              <div id="${category}">
                <h3 class="text-3xl font-bold text-slate-900 dark:text-white mb-6">${categoryLabel}</h3>
                <div class="space-y-4">
            `;
            list.forEach(faq => {
              html += `
                <details class="group rounded-lg bg-slate-50 dark:bg-slate-800 p-4 transition-all duration-300">
                  <summary class="flex cursor-pointer list-none items-center justify-between font-semibold text-slate-900 dark:text-white">
                    ${faq.question}
                    <span class="material-symbols-outlined rotate-icon transition-transform duration-300">expand_more</span>
                  </summary>
                  <div class="mt-4 text-slate-600 dark:text-slate-300">${faq.answer.replace(/\n/g, '<br>')}</div>
                </details>
              `;
            });
            html += '</div></div>';
          }
          faqContainer.innerHTML = html;
        }

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
          anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
              target.scrollIntoView({
                behavior: 'smooth'
              });
            }
          });
        });
      });
    </script>
@endsection