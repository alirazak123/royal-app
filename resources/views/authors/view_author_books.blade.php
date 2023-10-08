<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('View Author Books') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(Session::get('countBooks') == 0)
                        <div class="mt-1 mb-4">
                            <div class="justify-items-stretch my-3">
                                <a href="{{route('delete-author', [Session::get('authorId')])}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 flex justify-self-end">Delete Author</a>
                            </div>
                        </div>
                    @endif    
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Sr.No</th>
                                    <th scope="col" class="px-6 py-3">Title</th>
                                    <th scope="col" class="px-6 py-3">Release Date</th>
                                    <th scope="col" class="px-6 py-3">Description</th>
                                    <th scope="col" class="px-6 py-3">Isbn</th>
                                    <th scope="col" class="px-6 py-3">Format</th>
                                    <th scope="col" class="px-6 py-3">Number Of Pages</th>
                                    <th scope="col" class="px-6 py-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($viewAuthorBooks->books as $index=>$book)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            {{$index+1}}
                                        </th>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{$book->title}}</th>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{$book->release_date}}</th>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{$book->description}}</th>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{$book->isbn}}</th>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{$book->format}}</th>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{$book->number_of_pages}}</th>
                                        <td class="px-6 py-4">
                                            <a href="{{route('delete-book', [$book->id])}}">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td class="px-6 py-4">No record found.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
