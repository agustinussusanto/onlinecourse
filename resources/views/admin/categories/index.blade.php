<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Manage Categories') }}
            </h2>
            <a href="{{ route('admin.categories.create') }}" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex overflow-hidden flex-col gap-y-5 p-10 bg-white shadow-sm sm:rounded-lg">

                @forelse ($categories as $category)
                <div class="flex flex-row justify-between items-center item-card">
                    <div class="flex flex-row gap-x-3 items-center">
                        <img src="{{ Storage::url($category->icon) }}" alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-xl font-bold text-indigo-950">{{ $category->name }}</h3>
                        </div>
                    </div>
                    <div class="hidden flex-col md:flex">
                        <p class="text-sm text-slate-500">Date</p>
                        <h3 class="text-xl font-bold text-indigo-950">{{ $category->created_at }}</h3>
                    </div>
                    <div class="hidden flex-row gap-x-3 items-center md:flex">
                        <a href="#" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                            Edit
                        </a>
                        <form action="#" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-6 py-4 font-bold text-white bg-red-700 rounded-full">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <p>
                    Tidak ada data kategori terbaru
                </p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
