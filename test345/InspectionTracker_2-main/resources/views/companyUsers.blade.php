@extends('.layouts.app')

@section('title', __('Contractor Staffs'))

@section('content')
    <!-- main Section -->
    <div class="main-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="dash-heading mb-10">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>{{ __('Contractor Staffs') }}</h2>
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
                            Contractor Staff List
                            <div>
                                <a class="btn btn-info" href="{{ url('admin/add-company-user') }}"><i class="fas fa-user"></i> Add User</a>
                            </div>
                        </div>
                        <div class="tw-card-body">
                            <input type="hidden" id="company_id" value="{{ $id }}">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="company-staff-table">
                                    <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
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

            $('#company-staff-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{!! route('getCompanyStaffs') !!}?id='+$('#company_id').val(),
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
                    { data: 'phone', name: 'phone' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action', orderable: false },
                ],
                columnDefs: [
                    { "width": "15%", "targets": 0 },
                    { "width": "15%", "targets": 1 },
                    { "width": "20%", "targets": 2 },
                    { "width": "15%", "targets": 3 },
                    { "width": "10%", "targets": 4 },
                    { "width": "25%", "targets": 5 },
                ],
                order: [[0, 'asc']]
            });
            $(document).on('click', '.deleteCompanyUser', function () {
                let id = $(this).data("id");
                axios.get('{{ url('delete-company-user') }}/'+id)
                    .then(response => {
                        if(response.data == 'success') {
                            Toast.fire({
                                icon: 'success',
                                title: 'Deleted successfully'
                            })
                            $('#company-staff-table').DataTable().clear().destroy();
                            $('#company-staff-table').DataTable({
                                processing: true,
                                serverSide: true,
                                responsive: true,
                                ajax: '{!! route('getCompanyStaffs') !!}?id='+$('#company_id').val(),
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
                                    { data: 'phone', name: 'phone' },
                                    { data: 'status', name: 'status' },
                                    { data: 'action', name: 'action', orderable: false },
                                ],
                                columnDefs: [
                                    { "width": "15%", "targets": 0 },
                                    { "width": "15%", "targets": 1 },
                                    { "width": "20%", "targets": 2 },
                                    { "width": "15%", "targets": 3 },
                                    { "width": "10%", "targets": 4 },
                                    { "width": "25%", "targets": 5 },
                                ],
                                order: [[0, 'asc']]
                            });
                        }
                    })
            })

        })
    </script>
@endpush
