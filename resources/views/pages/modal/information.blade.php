<div class="text-center">
  <button id="informationModalBtn" type="button"
      class="hidden py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
      data-hs-overlay="#hs-informationModal">
      Open modal
  </button>
</div>

<div id="hs-informationModal"
  class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
  <div
      class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
      <div
          class="relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden dark:bg-neutral-900 dark:border-neutral-800">
          <div class="absolute top-2 end-2">
              <button type="button"
                  class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-neutral-700"
                  data-hs-overlay="#hs-informationModal">
                  <span class="sr-only">Close</span>
                  <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                      viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round">
                      <path d="M18 6 6 18" />
                      <path d="m6 6 12 12" />
                  </svg>
              </button>
          </div>

          <div class="p-4 sm:p-10 overflow-y-auto">
              <div class="mb-6 text-center">
                  <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-neutral-200">
                      Basic Information.
                  </h3>
                  <p class="text-gray-500 dark:text-neutral-500">
                      This is the information of the user reservation!
                  </p>
              </div>

              <div class="space-y-4">
                  {{-- form --}}
                  <form action="#" method="post">
                      @csrf
                      <div class="mt-4">
                          <div class="p-2 shadow">
                            
                              <div class="mb-4">
                                  <span class="font-bold text-slate-600">User Detail's</span>

                                  <div class="mb-2">
                                    <div class="relative">
                                        <input id="user_name" type="text" name="name" value="" readonly class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter name">
                                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                            <i class="fa-solid fa-user flex-shrink-0 text-gray-500 dark:text-neutral-500"></i>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <div class="mb-2">
                                        <div class="relative">
                                            <input id="user_email" type="text" name="email" value="" readonly class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter name">
                                            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                                <i class="fa-solid fa-envelope flex-shrink-0 text-gray-500 dark:text-neutral-500"></i>
                                            </div>
                                        </div>
                                    </div>

                              </div>

                              <div class="mb-4">
                                  <span class="font-bold text-slate-600">Vehicle Detail's</span>

                                  <div class="mb-2">
                                    <div class="relative">
                                        <input id="vehicle_type" type="text" name="name" value="" readonly class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter name">
                                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                            <i class="fa-solid fa-car flex-shrink-0 text-gray-500"></i>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <div class="mb-2">
                                        <div class="relative">
                                            <input id="vehicle_color" type="text" name="email" value="" readonly class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter name">
                                            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                                <i class="fa-solid fa-car flex-shrink-0 text-gray-500"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <div class="relative">
                                            <input id="vehicle_number" type="text" name="email" value="" readonly class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter name">
                                            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                                <i class="fa-solid fa-car flex-shrink-0 text-gray-500"></i>
                                            </div>
                                        </div>
                                    </div>

                              </div>


                              <div>
                                  <span class="font-bold text-slate-600">Effective Date and Time</span>
                                  <div class="mb-2">
                                      <div>
                                          <div class="relative">
                                              <input id="e_date" name="date" type="date"
                                                  class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                  placeholder="Enter select a date" readonly>
                                              <div
                                                  class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                                  <i
                                                      class="fa-solid fa-calendar-days flex-shrink-0 text-gray-500 dark:text-neutral-500"></i>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="mb-2 flex items-center gap-2">
                                      <div class="w-full">
                                          <label for="">Starting Time:</label>
                                          <div class="relative">
                                              <input id="e_stime" name="starting_time" type="time"
                                                  class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                  placeholder="Enter select a date" readonly>
                                              <div
                                                  class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                                  <i
                                                      class="fa-solid fa-timer flex-shrink-0 text-gray-500 dark:text-neutral-500"></i>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="w-full">
                                          <label for="">End Time:</label>
                                          <div class="relative">
                                              <input id="e_etime" name="end_time" type="time"
                                                  class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                  placeholder="Enter select a date" readonly>
                                              <div
                                                  class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                                  <i
                                                      class="fa-solid fa-timer flex-shrink-0 text-gray-500 dark:text-neutral-500"></i>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="mb-2 flex justify-center gap-2">
                                  <button type="button"
                                      class="w-full bg-red-500 p-2 text-white rounded-md hover:bg-red-700"
                                      data-hs-overlay="#hs-informationModal">
                                      Close
                                  </button>
                                  {{-- <button type="buttom" id="bookedSubmitBtn"
                                      class="w-[50%] bg-violet-500 p-2 text-white rounded-md hover:bg-violet-700">Paid</button> --}}
                              </div>
                          </div>

                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
