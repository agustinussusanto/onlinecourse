<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Manage Courses') }}
            </h2>
            <a href="{{route('admin.courses.create')}}" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex overflow-hidden flex-col gap-y-5 p-10 bg-white shadow-sm sm:rounded-lg">
                @forelse ($courses as $course )


                <div class="flex flex-col gap-y-10 justify-between item-card md:flex-row md:items-center">
                    <div class="flex flex-row gap-x-3 items-center">
                        <img src="{{Storage::url($course->thumbnail)}}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-xl font-bold text-indigo-950">{{ $course->name }}</h3>
                            <p class="text-sm text-slate-500">{{$course->category->name}}</p>
                        </div>
                    </div>
                    <div class="hidden flex-col md:flex">
                        <p class="text-sm text-slate-500">Students</p>
                        <h3 class="text-xl font-bold text-indigo-950">{{ $course->students ? $course->students->count() : 0 }}</h3>
                    </div>
                    <div class="hidden flex-col md:flex">
                        <p class="text-sm text-slate-500">Videos</p>
                        <h3 class="text-xl font-bold text-indigo-950">{{ $course->course_videos ? $course->course_videos->count() : 0 }}</h3>
                    </div>
                    <div class="hidden flex-col md:flex">
                        <p class="text-sm text-slate-500">Teacher</p>
                        <h3 class="text-xl font-bold text-indigo-950">{{ $course->teacher ? $course->teacher->user->name : 'N/A' }}</h3>
                    </div>
                    <div class="hidden flex-row gap-x-3 items-center md:flex">
                        <a href="{{route('admin.courses.show', $course->id)}}" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                            Manage
                        </a>
                        <form action="{{route('admin.courses.destroy', $course->id) }}" method="POST">
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
                    Belum ada kelas yang ditambahkan
                </p>

                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
