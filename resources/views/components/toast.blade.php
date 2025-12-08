@props([
    'type' => 'success',  // 'success' hoặc 'error'
    'message' => null,
    'redirect' => null     // URL để redirect sau toast (có thể null)
])

@if($message)
@php
    $colors = [
        'success' => ['bg' => 'bg-green-500', 'progress' => 'bg-white'],
        'error' => ['bg' => 'bg-red-500', 'progress' => 'bg-white'],
    ];
    $bg = $colors[$type]['bg'];
    $progressColor = $colors[$type]['progress'];
@endphp

<div
    id="toast-{{ $type }}"
    class="fixed top-5 right-5 z-[999] max-w-xs rounded-lg {{ $bg }} p-4 text-white shadow-lg opacity-0 transform translate-x-10 transition-all duration-500"
>
    <div class="flex justify-between items-center">
        <span>{{ $message }}</span>
        <button onclick="closeToast{{ ucfirst($type) }}()" class="ml-2 font-bold text-white">&times;</button>
    </div>
    <div class="mt-2 h-1 w-full bg-300 rounded">
        <div id="toast-{{ $type }}-progress" class="h-1 {{ $progressColor }} rounded w-full"></div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const toast = document.getElementById('toast-{{ $type }}');
    const progress = document.getElementById('toast-{{ $type }}-progress');
    const duration = 3000;
    let start = null;

    setTimeout(() => {
        toast.classList.remove('opacity-0', 'translate-x-10');
        toast.classList.add('opacity-100', 'translate-x-0');
    }, 100);

    function animateProgress(timestamp) {
        if (!start) start = timestamp;
        const elapsed = timestamp - start;
        const percent = Math.max(0, 100 - (elapsed / duration * 100));
        progress.style.width = percent + '%';
        if (elapsed < duration) requestAnimationFrame(animateProgress);
    }
    requestAnimationFrame(animateProgress);

    setTimeout(() => {
        closeToast{{ ucfirst($type) }}();
        @if($redirect)
            setTimeout(() => { window.location.href = "{{ $redirect }}"; }, 500);
        @endif
    }, duration);

    window['closeToast{{ ucfirst($type) }}'] = function () {
        toast.classList.add('opacity-0', 'translate-x-10');
        setTimeout(() => toast.remove(), 500);
    }
});
</script>
@endif
