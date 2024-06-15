<x-app-layout>
    <!-- ========== MAIN CONTENT ========== -->
    
    <!-- Content -->
    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
            <!-- container -->
            <div class="bg-white rounded-md w-full p-2">

                @include('pages.tables.table', ['establishments'=>$establishments])
                @include('pages.modal.create')
                @include('pages.modal.parkinglot')

            </div>
            <!-- End conatiner -->
        </div>
    </div>

    @section('scripts')
        <script>
            console.log('connected.')
            let success = @json(session('status.save'));
            let action = @json(session('action'));
            let updateModal = @json(session('updateModal'));
            let establishment_id = @json(session('establishment_id'));
            let data = @json($establishments);
            // console.log(establishment_id)
            $(document).ready(function(){
                if(success === 'success' && action === 'store' && updateModal === 'closed'){
                    popup('Establishment Created','Establishment is successfully created!, customized the parking space.',success);
                }else if(action === 'update' && updateModal === 'open'){
                    popup('Parking Space Updated','Parking space is successfully updated!, customized the parking space success.',success);
                    renderParkingSpace(data,parseInt(establishment_id))
                    $('#parkingLotModalBtn').trigger('click');
                }

                // create establishment
                $('#hs-create').click(function(){
                    $('#createModalBtn').trigger('click');
                })
                // create parkinglot test
                // $('#hs-create').click(function(){
                //     $('#parkingLotModalBtn').trigger('click');
                // })

                // edit parking space
                $('.parking_space').click(function(){
                    let id = $(this).data('id')
                    renderParkingSpace(data,id)
                    $('#parkingLotModalBtn').trigger('click');
                })
            })

            const renderParkingSpace = (data, id) => {
                let renderSpace = ''
                data.forEach(d => {
                    // console.log(d)
                    // console.log(id)
                    if(d.id === id){
                        // console.log('matched')
                        d.parkinglot.forEach(p => {
                            // console.log(p.status)
                            let classStatus = '';
                            switch (p.status) {
                                case 'available':
                                    classStatus = 'text-green-700';
                                    break;
                                case 'not-available':
                                    classStatus = 'text-red-500';
                                    break;
                                
                                case 'pwd':
                                    classStatus = 'text-orange-500';
                                    break;
                                
                                default:
                                    classStatus = 'text-orange-500';
                                    break;
                            }
                            renderSpace += `
                                <div class="shadow w-[32%] flex flex-col items-center p-2">
                                <i class="fa-solid fa-square-parking text-3xl text-violet-500"></i>
                                <div class="">
                                    <div class="relative mb-2">
                                        <input name="ids[]" value="${p.id}" type="text" class="peer hidden text-green-500 py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter name" readonly>
                                        <input name="slot[]" value="${p.slot}" type="text" class="peer text-green-500 py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter name" readonly>
                                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                            <i class="fa-regular fa-square-parking flex-shrink-0 text-green-500 dark:text-neutral-500"></i>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <select name="status[]" type="text" class="peer ${classStatus} py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter name">
                                            <option value="available" ${p.status === 'available' ? 'selected' : ''} class="text-green-500">Available</option>
                                            <option value="not-available" ${p.status === 'not-available' ? 'selected' : ''} class="text-red-500">Not-Available</option>
                                            <option value="pwd" ${p.status === 'pwd' ? 'selected' : ''} class="">PWD</option>
                                        </select>
                                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                            <i class="fa-regular fa-square-parking flex-shrink-0 ${classStatus} dark:text-neutral-500"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ` 
                        });

                        $('#establishment_id').val(id)
                        $('#total').text(d.parking_space_count)
                        $('#parking_space_available').html(renderSpace)
                    }


                });
            }
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