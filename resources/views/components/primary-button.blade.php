<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn bg-primary text-white']) }}>
    {{ $slot }}
</button>
