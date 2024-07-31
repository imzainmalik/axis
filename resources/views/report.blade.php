@extends('layouts.app')
@section('content')
    <style>
        .bold {
            font-weight: 700;

        }

        .small {
            font-size: 12px;
        }
    </style>
    <div class="main-area">
        <div class="top-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="hello">
                            <h6>Reports!</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="bold"><b>Total Assets</b></h6>
                        <hr>
                        FCFA {{ $totalAssets }}.00
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="bold">Total Liabilities</h6>
                        <hr>
                        FCFA {{ $totalLiabilities }}
                    </div>
                </div>
            </div>
            <br>
            <div class="col-6 py-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="bold">Owner equity</h6>
                        <hr>
                        FCFA {{ $ownersEquity }}.00
                    </div>
                </div>
            </div>

            <div class="col-6 py-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="bold">Total Assets By Last Month</h6>
                        <hr>
                        FCFA {{ $totalAssetsByMonth }}.00
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="bold">Total Liabilities By Last Month</h6>
                        <hr>
                        FCFA {{ $totalLiabilitiesByMonth }}
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="bold">Owner equity By Last Month</h6>
                        <hr>
                        FCFA {{ $ownersEquityByMonth }}.00
                    </div>
                </div>
            </div>

            <div class="col-6 py-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="bold">Current Tenants</h6>
                        <hr>
                        Total {{ $currentTenants->count() }} Current Tenants. <br> <br>
                        <small class="small"><a href="{{ route('current_tenant') }}">View list of all current tenants</a></small>
                    </div>
                </div>
            </div>

            <div class="col-6 py-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="bold">Rent roll</h6>
                        <hr>
                        Total {{ $rentRoll->count() }} Rent roll<br> <br>
                        <small class="small"><a href="{{ route('rent_roll') }}">View list of Rent roll</a></small>

                    </div>
                </div>
            </div>

            <div class="col-6 py-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="bold">Upcoming MoveIn</h6>
                        <hr>
                        Total {{ $upcomingMoveIns->count() }} MoveIns as per Leasing in your system<br> <br>
                        <small class="small"><a href="{{ route('upcoming_move_ins') }}">View list of all MoveIns </a></small>

                    </div>
                </div>
            </div>


            <div class="col-6 py-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="bold">Upcoming MoveOut</h6>
                        <hr>
                        Total {{ $upcomingMoveOuts->count() }} MoveOuts as per Leasing in your system<br> <br>
                        <small class="small"><a href="{{ route('upcoming_move_outs') }}">View list of all MoveOuts</a></small>

                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="bold">Income</h6>
                        <hr>
                        FCFA {{ $income }}.00
                    </div>
                </div>
            </div>
        </div>

        <div class="hello py-4">
            <h6>Business Overview</h6>
        </div>

        <div class="row">
          
          <div class="col-6">
               <div class="card">
                    <div class="card-body">
                         <h6 class="bold">Total Properties</h6>
                         <hr>
                         {{ $totalProperties }} Properties
                    </div>
               </div>
          </div>
          <div class="col-6">
               <div class="card">
                    <div class="card-body">
                         <h6 class="bold">Total Units</h6>
                         <hr>
                         {{ $totalUnits }} Properties
                    </div>
               </div>
          </div>
          <div class="col-6 py-4">
               <div class="card">
                    <div class="card-body">
                         <h6 class="bold">Total Tenants</h6>
                         <hr>
                         {{ $totalTenants }} Tenants
                    </div>
               </div>
          </div>

          <div class="col-6 py-4">
               <div class="card">
                    <div class="card-body">
                         <h6 class="bold">Total Rent Collected</h6>
                         <hr>
                         FCFA {{ $totalRentCollected }}.00 Rent Collected
                    </div>
               </div>
          </div>


        </div>
    </div>
@endsection
