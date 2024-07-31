@extends('layouts.app')
@section('content')
    <div class="main-area">
        <div class="top-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="hello">
                            <h6>Upcoming MoveOuts!</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="tenants-sec2">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12">
                      <div class="table-responsive">
                          <table class="table table-hover data-table">
                              <thead>
                                  <tr>
                                      <th></th>
                                      <th>Tenant</th>
                                      <th>Contact Info</th>
                                      <th>Balance</th>
                                      {{-- <th>Tenant Portal Status</th> --}}
                                      <th>Action</th>
                                      {{-- <th></th> --}}
                                  </tr>
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
@endsection

@push('custom_js')
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('upcoming_move_outs') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'tenant',
                        name: 'tenant'
                    },
                    {
                        data: 'contact_Info',
                        name: 'contact_Info'
                    },
                    {
                        data: 'balance',
                        name: 'balance'
                    },
                    // {
                    //     data: 'tenant_portal_status',
                    //     name: 'tenant_portal_status'
                    // },
                    {
                        data: 'action',
                        name: 'action',
                    }
                ]
            });
        });
    </script>
@endpush
