<!-- Table Section -->
<div class="max-w-[85rem] py-2 mx-auto">
    <!-- Card -->
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="bg-white shadow rounded-xl overflow-hidden dark:bg-neutral-900 dark:border-neutral-700">
                    <!-- Header -->
                    <div
                        class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                        <h1 class="md:text-xl lg:text-xl text-slate-800">
                            <i class="fa-regular fa-building-circle-check"></i>
                            Reservation
                        </h1>
                        <!-- Input -->
                        <!-- <div class="sm:col-span-1">
                <label for="hs-as-table-product-review-search" class="sr-only">Search</label>
                <div class="relative">
                  <input type="text" id="hs-as-table-product-review-search" name="hs-as-table-product-review-search" class="py-2 px-3 ps-11 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Search">
                  <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
                    <svg class="size-4 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                  </div>
                </div>
              </div> -->
                        <!-- End Input -->

                        <div class="sm:col-span-2 md:grow">
                            <div class="flex justify-end gap-x-2">

                                <div
                                    class="hs-dropdown relative inline-block [--placement:bottom-right]' data-hs-dropdown-auto-close="inside">
                                    <button id="hs-as-table-table-filter-dropdown" type="button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">
                                        <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M3 6h18" />
                                            <path d="M7 12h10" />
                                            <path d="M10 18h4" />
                                        </svg>
                                        Filter
                                        <span

                                            class="ps-2 text-xs font-semibold text-blue-600 border-s border-gray-200 dark:border-neutral-700 dark:text-blue-500">
                                            {{ count($reservation) }}
                                        </span>
                                    </button>
                                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-10 bg-white shadow-md rounded-lg mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                                        aria-labelledby="hs-as-table-table-filter-dropdown">
                                        <div id="statusFilters" class="divide-y divide-gray-200 dark:divide-neutral-700"> 
                                            <label data-status="all" for="hs-as-filters-dropdown-all" class="filter flex py-2.5 px-3 hover:bg-slate-100 hover:cursor-pointer w-full">
                                                
                                                <span
                                                    class="ms-3 text-sm text-gray-800 dark:text-neutral-200">All</span>
                                            </label>
                                            <label data-status="paid" for="hs-as-filters-dropdown-paid" class="filter flex py-2.5 px-3 hover:bg-slate-100 hover:cursor-pointer w-full">
                                                
                                                <span
                                                    class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Paid</span>
                                            </label>
                                            <label data-status="cancelled" for="hs-as-filters-dropdown-pending" class="filter flex py-2.5 px-3 hover:bg-slate-100 hover:cursor-pointer w-full">
                                               
                                                <span
                                                    class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Cancelled</span>
                                            </label>
                                            <label data-status="pending" for="hs-as-filters-dropdown-pending" class="filter flex py-2.5 px-3 hover:bg-slate-100 hover:cursor-pointer w-full">
                                                
                                                <span
                                                    class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Pending</span>
                                            </label>
                                            {{-- <label for="hs-as-filters-dropdown-declined" class="flex py-2.5 px-3">
                          <input type="checkbox" class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-as-filters-dropdown-declined">
                          <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">Declined</span>
                        </label> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Header -->

                    <!-- Table -->
                    <table id="reservation-table" class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead class="bg-gray-50 dark:bg-neutral-800">
                            <tr>
                                <th scope="col" class="ps-6 py-3 text-start">

                                </th>

                                <th scope="col" class="pe-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span
                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                            Establishment Name
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span
                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                            Parking Space
                                        </span>
                                        <div class="hs-tooltip">
                                            <div class="hs-tooltip-toggle">
                                                <svg class="flex-shrink-0 size-4 text-gray-500 dark:text-neutral-500"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                                    <path d="M12 17h.01" />
                                                </svg>
                                                <span
                                                    class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700"
                                                    role="tooltip">
                                                    The slot name selected
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span
                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                            Parking Price
                                        </span>
                                        <div class="hs-tooltip">
                                            <div class="hs-tooltip-toggle">
                                                <svg class="flex-shrink-0 size-4 text-gray-500 dark:text-neutral-500"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                                    <path d="M12 17h.01" />
                                                </svg>
                                                <span
                                                    class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700"
                                                    role="tooltip">
                                                    The price per hour basis
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span
                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                            Status
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span
                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                            Date Created
                                        </span>
                                    </div>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                            {{-- {{ $reservation }} --}}
                            @foreach ($reservation as $e)
                                <tr data-status="{{ $e->status }}">
                                    <td class="size-px whitespace-nowrap">
                                        <div class="ps-6 py-2">

                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="pe-6 py-2">
                                            <a
                                                class="text-sm text-blue-600 decoration-2 hover:underline dark:text-blue-500">{{ $e->parkingLot->parkingSpace->stablishment_name }}</a>
                                        </div>
                                    </td>

                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-2">
                                            <a
                                                class="text-sm flex items-center gap-2 text-violet-500 hover:cursor-pointer hover:text-violet-700 dark:text-neutral-400">
                                                <div>
                                                    <i class="fa-solid fa-square-parking"></i>
                                                    {{ $e->parkingLot->slot }}
                                                </div>
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-2">
                                            <span
                                                class="text-sm text-gray-600 dark:text-neutral-400">₱{{ $e->price }}
                                                {{ __('hrs') }}</span>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-2">
                                            @php
                                                // Current date
                                                $currentDate = date('Y-m-d');
                                            @endphp

                                            @if ($e->date == $currentDate && $e->status != 'cancelled')
                                                <span
                                                    class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                    ongoing
                                                </span>
                                            @elseif ($e->status == 'cancelled')
                                                <span
                                                    class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-orange-100 text-orange-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">

                                                    <i class="fa-solid fa-ban size-2.5"></i>
                                                    cancelled
                                                </span>
                                            @elseif ($e->status == 'paid')
                                                <span
                                                    class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                    paid
                                                </span>
                                            @else
                                                <span
                                                    class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-orange-100 text-orange-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                                    <i class="fa-solid fa-clock size-2.5"></i>
                                                    pending
                                                </span>
                                            @endif
                                        </div>
                                    </td>

                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-2">
                                            <span
                                                class="text-sm text-gray-600 dark:text-neutral-400">{{ \Carbon\Carbon::parse($e->created_at)->format('l, F j, Y') }}</span>
                                        </div>
                                    </td>

                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-1.5 flex justify-end">
                                            <div
                                                class="group inline-flex items-center divide-x divide-gray-300 border border-gray-300 bg-white shadow-sm rounded-lg transition-all dark:divide-neutral-700 dark:bg-neutral-700 dark:border-neutral-700">

                                                <div
                                                    class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                                                    <button id="hs-table-dropdown-2" type="button"
                                                        class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-e-md text-gray-700 align-middle focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-neutral-800 dark:text-neutral-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="currentColor"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                                        </svg>
                                                    </button>
                                                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-40 z-10 bg-white shadow-2xl rounded-lg p-2 mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                                                        aria-labelledby="hs-table-dropdown-2">
                                                        <div class="py-2 first:pt-0 last:pb-0">
                                                            <span
                                                                class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-neutral-600">
                                                                Options
                                                            </span>
                                                            <a id="information"
                                                                href="#"
                                                                data-user="{{ $e->user->name }}"
                                                                data-email="{{ $e->user->email }}"
                                                                data-type="{{ $e->vehicle_type }}"
                                                                data-color="{{ $e->vehicle_color }}"
                                                                data-plate="{{ $e->plate_number }}"
                                                                data-date="{{ $e->date }}"
                                                                data-stime="{{ $e->starting_time }}"
                                                                data-etime="{{ $e->end_time }}"
                                                                class="information flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300">
                                                                <i class="fa-solid fa-square-info"></i>
                                                                Information
                                                            </a>
                                                            <a id="payment" 
                                                                data-booked_id="{{ $e->id }}"
                                                                data-es="{{ $e->parkingLot->parkingSpace->stablishment_name }}"
                                                                data-price="{{ $e->price }}"
                                                                data-slot="{{ $e->parkingLot->slot }}"
                                                                data-charged="{{ $e->totalCharge->total }}"
                                                                data-charged_status="{{ $e->totalCharge->status }}"
                                                                data-date="{{ $e->date }}"
                                                                data-stime="{{ $e->starting_time }}"
                                                                data-etime="{{ $e->end_time }}"
                                                                class="payment flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300"
                                                                href="#">
                                                                <i class="fa-solid fa-peso-sign"></i>

                                                                Payment
                                                            </a>
                                                            <a 
                                                                data-booked_id="{{ $e->id }}" 
                                                                data-plate_number="{{ $e->plate_number }}" 
                                                                class="scanner flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-500 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300"
                                                                href="#">
                                                                <i class="fa-regular fa-scanner-touchscreen"></i>
                                                                Scanner
                                                            </a>
                                                            {{-- <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-500 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300"
                                                                href="#">
                                                                <i class="fa-solid fa-square-minus"></i>
                                                                Delete
                                                            </a> --}}
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                </div>
                </td>
                </tr>
                @endforeach

                </tbody>
                </table>
                <!-- End Table -->


            </div>
        </div>
    </div>
</div>
<!-- End Card -->
</div>
<!-- End Table Section -->
