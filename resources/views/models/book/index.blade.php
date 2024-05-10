<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <form class="pb-4" action="{{ route('books.index') }}">
                <div class="flex">
                    <button
                        class="z-10 inline-flex flex-shrink-0 items-center rounded-s-lg border border-gray-300 bg-gray-100 px-4 py-2.5 text-center text-sm font-medium text-gray-900 hover:bg-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600"
                        id="dropdown-button" data-dropdown-toggle="dropdown-genres" type="button">Genres <svg
                            class="ms-2.5 h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>
                    <!-- Dropdown genres nmenu -->
                    <div class="z-10 hidden w-60 rounded-lg bg-white shadow dark:bg-gray-700" id="dropdown-genres">
                        <div class="p-3">
                            <div class="relative">
                                <div
                                    class="rtl:inset-r-0 pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 ps-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    id="input-genre-search" type="text" placeholder="Search genres...">
                            </div>
                        </div>
                        <ul class="h-48 overflow-y-auto px-3 pb-3 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownSearchButton">
                            @foreach ($genres as $genre)
                                <li class="genre-list-item">
                                    <div class="flex items-center rounded ps-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-indigo-600 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 focus:ring-0 focus:outline-none cursor-pointer"
                                            type="checkbox" value="{{ $genre->id }}" name="genres[]"
                                            @if (in_array($genre->id, request()->get('genres', [])))
                                                checked
                                            @endif
                                        >
                                        <label
                                            class="ms-2 w-full rounded py-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                            for="checkbox-item-11">{{ $genre->name }}</label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <button
                        class="z-10 inline-flex flex-shrink-0 items-center border border-gray-300 bg-gray-100 px-4 py-2.5 text-center text-sm font-medium text-gray-900 hover:bg-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600"
                        data-dropdown-toggle="dropdown-authors" type="button">Authors <svg
                            class="ms-2.5 h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg></button>
                    <!-- Dropdown authors menu -->
                    <div class="z-10 hidden w-60 rounded-lg bg-white shadow dark:bg-gray-700" id="dropdown-authors">
                        <div class="p-3">
                            <div class="relative">
                                <div
                                    class="rtl:inset-r-0 pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 ps-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    id="input-author-search" type="text" placeholder="Search authors...">
                            </div>
                        </div>
                        <ul class="h-48 overflow-y-auto px-3 pb-3 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownSearchButton">
                            @foreach ($authors as $author)
                                <li class="author-list-item">
                                    <div class="flex items-center rounded ps-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-indigo-600 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 focus:ring-0 focus:outline-none cursor-pointer"
                                            type="checkbox" value="{{ $author->id }}" name="authors[]"
                                            @if (in_array($author->id, request()->get('authors', [])))
                                                checked
                                            @endif
                                        >
                                        <label
                                            class="ms-2 w-full rounded py-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                            for="checkbox-item-11">{{ $author->name }}</label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="relative w-full">
                        <input
                            class="z-20 block w-full rounded-e-lg border border-s-2 border-gray-300 border-s-gray-50 bg-gray-50 p-2.5 text-sm text-gray-900 focus:outline-none focus:ring-0 dark:border-gray-600 dark:border-s-gray-700 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                            name="query" type="text" placeholder="Search title or pages..." value="{{ request()->get('query') }}" />
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

            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                    <caption class="hidden">Book index table</caption>
                    <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-2" scope="col">
                                ID
                            </th>
                            <th class="px-6 py-2" scope="col">
                                Title
                            </th>
                            <th class="px-6 py-2" scope="col">
                                Pages
                            </th>
                            <th class="px-6 py-2" scope="col">
                                Author
                            </th>
                            <th class="px-6 py-2" scope="col">
                                Genre
                            </th>
                            <th class="flex items-center justify-center px-6 py-2" scope="col">
                                <a class="rounded-lg bg-indigo-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-indigo-800 focus:outline-none focus:ring-4 focus:ring-indigo-300 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-900"
                                    type="button" href="{{ route('books.create') }}">Add</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr
                                class="border-b odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800">
                                <th class="whitespace-nowrap px-6 py-2 font-medium text-gray-900 dark:text-white"
                                    scope="row">
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
                                <td class="flex justify-center gap-4 px-6 py-2">
                                    <a class="font-medium text-indigo-600 hover:underline dark:text-indigo-500"
                                        href="{{ route('books.edit', $book->id) }}">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('books.destroy', $book->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button
                                            class="font-medium text-indigo-600 hover:underline dark:text-indigo-500"
                                            type="submit">
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
