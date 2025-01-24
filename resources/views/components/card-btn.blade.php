<div
    {{ $attributes->class(['card', 'card-btn', 'shadow-sm', 'text-center', 'p-4', 'h-100'])->merge(['style' => 'border-radius: 8px;']) }}>
    {{ $slot }}
</div>
