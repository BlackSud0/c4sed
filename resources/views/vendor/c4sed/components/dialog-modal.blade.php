@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
            {{ $title }}
        </div>

        <div class="mt-4">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-col items-center justify-end px-6 py-3 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row">
        {{ $footer }}
    </div>
</x-modal>
