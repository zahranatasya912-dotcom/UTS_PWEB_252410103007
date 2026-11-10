@props([
    'title' => 'Statistik',
    'value' => '0',
    'icon' => 'ri-bar-chart-fill',
    'color' => 'indigo',
    'subtitle' => 'Data Real-time',
    'trend' => null,
])

@php
    $colorClasses = [
        'indigo' => [
            'bg' => 'bg-indigo-50',
            'border' => 'border-indigo-100',
            'icon_bg' => 'bg-indigo-500',
            'text' => 'text-indigo-600',
            'shadow' => 'shadow-indigo-100',
        ],
        'emerald' => [
            'bg' => 'bg-emerald-50',
            'border' => 'border-emerald-100',
            'icon_bg' => 'bg-emerald-500',
            'text' => 'text-emerald-600',
            'shadow' => 'shadow-emerald-100',
        ],
        'amber' => [
            'bg' => 'bg-amber-50',
            'border' => 'border-amber-100',
            'icon_bg' => 'bg-amber-500',
            'text' => 'text-amber-600',
            'shadow' => 'shadow-amber-100',
        ],
        'rose' => [
            'bg' => 'bg-rose-50',
            'border' => 'border-rose-100',
            'icon_bg' => 'bg-rose-500',
            'text' => 'text-rose-600',
            'shadow' => 'shadow-rose-100',
        ],
        'blue' => [
            'bg' => 'bg-blue-50',
            'border' => 'border-blue-100',
            'icon_bg' => 'bg-blue-500',
            'text' => 'text-blue-600',
            'shadow' => 'shadow-blue-100',
        ],
    ][$color] ?? [
        'bg' => 'bg-slate-50',
        'border' => 'border-slate-100',
        'icon_bg' => 'bg-slate-500',
        'text' => 'text-slate-600',
        'shadow' => 'shadow-slate-100',
    ];
@endphp

<div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-200 group relative overflow-hidden">
    <div class="flex items-start justify-between">
        <div>
            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">{{ $title }}</p>
            <h3 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1 tracking-tight font-poppins">
                {{ $value }}
            </h3>
            <p class="text-xs text-slate-500 mt-1 flex items-center gap-1">
                @if($trend)
                    <span class="inline-flex items-center text-emerald-600 font-semibold">
                        <i class="ri-arrow-up-line"></i> {{ $trend }}
                    </span>
                    <span>•</span>
                @endif
                <span>{{ $subtitle }}</span>
            </p>
        </div>
        <div class="w-12 h-12 rounded-xl {{ $colorClasses['icon_bg'] }} flex items-center justify-center text-white text-2xl shadow-md {{ $colorClasses['shadow'] }} group-hover:scale-110 transition-transform">
            <i class="{{ $icon }}"></i>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0 h-1 {{ $colorClasses['icon_bg'] }} opacity-80"></div>
</div>
