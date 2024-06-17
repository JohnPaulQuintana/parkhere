<x-app-layout>
    <!-- ========== MAIN CONTENT ========== -->
    
    <!-- Content -->
    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
            <!-- container -->
            <div class="bg-white rounded-md w-full p-2">

                @include('pages.tables.reservation-table')
                @include('pages.modal.payment')
                @include('pages.modal.information')
                @include('pages.modal.scanner')
                {{-- @include('pages.modal.parkinglot') --}}

            </div>
            <!-- End conatiner -->
        </div>
    </div>

    @section('scripts')
        <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

        <script>
            console.log('connected.')
            let reservation = @json(session('reservation.status'));
            $(document).ready(function(){

                switch (reservation) {
                    case 'paid':
                        popup('Reservation Paid!','This reservation is set to paid.','success');
                        break;
                
                    default:
                        break;
                }

                $('.payment').click(function(){
                    let bookedId = $(this).data('booked_id')
                    let es = $(this).data('es')
                    let price = $(this).data('price')
                    let slot = $(this).data('slot')
                    let charged = $(this).data('charged')
                    let chargedStatus = $(this).data('charged_status')
                    let date = $(this).data('date')
                    let stime = $(this).data('stime')
                    let etime = $(this).data('etime')

                    if(chargedStatus == 'paid'){
                        $('.statusClass').removeClass('text-red-500').addClass('text-green-500')
                    }
                    $('#booked_id').val(parseInt(bookedId))
                    $('#es').val(es)
                    $('#parking_price').val(price)
                    $('#parking_slot_selected').val(slot)
                    $('#charges_total').val(charged)
                    $('#charges_status').text(chargedStatus)
                    $('#effective_date').val(date)
                    $('#effective_stime').val(stime)
                    $('#effective_etime').val(etime)

                    $('#paymentModalBtn').trigger('click')
                })

                //information
                $('.information').click(function(){
                    let user = $(this).data('user')
                    let email = $(this).data('email')
                    let type = $(this).data('type')
                    let color = $(this).data('color')
                    let plate = $(this).data('plate')
                    let date = $(this).data('date')
                    let stime = $(this).data('stime')
                    let etime = $(this).data('etime')
                    
                    $('#user_name').val(user)
                    $('#user_email').val(email)
                    $('#vehicle_type').val(type)
                    $('#vehicle_color').val(color)
                    $('#vehicle_number').val(plate)
                    $('#e_date').val(date)
                    $('#e_stime').val(stime)
                    $('#e_etime').val(etime)

                    $('#informationModalBtn').trigger('click')
                })

                //scanner
                $('.scanner').click(function(){
                    let booked_id = $(this).data('booked_id');
                    let plate_number = $(this).data('plate_number').replace(/\s/g, '');
                    // alert(booked_id)
                    let html5QrcodeScanner = new Html5QrcodeScanner("reader",{ fps: 10, qrbox: {width: 250, height: 250} },
                    /* verbose= */ false);
                    html5QrcodeScanner.render(
                        (decodedText, decodedResult)=>{
                            let data = JSON.parse(decodedText);
                            console.log(data)
                            let plateNumber = data.plate_number.replace(/\s/g, '');
                            if(plateNumber === plate_number){
                                alert('yes')
                                popup('Verification Success!',`Welcome to ${data.establishment}, ${data.name}. Your car safety is our priority, have a blessed day!`, 'success')
                            }else{
                                popup('Verification Failed!',`This QRCODE is not matched on our records. Your car safety is our priority, have a blessed day!`, 'error')
                            }
                        }, 
                        (error)=>{
                            console.warn(`Code scan error = ${error}`);
                        }
                    );

                    $('#scannerModalBtn').trigger('click');
                    
                })

                //filters
                // Handle click on status filter labels
                $('#statusFilters label').click(function() {
                    let status = $(this).data('status'); // Get the status from data-status attribute
                    // alert(status)
                    // Filter your table rows based on the status
                    if (status === 'all') {
                        // Show all rows if 'All' is selected
                        $('#reservation-table tbody tr').show();
                    }else{
                        // Hide all rows
                         $('#reservation-table tbody tr').hide();
                         // Show rows matching the selected status
                        $(`#reservation-table tbody tr[data-status="${status}"]`).show();
                    }
                })

                //triger the booked submition
                $('#bookedSubmitBtn').click(function(){
                    $('#loader-modal').removeClass('hidden')
                    $('#booked-form').submit()
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