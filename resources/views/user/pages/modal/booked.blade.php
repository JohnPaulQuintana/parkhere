<div class="text-center">
    <button id="bookedModalBtn" type="button" class="hidden py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#hs-bookedModal">
      Open modal
    </button>
  </div>
  
  <div id="hs-bookedModal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
      <div class="relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden dark:bg-neutral-900 dark:border-neutral-800">
        <div class="absolute top-2 end-2">
          <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-neutral-700" data-hs-overlay="#hs-bookedModal">
            <span class="sr-only">Close</span>
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          </button>
        </div>
  
        <div class="p-4 sm:p-10 overflow-y-auto">
          <div class="mb-6 text-center">
            <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-neutral-200">
                Setup your booked for parking lot.
            </h3>
            <p class="text-gray-500 dark:text-neutral-500">
                Secure your slot by completing the form!
            </p>
          </div>
  
          <div class="space-y-4">
                {{-- form --}}
                <form id="booked-form" action="{{ route('user.reserved.slot') }}" method="post">
                    @csrf

                    <input type="number" name="slot_id" id="slotId" class="hidden">
                    <div class="mt-4">
                        <div class="p-2 shadow">
                            Basic Information
                            <div class="mb-2">
                                <div class="relative">
                                    <input type="text" name="name" value="{{ auth()->user()->name }}" readonly class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter name">
                                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <i class="fa-solid fa-user flex-shrink-0 text-gray-500 dark:text-neutral-500"></i>
                                    </div>
                                  </div>
                            </div>
                            <div class="mb-2">
                                <div class="relative">
                                    <input type="text" name="email" value="{{ auth()->user()->email }}" readonly class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter name">
                                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <i class="fa-solid fa-envelope flex-shrink-0 text-gray-500 dark:text-neutral-500"></i>
                                    </div>
                                  </div>
                            </div>
                            
                            <div class="mb-2">
                                <!-- Input Number -->
                                <div class="py-2 px-3 bg-gray-100 rounded-lg dark:bg-neutral-900 dark:border-neutral-700">
                                    <div class="w-full flex justify-between items-center gap-x-3">
                                    <div>
                                        <span class="block font-medium text-sm text-gray-800 dark:text-white">
                                        Price
                                        </span>
                                        <span class="block text-xs text-gray-500 dark:text-neutral-400">
                                            <span class="font-bold">₱</span> Parking Price
                                        </span>
                                    </div>
                                    <div class="flex items-center gap-x-1.5">
                                        
                                        <input id="parking_price" name="parking_price" class="p-0 w-[100px] text-end bg-transparent border-0 text-gray-800 text-center focus:ring-0 dark:text-white" type="text" value="" readonly>
                                        
                                    </div>
                                    </div>
                                </div>
                                <!-- End Input Number -->
                            </div>

                            <div class="mb-2">
                                <!-- Input Number -->
                                <div class="py-2 px-3 bg-gray-100 rounded-lg dark:bg-neutral-900 dark:border-neutral-700">
                                    <div class="w-full flex justify-between items-center gap-x-3">
                                    <div>
                                        <span class="block font-medium text-sm text-gray-800 dark:text-white">
                                        Slot
                                        </span>
                                        <span class="block text-xs text-gray-500 dark:text-neutral-400">
                                            Parking Slot
                                        </span>
                                    </div>
                                    <div class="flex items-center">
                                        
                                        <input id="parking_slot" name="slot" class="p-0 w-[100px] text-end bg-transparent border-0 text-gray-800 focus:ring-0 dark:text-white" type="text" value="" readonly>
                                        
                                    </div>
                                    </div>
                                </div>
                                <!-- End Input Number -->
                            </div>
                            

                            <div class="mb-2">
                                <div class="relative">
                                    <input name="vehicle_type" type="text" class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter vehicle type" required>
                                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <i class="fa-solid fa-car flex-shrink-0 text-gray-500 dark:text-neutral-500"></i>
                                    </div>
                                  </div>
                            </div>
                            <div class="mb-2">
                                <div class="relative">
                                    <input name="vehicle_color" type="text" class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter vehicle color" required>
                                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <i class="fa-solid fa-car flex-shrink-0 text-gray-500 dark:text-neutral-500"></i>
                                    </div>
                                  </div>
                            </div>
                            <div class="mb-2">
                                <div class="relative">
                                    <input name="vehicle_plate_number" type="text" class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter vehicle plate number" required>
                                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <i class="fa-solid fa-car flex-shrink-0 text-gray-500 dark:text-neutral-500"></i>
                                    </div>
                                  </div>
                            </div>
                            <div class="mb-2">
                                <div>
                                    <label for="">Date: <span class="text-red-500">note: you are charged based on price.</span></label>
                                    <div class="relative">
                                        <input name="date" type="date" class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter select a date" required>
                                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                            <i class="fa-solid fa-calendar-days flex-shrink-0 text-gray-500 dark:text-neutral-500"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 flex items-center gap-2">
                                <div class="w-full">
                                    <label for="">Starting Time:</label>
                                    <div class="relative">
                                        <input name="starting_time" type="time" class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter select a date" required>
                                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                            <i class="fa-solid fa-timer flex-shrink-0 text-gray-500 dark:text-neutral-500"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label for="">End Time:</label>
                                    <div class="relative">
                                        <input name="end_time" type="time" class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter select a date" required>
                                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                            <i class="fa-solid fa-timer flex-shrink-0 text-gray-500 dark:text-neutral-500"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 flex justify-center gap-2">
                                <button type="button" class="w-[50%] bg-red-500 p-2 text-white rounded-md hover:bg-red-700" data-hs-overlay="#hs-bookedModal">
                                    Cancel
                                  </button>
                                <button type="buttom" id="bookedSubmitBtn" class="w-[50%] bg-violet-500 p-2 text-white rounded-md hover:bg-violet-700">Save Information</button>
                            </div>
                        </div>

                    </div>
                </form>
          </div>
        </div>
      </div>
    </div>
  </div>