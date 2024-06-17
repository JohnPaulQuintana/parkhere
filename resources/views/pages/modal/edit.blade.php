<div class="text-center">
    <button id="editModalBtn" type="button" class="hidden py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#hs-editModal">
      Open modal
    </button>
  </div>
  
  <div id="hs-editModal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
      <div class="relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden dark:bg-neutral-900 dark:border-neutral-800">
        <div class="absolute top-2 end-2">
          <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-neutral-700" data-hs-overlay="#hs-editModal">
            <span class="sr-only">Close</span>
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          </button>
        </div>
  
        <div class="p-4 sm:p-10 overflow-y-auto">
          <div class="mb-6 text-center">
            <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-neutral-200">
              Edit Establishment
            </h3>
            <p class="text-gray-500 dark:text-neutral-500">
                Make your establishement available online.
            </p>
          </div>
  
          <div class="space-y-4">
                {{-- form --}}
                <form action="{{ route('admin.establishment.update.es') }}" method="post">
                    @csrf
                    <input type="number" name="es_id" class="hidden" id="es_id">
                    <div class="mt-4">
                        <div class="p-2 shadow">
                            Basic Information of establishment
                            <div class="mb-2">
                                <div class="relative">
                                    <input id="edit_name" type="text" name="establishment_name" class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter name">
                                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <i class="fa-regular fa-building-circle-check flex-shrink-0 text-gray-500 dark:text-neutral-500"></i>
                                    </div>
                                  </div>
                            </div>
                            <div class="mb-2">
                                <div class="relative">
                                    <textarea id="edit_description" name="establishment_description" class="py-3 px-4 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="3" placeholder="Enter description">
                                    
                                    </textarea>
                                  </div>
                            </div>
                            <div class="mb-2">
                                <!-- Input Number -->
                                <div class="py-2 px-3 bg-gray-100 rounded-lg dark:bg-neutral-900 dark:border-neutral-700" data-hs-input-number="">
                                    <div class="w-full flex justify-between items-center gap-x-3">
                                    <div>
                                        <span class="block font-medium text-sm text-gray-800 dark:text-white">
                                        Price
                                        </span>
                                        <span class="block text-xs text-gray-500 dark:text-neutral-400">
                                            ₱0 Parking Price
                                        </span>
                                    </div>
                                    <div class="flex items-center gap-x-1.5">
                                        <button type="button" class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800" data-hs-input-number-decrement="">
                                        <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                        </svg>
                                        </button>
                                        <input id="edit_price" name="parking_price" class="p-0 w-6 bg-transparent border-0 text-gray-800 text-center focus:ring-0 dark:text-white" type="text" value="0" data-hs-input-number-input="">
                                        <button type="button" class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800" data-hs-input-number-increment="">
                                        <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5v14"></path>
                                        </svg>
                                        </button>
                                    </div>
                                    </div>
                                </div>
                                <!-- End Input Number -->
                            </div>
                            <div class="mb-2">
                                <!-- Input Number -->
                                <div class="py-2 px-3 bg-gray-100 rounded-lg dark:bg-neutral-900 dark:border-neutral-700" data-hs-input-number="">
                                    <div class="w-full flex justify-between items-center gap-x-3">
                                    <div>
                                        <span class="block font-medium text-sm text-gray-800 dark:text-white">
                                        Slot
                                        </span>
                                        <span class="block text-xs text-gray-500 dark:text-neutral-400">
                                            0 How many slot's
                                        </span>
                                    </div>
                                    <div class="flex items-center gap-x-1.5">
                                        <button type="button" class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800" data-hs-input-number-decrement="">
                                        <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                        </svg>
                                        </button>
                                        <input id="edit_slot" name="establishment_slot" class="p-0 w-6 bg-transparent border-0 text-gray-800 text-center focus:ring-0 dark:text-white" type="text" value="0" data-hs-input-number-input="">
                                        <button type="button" class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800" data-hs-input-number-increment="">
                                        <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5v14"></path>
                                        </svg>
                                        </button>
                                    </div>
                                    </div>
                                </div>
                                <!-- End Input Number -->
                                
                            </div>

                            <div class="mb-2">
                                <div class="relative">
                                    <input id="edit_sname" name="parking_starting_name" type="text" class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter slot name">
                                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <i class="fa-regular fa-building-circle-check flex-shrink-0 text-gray-500 dark:text-neutral-500"></i>
                                    </div>
                                  </div>
                            </div>
                            <div class="mb-2 flex justify-center gap-2">
                                <button type="button" class="w-[50%] bg-red-500 p-2 text-white rounded-md hover:bg-red-700" data-hs-overlay="#hs-editModal">
                                    Cancel
                                  </button>
                                <button type="submit" class="w-[50%] bg-violet-500 p-2 text-white rounded-md hover:bg-violet-700">Update Information</button>
                            </div>
                        </div>

                    </div>
                </form>
          </div>
        </div>
      </div>
    </div>
  </div>