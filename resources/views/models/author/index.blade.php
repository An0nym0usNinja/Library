<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Authors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form class="pb-4" action="{{ route('authors.index') }}">
                <div class="flex">
                    <div class="relative w-full">
                        <input
                            class="z-20 block w-full rounded-s-lg rounded-e-lg border border-s-2 border-gray-300 border-s-gray-50 bg-gray-50 p-2.5 text-sm text-gray-900 focus:outline-none focus:ring-0 dark:border-gray-600 dark:border-s-gray-700 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                            name="query" type="text" placeholder="Search author name..." value="{{ request()->get('query') }}" />
                        <button
                            class="absolute end-0 top-0 h-full rounded-e-lg border border-blue-700 bg-blue-700 p-2.5 text-sm font-medium text-white hover:bg-blue-800 dark:bg-indigo-600 dark:hover:bg-indigo-700"
                            type="submit">
                            <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
            </form>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <caption class="hidden">Author index table</caption>
                    <thead
                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-2">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-2">
                                Author name
                            </th>
                            <th scope="col" class="px-6 py-2">
                                Created at
                            </th>
                            <th scope="col" class="px-6 py-2">
                                Updated at
                            </th>
                            <th scope="col" class="px-6 py-2 flex justify-center items-center">
                                <a href="{{ route('authors.create') }}" type="button"
                                class="focus:outline-none text-white bg-indigo-700
                                hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg
                                text-sm px-5 py-2.5 dark:bg-indigo-600 dark:hover:bg-indigo-700
                                dark:focus:ring-indigo-900">Add</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($authors as $author)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50
                            even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-2 font-medium text-gray-900
                                whitespace-nowrap dark:text-white">
                                    {{ $author->id }}
                                </th>
                                <td class="px-6 py-2">
                                    <a href="{{ route('books.index', [
                                        'authors[]' => $author->id
                                    ]) }}"
                                    class="text-indigo-500 hover:text-indigo-700">
                                        {{ $author->name }}
                                    </a>
                                </td>
                                <td class="px-6 py-2">
                                    {{ $author->created_at }}
                                </td>
                                <td class="px-6 py-2">
                                    {{ $author->updated_at }}
                                </td>
                                <td class="px-6 py-2 flex gap-4 justify-center">
                                    <a href="{{ route('authors.edit', $author->id) }}"
                                        class="font-medium text-indigo-600 dark:text-indigo-500 hover:underline">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('authors.destroy', $author->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="font-medium text-indigo-600 dark:text-indigo-500 hover:underline">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- pagination links --}}
            <div class="mt-4">
                {{ $authors->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
