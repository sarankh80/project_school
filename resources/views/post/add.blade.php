<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_token" id="" value="">
                    <h1 class="p-6 text-gray-900 dark:text-gray-100">
                        Add New Post
                    </h1>   
                    <div class="p-6">
                        <label for="title" class="block text-gray-700 dark:text-gray-300">Title:</label>
                        <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>
                    <div class="p-6">
                        <label for="slug" class="block text-gray-700 dark:text-gray-300">Slug:</label>
                        <input type="text" id="slug" name="slug" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>
                     <div class="p-6">
                        <label for="content" class="block text-gray-700 dark:text-gray-300">Category:</label>
                        <select id="category_id" name="category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                     </div>
                    <div class="p-6">
                        <label for="content" class="block text-gray-700 dark:text-gray-300">Content:</label>
                        <textarea id="content" name="content" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus
:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
                    </div>
                    <div class="p-6">
                        <label for="is_active" class="inline-flex items-center text-gray-700 dark               
:text-gray-300">
                            <input type="checkbox" id="is_active" name="is_active" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600">
                            <span class="ml-2">Active</span>
                        </label>
                    </div>
                    <div class="p-6">
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save Post</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</x-app-layout>