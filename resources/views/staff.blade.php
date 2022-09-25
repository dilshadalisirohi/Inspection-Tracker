@extends('.layouts.app')

@section('title', __('Staff'))

@section('content')
    <!-- main Section -->
    <div class="main-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="dash-heading mb-10">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>{{ __('Staff') }}</h2>
                            </div>
                        </div>
                    </div>
                    <div id="tw-loader" class="tw-loader">
                        <div class="tw-ellipsis">
                            <div></div><div></div><div></div><div></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-10">
                <div class="col-lg-12 mb-30">
                    <div class="tw-card">
                        <div class="tw-card-header mb-10 d-flex justify-content-between">
                            Staff List
                            <a class="btn btn-primary" href="{{ url('admin/add-staff') }}"><i class="fas fa-plus"></i> Add Staff</a>
                        </div>
                        <div class="tw-card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="staff-table">
                                    <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Options</th>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(session()->has('message'))
        <input type="hidden" id="message" value="{!! session('message') !!}">
    @endif
    <!-- /main Section -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            let message = $('#message').val();
            if(message === 'success') {
                Toast.fire({
                    icon: 'success',
                    title: 'Added successfully'
                })
            } else if(message === 'updated') {
                Toast.fire({
                    icon: 'success',
                    title: 'Updated successfully'
                })
            } else if(message == 'failed') {
                Toast.fire({
                    icon: 'error',
                    title: 'Failed. Try again'
                })
            }

            $('#staff-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{!! route('getStaffs') !!}',
                dom: '<"row mt-4 top"<"col-md-3"l><"col-md-6 text-center"B><"col-md-3"f>>rtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ],
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'role', name: 'role' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action', orderable: false },
                ],
                columnDefs: [
                    { "width": "10%", "targets": 0 },
                    { "width": "15%", "targets": 1 },
                    { "width": "25%", "targets": 2 },
                    { "width": "10%", "targets": 3 },
                    { "width": "10%", "targets": 4 },
                    { "width": "30%", "targets": 5 },
                ],
                order: [[0, 'asc']]
            });
            $(document).on('click', '.deleteStaff', function () {
                let id = $(this).data("id");
                axios.get('{{ url('delete-staff') }}/'+id)
                    .then(response => {
                        if(response.data == 'success') {
                            Toast.fire({
                                icon: 'success',
                                title: 'Deleted successfully'
                            })
                            $('#staff-table').DataTable().clear().destroy();
                            $('#staff-table').DataTable({
                                processing: true,
                                serverSide: true,
                                responsive: true,
                                ajax: '{!! route('getStaffs') !!}',
                                dom: '<"row mt-4 top"<"col-md-3"l><"col-md-6 text-center"B><"col-md-3"f>>rtip',
                                buttons: [
                                    'copyHtml5',
                                    'excelHtml5',
                                    'csvHtml5',
                                    'pdfHtml5'
                                ],
                                columns: [
                                    { data: 'id', name: 'id' },
                                    { data: 'name', name: 'name' },
                                    { data: 'email', name: 'email' },
                                    { data: 'role', name: 'role' },
                                    { data: 'status', name: 'status' },
                                    { data: 'action', name: 'action', orderable: false },
                                ],
                                columnDefs: [
                                    { "width": "10%", "targets": 0 },
                                    { "width": "15%", "targets": 1 },
                                    { "width": "25%", "targets": 2 },
                                    { "width": "10%", "targets": 3 },
                                    { "width": "10%", "targets": 4 },
                                    { "width": "30%", "targets": 5 },
                                ],
                                order: [[0, 'asc']]
                            });
                        }
                    })
            })
        })
    </script>
@endpush
