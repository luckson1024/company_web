@props(['id', 'title' => '', 'show' => false])

<div id="{{ $id }}" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 transition-opacity duration-200 {{ $show ? '' : 'hidden' }}">
    <div class="bg-white dark:bg-[#161615] rounded-lg shadow-lg w-full max-w-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">{{ $title }}</h3>
            <button type="button" onclick="document.getElementById('{{ $id }}').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">&times;</button>
        </div>
        <div>
            {{ $slot }}
        </div>
    </div>
</div>
