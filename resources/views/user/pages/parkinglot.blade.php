<x-app-layout>
    <!-- ========== MAIN CONTENT ========== -->

    <!-- Content -->
    <div class="w-full lg:ps-64">
        
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
            <!-- container -->
            <div class="bg-white rounded-md w-full p-2">
                <div>
                    <div class="font-bold tracking-wider text-slate-700 flex justify-between items-center">
                        <h1 class="mx-7">Click the slot available to continue.</h1>
                        <span class="">Total Slot: {{ count($establishment->parkinglot) }}</span>
                    </div>
                    <!-- Card Section -->
                    <div class="max-w-full px-4 py-4 mx-auto">
                        <!-- Grid -->
                        <div class="w-full flex flex-wrap justify-center items-center gap-2">
                            @foreach ($establishment->parkinglot as $p)
                                <div class="shadow w-[24%] flex flex-col items-center p-2 border hover:cursor-pointer hover:border-violet-500">
                                    <i class="fa-solid fa-square-parking text-3xl text-violet-500"></i>
                                    <div class="">
                                        <input name="ids[]" value="{{ $p->id }}" type="text" class="peer hidden text-slate-500 py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter name" readonly>
                                        <div class="relative mb-2">
                                            <input name="slot[]" value="{{ $p->slot }}" type="text" class="peer text-slate-500 py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter name" readonly>
                                            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                                <i class="fa-regular fa-square-parking flex-shrink-0 text-slate-500 dark:text-neutral-500"></i>
                                            </div>
                                        </div>
                                        <div class="flex justify-between items-center">

                                            <div class="relative">
                                                @switch($p->status)
                                                    @case('available')
                                                        <div class="peer py-3 px-4 ps-11 block w-full text-green-500 bg-gray-100 border-transparent rounded-lg text-sm">
                                                            <span>{{ $p->status }}</span>
                                                        </div>
                                                    
                                                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                                            <i class="fa-regular fa-square-parking flex-shrink-0 text-green-500  dark:text-neutral-500"></i>
                                                        </div>
                                                        @break
                                                    @case('not-available')
                                                        <div class="peer py-3 px-4 ps-11 block w-full text-red-500 bg-gray-100 border-transparent rounded-lg text-sm">
                                                            <span>{{ $p->status }}</span>
                                                        </div>
                                                    
                                                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                                            <i class="fa-regular fa-square-parking flex-shrink-0 text-red-500  dark:text-neutral-500"></i>
                                                        </div>
                                                        @break
                                                    @case('pwd')
                                                        <div class="peer py-3 px-4 ps-11 block w-full text-orange-500 bg-gray-100 border-transparent rounded-lg text-sm">
                                                            <span>{{ $p->status }}</span>
                                                        </div>
                                                    
                                                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                                            <i class="fa-regular fa-square-parking flex-shrink-0 text-orange-500  dark:text-neutral-500"></i>
                                                        </div>
                                                        @break
                                                    @default
                                                @endswitch
                                                
                                            </div>
                                            @if ($p->status !== 'not-available')
                                                <div data-slot_id="{{ $p->id }}" data-slot="{{ $p->slot }}" data-price="{{ $establishment->parking_price }}" class="slotBtn bg-violet-500 text-white hover:bg-violet-700 border-transparent rounded-lg text-sm p-2">
                                                    <button type="button">Book Now</button>
                                                </div>
                                            @endif
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('user.pages.modal.booked')

    @section('scripts')
        <script>
            $(document).ready(function(){
                $('.slotBtn').click(function(){
                    // alert($(this).data('slot_id'))
                    let slotId = $(this).data('slot_id')
                    let slotPrice = $(this).data('price')
                    let slot = $(this).data('slot')
                    // console.log(slot)
                    $('#parking_slot').val(slot)
                    $('#parking_price').val(slotPrice)
                    $('#slotId').val(slotId)
                    $('#bookedModalBtn').trigger('click')
                })

                //triger the booked submition
                $('#bookedSubmitBtn').click(function(){
                    $('#loader-modal').removeClass('hidden')
                    $('#booked-form').submit()
                })
            })
        </script>
    @endsection
</x-app-layout>