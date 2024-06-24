@extends('layouts.app')
@section('content')
<div class="main-area">
    <div class="top-main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="hello">
                        <p>Hello Parth S Bhatt,</p>
                        <h6>Welcome Back!</h6>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="top-opt">
                        <select name="" id="">
                            <option value="">Property</option>
                        </select>
                        <select name="" id="">
                            <option value="">Portfolio</option>
                        </select>
                        <select name="" id="">
                            <option value="">View As</option>
                        </select>
                        <div class="setting-top">
                            <ul class="togg-btn">
                                <li><i class="fas fa-cog"></i></li>
                                <ul class="togg-drop">
                                    <li><a href="#">Profile</a></li>
                                    <li><a href="#">Settings</a></li>
                                    <li><a href="#">Log Out</a></li>
                                </ul>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="send-app">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="txt">
                        <p>Vitae pulvinar faucibus amet lectus. Nunc eget dui ut ullamcorper a lacus pretium
                            porttitor. In adipiscing ultrices risus cursus.</p>
                        <div class="btns">
                            <a href="#" class="white-btn">Send Application</a>
                            <a href="#" class="link-btn">Get Shareable Link</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 p-0">
                    <div class="img-box">
                        <img src="assets/images/send.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="stats-sec1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="stats-box">
                        <div class="hd">
                            <h6>Occupancy Rate</h6>
                            <ul class="togg-btn">
                                <li><i class="fal fa-ellipsis-h"></i></li>
                                <ul class="togg-drop">
                                    <li><a href="#">Edit</a></li>
                                    <li><a href="#">Delete</a></li>
                                </ul>
                            </ul>
                        </div>
                        <div class="chart-container">
                            <div id="donutchart"></div>
                            <div class="legend">
                                <div class="legend-item">
                                    <div class="legend-color" style="background-color: #FF3A29;"></div>
                                    <div class="legend-text">Vacant <span>86% - 18 Units</span></div>
                                </div>
                                <div class="legend-item">
                                    <div class="legend-color" style="background-color: #FFE5D3;"></div>
                                    <div class="legend-text">Occupied <span>14% - 3 Units</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="stats-box">
                        <div class="hd">
                            <h6>Recent Tenant Requests</h6>
                            <ul class="togg-btn">
                                <li><i class="fal fa-ellipsis-h"></i></li>
                                <ul class="togg-drop">
                                    <li><a href="#">Edit</a></li>
                                    <li><a href="#">Delete</a></li>
                                </ul>
                            </ul>
                        </div>
                        <div class="txt">
                            <h4>Nothing Here Yet</h4>
                            <p>Please add data, refresh the page, or reset your filters</p>
                            <a href="#" class="grey-btn"><i class="fas fa-sync-alt"></i> Refresh</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-box">
                        <div class="hd">
                            <h6>Leasing Activity Next 7 Days</h6>
                            <ul class="togg-btn">
                                <li><i class="fal fa-ellipsis-h"></i></li>
                                <ul class="togg-drop">
                                    <li><a href="#">Edit</a></li>
                                    <li><a href="#">Delete</a></li>
                                </ul>
                            </ul>
                        </div>
                        <div class="txt">
                            <h4>Nothing Here Yet</h4>
                            <p>Please add data, refresh the page, or reset your filters</p>
                            <a href="#" class="grey-btn"><i class="fas fa-sync-alt"></i> Refresh</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="stats-sec2 no-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="stats-box">
                        <div class="hd">
                            <h6>Leases With Outstanding Balances</h6>
                            <ul class="togg-btn">
                                <li><i class="fal fa-ellipsis-h"></i></li>
                                <ul class="togg-drop">
                                    <li><a href="#">Edit</a></li>
                                    <li><a href="#">Delete</a></li>
                                </ul>
                            </ul>
                        </div>
                        <div class="scroll-elem">
                            <div class="balance-box">
                                <div class="left">
                                    <i class="fas fa-info-circle"></i>
                                    <div class="txt-left">
                                        <h6>Martin Saris</h6>
                                        <p>Violet Home - Apartment 01</p>
                                    </div>
                                </div>
                                <div class="right">
                                    <p>FCFA 6,500,000</p>
                                </div>
                            </div>
                            <div class="balance-box">
                                <div class="left">
                                    <i class="fas fa-info-circle"></i>
                                    <div class="txt-left">
                                        <h6>Martin Saris</h6>
                                        <p>Violet Home - Apartment 01</p>
                                    </div>
                                </div>
                                <div class="right">
                                    <p>FCFA 6,500,000</p>
                                </div>
                            </div>
                            <div class="balance-box">
                                <div class="left">
                                    <i class="fas fa-info-circle"></i>
                                    <div class="txt-left">
                                        <h6>Martin Saris</h6>
                                        <p>Violet Home - Apartment 01</p>
                                    </div>
                                </div>
                                <div class="right">
                                    <p>FCFA 6,500,000</p>
                                </div>
                            </div>
                            <div class="balance-box">
                                <div class="left">
                                    <i class="fas fa-info-circle"></i>
                                    <div class="txt-left">
                                        <h6>Martin Saris</h6>
                                        <p>Violet Home - Apartment 01</p>
                                    </div>
                                </div>
                                <div class="right">
                                    <p>FCFA 6,500,000</p>
                                </div>
                            </div>
                            <div class="balance-box">
                                <div class="left">
                                    <i class="fas fa-info-circle"></i>
                                    <div class="txt-left">
                                        <h6>Martin Saris</h6>
                                        <p>Violet Home - Apartment 01</p>
                                    </div>
                                </div>
                                <div class="right">
                                    <p>FCFA 6,500,000</p>
                                </div>
                            </div>
                            <div class="balance-box">
                                <div class="left">
                                    <i class="fas fa-info-circle"></i>
                                    <div class="txt-left">
                                        <h6>Martin Saris</h6>
                                        <p>Violet Home - Apartment 01</p>
                                    </div>
                                </div>
                                <div class="right">
                                    <p>FCFA 6,500,000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="stats-box">
                        <div class="hd">
                            <h6>Things To Do</h6>
                            <ul class="togg-btn">
                                <li><i class="fal fa-ellipsis-h"></i></li>
                                <ul class="togg-drop">
                                    <li><a href="#">Edit</a></li>
                                    <li><a href="#">Delete</a></li>
                                </ul>
                            </ul>
                        </div>
                        <div class="scroll-elem">
                            <div class="balance-box past-box">
                                <div class="left">
                                    <i class="fas fa-info"></i>
                                    <div class="txt-left">
                                        <h6>Past Due Leases</h6>
                                    </div>
                                </div>
                                <div class="right">
                                    <p>3</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="stats-sec3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="stats-box">
                        <div class="hd">
                            <h6>Occupancy Rate</h6>
                            <ul class="togg-btn">
                                <li><i class="fal fa-ellipsis-h"></i></li>
                                <ul class="togg-drop">
                                    <li><a href="#">Edit</a></li>
                                    <li><a href="#">Delete</a></li>
                                </ul>
                            </ul>
                        </div>
                        <div class="bar-chart">
                            <div class="chart-container">
                                <div id="columnchart_material"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-box">
                        <div class="hd">
                            <h6>Recent Payment Recieved</h6>
                            <ul class="togg-btn">
                                <li><i class="fal fa-ellipsis-h"></i></li>
                                <ul class="togg-drop">
                                    <li><a href="#">Edit</a></li>
                                    <li><a href="#">Delete</a></li>
                                </ul>
                            </ul>
                        </div>
                        <div class="txt">
                            <h4>Nothing Here Yet</h4>
                            <p>Please add data, refresh the page, or reset your filters</p>
                            <a href="#" class="grey-btn"><i class="fas fa-sync-alt"></i> Refresh</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-box">
                        <div class="hd">
                            <h6>Task-My Next 7 Days</h6>
                            <ul class="togg-btn">
                                <li><i class="fal fa-ellipsis-h"></i></li>
                                <ul class="togg-drop">
                                    <li><a href="#">Edit</a></li>
                                    <li><a href="#">Delete</a></li>
                                </ul>
                            </ul>
                        </div>
                        <div class="txt">
                            <h4>Nothing Here Yet</h4>
                            <p>Please add data, refresh the page, or reset your filters</p>
                            <a href="#" class="grey-btn"><i class="fas fa-sync-alt"></i> Refresh</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="stats-sec3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="stats-box">
                        <div class="hd">
                            <h6>Task-Open by Status</h6>
                            <ul class="togg-btn">
                                <li><i class="fal fa-ellipsis-h"></i></li>
                                <ul class="togg-drop">
                                    <li><a href="#">Edit</a></li>
                                    <li><a href="#">Delete</a></li>
                                </ul>
                            </ul>
                        </div>
                        <div class="txt">
                            <h4>Nothing Here Yet</h4>
                            <p>Please add data, refresh the page, or reset your filters</p>
                            <a href="#" class="grey-btn"><i class="fas fa-sync-alt"></i> Refresh</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="map-img-main">
                        <img src="assets/images/map1.png" alt="">
                        <div class="txt">
                            <a href="map-properties.php" class="white-btn">View Full Map</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include("includes.footer")
</div>
@endsection