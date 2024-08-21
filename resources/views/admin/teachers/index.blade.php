<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Manage Teachers') }}
            </h2>
            <a href="{{route('admin.teachers.create')}}" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                Add New
            </a>
        </div>
    </x-slot>
    <div>

    </div>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex overflow-hidden flex-col gap-y-5 p-10 bg-white shadow-sm sm:rounded-lg">
{{-- Suggested code may be subject to a license. Learn more: ~LicenseLog:2648622222. --}}
                @forelse ( $teachers as $teacher)


                <div class="flex flex-row justify-between items-center items-card">
                    <div class="flex flex-row gap-x-3 items-center">
                        <img src="{{Storage::url($teacher->user->avatar)}}" alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-xl font-bold text-indigo-950">{{$teacher->user->name}}</h3>
{{-- Suggested code may be subject to a license. Learn more: ~LicenseLog:4171958247. --}}
                            <h3 class="text-xl font-bold text-indigo-950">{{$teacher->user->occupation}}</h3>
                        </div>
                    </div>
                    <div class="hidden flex-col md:flex">
                        <p class="text-sm text-slate-500">Date</p>
                        <h3 class="text-xl font-bold text-indigo-950">{{$teacher->created_at}}</h3>
                    </div>
                    <div class="hidden flex-row gap-x-3 items-center md:flex">
                        <form action="{{route('admin.teachers.destroy',$teacher)}}" class="}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-6 py-4 font-bold text-white bg-red-700 rounded-full">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                @empty

                    <p>Belum ada guru tersedia</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
