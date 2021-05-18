@props(["trigger"])

<div x-data="{ show: false }" @click.away="show = false">
    <!-- Trigger -->
    <div @click="show = !show">
        {{ $trigger }}
    </div>
    <!-- Links -->
    <div class="py-2 mt-2 bg-gray-100 absolute w-full z-50" style="display:none" x-show="show">
        {{ $slot }}
    </div>
</div>