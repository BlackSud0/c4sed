@section('content')
<!-- <link rel="stylesheet" href="./style.css"> -->
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Dashboard
</h2>
<!-- Cards -->
<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
    <!-- Card -->
    <a href="{{ route('beams') }}" class="flex zoom-in items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
            </svg>  
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Analyzed Beams
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{Auth::user()->CalculatedBeam->count()}}
            </p>
        </div>
    </a>
    <!-- Card -->
    <a href="{{ route('columns') }}" class="flex zoom-in items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
            </svg>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Analyzed Columns
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{Auth::user()->CalculatedColumn->count()}}
            </p>
        </div>
    </a>
    <!-- Card -->
    <a href="{{ route('eangles') }}" class="flex zoom-in items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
            </svg>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Analyzed Angles
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{Auth::user()->CalculatedEangle->count()}}
            </p>
        </div>
    </a>
    <!-- Card -->
    <a href="{{ route('baseplates') }}" class="flex zoom-in items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
            </svg>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Base Plates
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                0
            </p>
        </div>
    </a>
</div>

<section class="container text-gray-600 body-font">
    <div class="flex flex-col text-center w-full">
      <h1 class="sm:text-3xl flex mx-auto text-2xl font-medium title-font mb-3 text-gray-900 dark:text-gray-300">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-1 mt-1 text-theme-24"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><rect x="7" y="7" width="3" height="9"></rect><rect x="14" y="7" width="3" height="5"></rect></svg>
            To-Do tasks
      </h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-600 dark:text-gray-400">The main purpose of a to-do list is to provide yourself with a list of your priorities in order to ensure that you don't forget anything and are able to effectively plan out your tasks so that they are all accomplished in the correct time frame.</p>
    </div>
</section>

<!-- TODO List -->
<div class="grid grid-cols-12 gap-6 mb-10">
    <div class="col-span-12 md:col-span-6 xl:col-span-12 xxl:mt-8">
        <div class="mt-2">
            @livewire('tasks.create-task')
        </div>
    </div>
    <!-- BEGIN: Tasks list -->
    <div class="col-span-12 md:col-span-6 xl:col-span-6 xxl:col-span-12">
        <div class="flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">
                Tasks list
            </h2>
        </div>
        <div class="mt-5">
            @livewire('tasks.edit-task')
        </div>
        <div class="mt-5">
            @livewire('tasks.tasks-list')
        </div>
    </div>
    <!-- END: Tasks list -->
    <!-- BEGIN: Recently Completed Tasks -->
    <div class="col-span-12 md:col-span-6 xl:col-span-6 xxl:col-span-12">
        <div class="flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">
                Completed Tasks
            </h2>
        </div>
        <div class="report-timeline mt-5 relative">
            @livewire('tasks.completed-tasks')
        </div>
    </div>
    <!-- END: Recently Completed Tasks -->
</div>


@endsection