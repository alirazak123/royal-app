<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('View All Authors') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <div class="mt-1 mb-4">
                        <div class="justify-items-stretch my-3">
                        </div>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Sr.No</th>
                                    <th scope="col" class="px-6 py-3">First Name</th>
                                    <th scope="col" class="px-6 py-3">Last Name</th>
                                    <th scope="col" class="px-6 py-3">Birthday</th>
                                    <th scope="col" class="px-6 py-3">Gender</th>
                                    <th scope="col" class="px-6 py-3">Place Of Birth</th>
                                    <th scope="col" class="px-6 py-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($getAuthorsList->items as $index=>$author)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            {{$index+1}}
                                        </th>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{$author->first_name}}</th>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{$author->last_name}}</th>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{$author->birthday}}</th>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{$author->gender}}</th>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{$author->place_of_birth}}</th>
                                        <td class="px-6 py-4">
                                            <a href="{{route('view-author-books', [$author->id])}}">View Books</a>
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
