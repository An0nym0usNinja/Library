<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full flex justify-end mb-3">
                <a href="{{ route('books.index') }}" type="button"
                class="focus:outline-none text-indigo-700 bg-transparent border border-indigo-700
                hover:bg-indigo-700 hover:text-white focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg
                text-sm px-5 py-2.5 ml-auto"><- Back</a>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto sm:rounded-lg">

                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Book Information') }}
                            </h2>
                        </header>

                        <form method="post" action="{{ route('books.store') }}" class="mt-6 space-y-6">
                            @csrf

                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>

                            <div>
                                <x-input-label for="pages" :value="__('Pages')" />
                                <x-text-input type="number" id="pages" name="pages" type="text"
                                class="mt-1 block w-full" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('pages')" />
                            </div>

                            <div>
                                <x-input-label for="genres" :value="__('Genres')" />
                                <x-select id="genres" name="genre_id" :options="$genres"
                                :key="'id'" :value="'name'" />
                            </div>

                            <div>
                                <x-input-label for="authors" :value="__('Authors')" />
                                <x-select id="authors" name="author_id" :options="$authors"
                                :key="'id'" :value="'name'" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
