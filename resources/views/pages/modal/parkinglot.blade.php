<div class="text-center">
    <button id="parkingLotModalBtn" type="button" class="hidden py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#hs-createParkingLotModal">
      Open modal
    </button>
  </div>
  
  <div id="hs-createParkingLotModal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all md:max-w-3xl md:w-full m-3 md:mx-auto">
      <div class="relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden dark:bg-neutral-900 dark:border-neutral-800">
        <div class="absolute top-2 end-2">
          <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-neutral-700" data-hs-overlay="#hs-createParkingLotModal">
            <span class="sr-only">Close</span>
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          </button>
        </div>
  
        <div class="p-4 sm:p-10 overflow-y-auto">
          <div class="mb-6 text-center">
            <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-neutral-200">
              Customize Parking Space
            </h3>
            <p class="text-gray-500 dark:text-neutral-500">
                Make your parking lot available online.
            </p>
            <p class="text-gray-500 dark:text-neutral-500">
                Total of <span id="total" class="font-bold text-violet-500"></span>
            </p>
          </div>
  
          <div class="space-y-4">
                {{-- form --}}
                <form action="{{ route('admin.establishment.update') }}" method="post">
                    @csrf
                    <input type="number" class="hidden" name="establishment_id" id="establishment_id">
                    <div id="parking_space_available" class="border p-2 flex flex-wrap items-center gap-2 max-h-[370px] overflow-y-auto">
                       
                    </div>
                    
                    <div class="mt-2 flex justify-center gap-2">
                        <button type="button" class="w-[50%] bg-red-500 p-2 text-white rounded-md hover:bg-red-700" data-hs-overlay="#hs-createParkingLotModal">
                            Cancel
                          </button>
                        <button type="submit" class="w-[50%] bg-violet-500 p-2 text-white rounded-md hover:bg-violet-700">Save Updates</button>
                    </div>
                </form>
          </div>
        </div>
      </div>
    </div>
  </div>