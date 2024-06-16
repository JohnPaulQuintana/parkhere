<x-app-layout>
    <!-- ========== MAIN CONTENT ========== -->

    <!-- Content -->
    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
            <!-- container -->
            <div class="bg-white rounded-md w-full p-2">
                <div>
                    <div class="font-bold tracking-wider text-slate-700 flex justify-between items-center">
                        <h1 class="mx-7">This is your successfull reservation of parking space.</h1>
                        {{-- <span class="">Total Slot: {{ count($establishment->parkinglot) }}</span> --}}
                    </div>
                    <!-- Card Section -->
                    <div class="max-w-full px-4 py-4 mx-auto">
                        <!-- Grid -->
                        <div class="w-full">
                           @include('user.pages.tables.table', ['histories'=>$histories])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('user.pages.modal.edit-booked')
    @include('user.pages.modal.payment')

    @section('scripts')
        <script>
            let historyIsSave = @json(session('history.save'));
            $(document).ready(function(){
                switch (historyIsSave) {
                    case 'success':
                        popup('Reservation Success', 'Your reservation is successfully!','success');
                        break;
                    case 'updated':
                        popup('Reservation Updated', 'Your reservation is successfully updated!','success');
                        break;
                    case 'cancelled':
                        popup('Reservation Cancelled', 'Your reservation is now cancelled!','success');
                        break;
                
                    default:
                        break;
                }

                //edit booked
                $('.editBooked').click(function(){
                    let bookedId = $(this).data('booked_id')
                    let slotId = $(this).data('slot_id')
                    let slotPrice = $(this).data('slot_price')
                    let slotName = $(this).data('slot_name')
                    let type = $(this).data('type')
                    let color = $(this).data('color')
                    let plateNumber = $(this).data('plate_number')
                    let date = $(this).data('date')
                    let stime = $(this).data('stime')
                    let etime = $(this).data('etime')

                    $('#bookedId').val(bookedId)
                    $('#slotId').val(slotId)
                    $('#parking_price').val(slotPrice)
                    $('#parking_slot').val(slotName)
                    $('#vehicle_type').val(type)
                    $('#vehicle_color').val(color)
                    $('#vehicle_plate_number').val(plateNumber)
                    $('#vehicle_plate_number').val(plateNumber)
                    $('#date').val(date)
                    $('#stime').val(stime)
                    $('#etime').val(etime)

                    $('#editBookedModalBtn').trigger('click')
                })

                //payment modal
                $('.parking_payment').click(function(){
                    let bookedId = $(this).data('booked_id')
                    let bookedPrice = $(this).data('parking_price')
                    let bookedDate = $(this).data('parking_date')
                    let bookedSTime = $(this).data('parking_stime')
                    let bookedETime = $(this).data('parking_etime')
                    let bookedSlotName = $(this).data('slot_name')
                    let establishment = $(this).data('establishment')
                    let total = $(this).data('total_charged')
                    let status = $(this).data('total_charged_status')
                    // alert(bookedId)

                    if(status == 'paid'){
                        $('.statusClass').removeClass('text-red-500').addClass('text-green-500')
                    }

                    $('#initial-charged').val(bookedPrice)
                    $('#parking_slot_selected').val(bookedSlotName)
                    $('#effective_date').val(bookedDate)
                    $('#effective_stime').val(bookedSTime)
                    $('#effective_etime').val(bookedETime)
                    $('#establishment_name').val(establishment)
                    $('#charges_total').val(total)
                    $('#charges_status').text(status)
                    $('#paymentModalBtn').trigger('click')

                })

                // Handle click on status filter labels
                $('#statusFilters label').click(function() {
                    let status = $(this).data('status'); // Get the status from data-status attribute
                    // alert(status)
                    // Filter your table rows based on the status
                    if (status === 'all') {
                        // Show all rows if 'All' is selected
                        $('#history-table tbody tr').show();
                    }else{
                        // Hide all rows
                         $('#history-table tbody tr').hide();
                         // Show rows matching the selected status
                        $(`#history-table tbody tr[data-status="${status}"]`).show();
                    }
                })

                //triger the edit booked submition
                $('#updateBookedSubmitBtn').click(function(){
                    $('#loader-modal').removeClass('hidden')
                    $('#update-booked-form').submit()
                })
            })

            const popup = (t,m,i) => {
                Swal.fire({
                    title: t,
                    text: m,
                    icon: i
                });
            }
        </script>
    @endsection
</x-app-layout>