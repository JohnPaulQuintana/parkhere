<x-app-layout>
    <!-- ========== MAIN CONTENT ========== -->

    <!-- Content -->
    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
            <!-- container -->
            <div class="bg-white rounded-md w-full p-2">
                <div>
                    <h1 class="mx-7 font-bold tracking-wider text-slate-700">Available Establishment's</h1>
                    <!-- Card Section -->
                    <div class="max-w-5xl px-4 py-4 mx-auto">
                        <!-- Grid -->
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">

                            @foreach ($establishments as $e)
                                <!-- Card -->
                                <div class="group relative flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-neutral-900 dark:border-neutral-800"
                                   >
                                    <div class="p-4 md:p-5 mb-20 md:mb-10">
                                        <div class="flex justify-center items-center">
                                            <i
                                                class="fa-solid fa-building-circle-check mt-1 flex-shrink-0 text-xl md:text-4xl text-violet-500"></i>
                                            <div class="grow ms-5">
                                                <h3
                                                    class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-neutral-400 dark:text-neutral-200">
                                                   {{ $e->stablishment_name }}
                                                </h3>
                                                <p class="text-sm text-gray-500 dark:text-neutral-500">
                                                    {{ $e->stablishment_desciption }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="absolute border py-2 bottom-0 w-full flex flex-wrap justify-center items-center gap-2">
                                        <span class="bg-slate-100 rounded-md p-1 font-bold text-slate-700"><i class="fa-solid fa-circle-check text-green-500"></i> {{ __('active') }}</span>
                                        <span class="bg-slate-100 rounded-md p-1 font-bold text-slate-700"><i class="fa-solid fa-square-parking text-violet-500"></i> {{ $e->parking_space_count }}</span>
                                        <span class="bg-slate-100 rounded-md p-1 font-bold text-slate-700"><i class="fa-solid fa-peso-sign text-violet-500"></i> {{ $e->parking_price }}</span>
                                        <a href="#" class="bg-violet-500 hover:bg-violet-700 rounded-md p-1 font-bold text-white">{{ __('Book now!') }}</a>
                                    </div>
                                </div>
                                <!-- End Card -->
                            @endforeach


                        </div>
                        <!-- End Grid -->
                    </div>
                    <!-- End Card Section -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
