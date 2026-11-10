@props([
    'status' => 'Tersedia',
    'size' => 'md',
])

@php
    $normalized = strtolower(trim($status));
    
    if ($normalized === 'tersedia' || $normalized === 'aman' || $normalized === 'selesai' || $normalized === 'disetujui') {
        $classes = 'bg-emerald-50 text-emerald-700 border-emerald-200 ring-emerald-500/20';
        $dotClass = 'bg-emerald-500';
        $icon = 'ri-checkbox-circle-line';
    } elseif ($normalized === 'menipis' || $normalized === 'perhatian' || $normalized === 'warning') {
        $classes = 'bg-amber-50 text-amber-700 border-amber-200 ring-amber-500/20';
        $dotClass = 'bg-amber-500 animate-ping';
        $icon = 'ri-alarm-warning-line';
    } else {
        $classes = 'bg-rose-50 text-rose-700 border-rose-200 ring-rose-500/20';
        $dotClass = 'bg-rose-500';
        $icon = 'ri-close-circle-line';
    }

    $sizeClasses = $size === 'sm' ? 'text-[10px] px-2 py-0.5' : 'text-xs px-2.5 py-1';
@endphp

<span class="inline-flex items-center gap-1.5 font-semibold rounded-full border shadow-2xs {{ $classes }} {{ $sizeClasses }}">
    <span class="relative flex h-2 w-2">
        <span class="relative inline-flex rounded-full h-2 w-2 {{ $dotClass }}"></span>
    </span>
    <i class="{{ $icon }}"></i>
    <span>{{ $status }}</span>
</span>
