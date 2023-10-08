<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Add Book') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="overflow-hidden overflow-x-auto border-b border-gray-200 bg-white p-6">
                    <form action="{{ route('create-book') }}" method="POST">
                        @csrf
                        <div>
                            
                            <x-label for="author" value="Author" />
                            <select name="author" id="author" class="block mt-1 w-full">
                                <option value="">Select Author</option>
                                @foreach($getAuthorsList->items as $author)
                                    <option value="{{$author->id}}">{{ $author->first_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <x-label for="title" value="Title" />
                            <x-input id="title" name="title" value="{{ old('title') }}" type="text" class="block mt-1 w-full" />
                        </div>
                        <div>
                            <x-label for="release_date" value="Release Date" />
                            <x-input id="release_date" name="release_date" value="{{ old('release_date') }}" type="date" class="block mt-1 w-full" />
                        </div>
                        <div>
                            <x-label for="description" value="Description" />
                            <x-input id="description" name="description" value="{{ old('description') }}" type="text" class="block mt-1 w-full" />
                        </div>
                        <div>
                            <x-label for="isbn" value="Isbn" />
                            <x-input id="isbn" name="isbn" value="{{ old('isbn') }}" type="text" class="block mt-1 w-full" />
                        </div>
                        <div>
                            <x-label for="format" value="format" />
                            <x-input id="format" name="format" value="{{ old('format') }}" type="text" class="block mt-1 w-full" />
                        </div>
                        <div>
                            <x-label for="number_of_pages" value="Number Of Pages" />
                            <x-input id="number_of_pages" name="number_of_pages" value="{{ old('number_of_pages') }}" type="number" class="block mt-1 w-full" />
                        </div>
                        <div class="mt-4">
                            <x-button>Save</x-button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>