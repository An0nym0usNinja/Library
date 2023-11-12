<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <caption class="hidden">Book index table</caption>
                    <thead
                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-2">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-2">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-2">
                                Pages
                            </th>
                            <th scope="col" class="px-6 py-2">
                                Author
                            </th>
                            <th scope="col" class="px-6 py-2">
                                Genre
                            </th>
                            <th scope="col" class="px-6 py-2 flex justify-center items-center">
                                <a href="{{ route('books.create') }}" type="button"
                                class="focus:outline-none text-white bg-indigo-700
                                hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg
                                text-sm px-5 py-2.5 dark:bg-indigo-600 dark:hover:bg-indigo-700
                                dark:focus:ring-indigo-900">Add</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50
                            even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-2 font-medium text-gray-900
                                whitespace-nowrap dark:text-white">
                                    {{ $book->id }}
                                </th>
                                <td class="px-6 py-2">
                                    {{ $book->title }}
                                </td>
                                <td class="px-6 py-2">
                                    {{ $book->pages }}
                                </td>
                                <td class="px-6 py-2">
                                    {{ $book->author->name ?? '' }}
                                </td>
                                <td class="px-6 py-2">
                                    {{ $book->genre->name ?? '' }}
                                </td>
                                <td class="px-6 py-2 flex gap-4 justify-center">
                                    <a href="{{ route('books.edit', $book->id) }}"
                                        class="font-medium text-indigo-600 dark:text-indigo-500 hover:underline">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('books.destroy', $book->id) }}">
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
                {{ $books->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
