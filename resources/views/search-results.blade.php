@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-slate-900 dark:text-slate-50 mb-8">
        Kết quả tìm kiếm bác sĩ
    </h1>
    
    @include('partials.doctor-list', ['doctors' => $doctors])
</div>
@endsection