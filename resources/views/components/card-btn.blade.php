<div
    {{ $attributes->class(['card', 'card-btn', 'shadow-sm', 'text-center', 'p-4', 'h-100', 'disabled' => $disabled])->merge(['style' => 'border-radius: 8px;']) }}>
    {{ $slot }}
</div>
