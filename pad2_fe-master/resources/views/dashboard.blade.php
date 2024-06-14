<x-app-layout>
    @extends('layouts.layout')

    <body style="background-color: #F6F6F7;">

        <!--* Sidebar -->
        <div class="row mt-3 sidebar">
            <div class="col-md-1 bg-white pt-5" style="width: 4%;">
                <div class="d-flex flex-column align-items-center">
                    <a href="{{ route('dashboard') }}">
                        <div class="d-flex align-items-center justify-content-center aktif">
                            <img src=" {{ asset('assets/img/monitor.png') }}" alt="logo"
                                style="width: 35px; height: 35px;">
                        </div>
                    </a>
                    <a href="{{ route('history') }}">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/img/history.png') }}" alt="logo"
                                style="width: 60px; height: 60px;">
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-11" style="width: 96%;">
                <div class="row">
                    <div class="col-md-2">
                        <div class="wrap">
                            <div class="row">
                                <div class="col-md-5 nama">Bit Depth</div>
                                <div class="col-md-4 nilai bit_depth">null</div>
                                <div class="col-md-3 satuan">m</div>
                            </div>

                            <div class="row" style="margin-top: 13px;">
                                <div class="col-md-5 nama">AirRate</div>
                                <div class="col-md-4 nilai air_rate">null</div>
                                <div class="col-md-3 satuan">scfm</div>
                            </div>

                            <div class="row" style="margin-top: 13px;">
                                <div class="col-md-5 nama">MudCondIn</div>
                                <div class="col-md-4 nilai mud_cond_in">null</div>
                                <div class="col-md-3 satuan">m</div>
                            </div>

                            <div class="row" style="margin-top: 13px;">
                                <div class="col-md-5 nama">BlockPos</div>
                                <div class="col-md-4 nilai block_pos">null</div>
                                <div class="col-md-3 satuan">m</div>
                            </div>

                            <div class="row" style="margin-top: 13px;">
                                <div class="col-md-5 nama">WOB</div>
                                <div class="col-md-4 nilai wob">null</div>
                                <div class="col-md-3 satuan">klb</div>
                            </div>

                            <div class="row" style="margin-top: 13px;">
                                <div class="col-md-5 nama">ROP</div>
                                <div class="col-md-4 nilai rop">null</div>
                                <div class="col-md-3 satuan">m/hr</div>
                            </div>

                            <div class="row" style="margin-top: 13px;">
                                <div class="col-md-5 nama">Bv Depth</div>
                                <div class="col-md-4 nilai bv_depth">null</div>
                                <div class="col-md-3 satuan">m</div>
                            </div>

                            <div class="row" style="margin-top: 13px;">
                                <div class="col-md-5 nama">MudCondOut</div>
                                <div class="col-md-4 nilai mud_cond_out">null</div>
                                <div class="col-md-3 satuan">mmho</div>
                            </div>

                            <div class="row" style="margin-top: 13px;">
                                <div class="col-md-5 nama">Torque</div>
                                <div class="col-md-4 nilai torque">null</div>
                                <div class="col-md-3 satuan">klbft</div>
                            </div>

                            <div class="row" style="margin-top: 13px;">
                                <div class="col-md-5 nama">RPM</div>
                                <div class="col-md-4 nilai rpm">null</div>
                                <div class="col-md-3 satuan">rpm</div>
                            </div>

                            <div class="row" style="margin-top: 13px;">
                                <div class="col-md-5 nama">Hookload</div>
                                <div class="col-md-4 nilai hookload">null</div>
                                <div class="col-md-3 satuan">klb</div>
                            </div>

                            <div class="row" style="margin-top: 13px;">
                                <div class="col-md-5 nama">Log Depth</div>
                                <div class="col-md-4 nilai log_depth">null</div>
                                <div class="col-md-3 satuan">m</div>
                            </div>

                            <div class="row" style="margin-top: 13px;">
                                <div class="col-md-5 nama">H2S-1</div>
                                <div class="col-md-4 nilai h2s_1">null</div>
                                <div class="col-md-3 satuan">ppm</div>
                            </div>

                            <div class="row" style="margin-top: 13px;">
                                <div class="col-md-5 nama">MudFlowOut</div>
                                <div class="col-md-4 nilai mud_flow_out">null</div>
                                <div class="col-md-3 satuan">gpm</div>
                            </div>

                            <div class="row" style="margin-top: 13px;">
                                <div class="col-md-5 nama">Total SPM</div>
                                <div class="col-md-4 nilai total_spm">null</div>
                                <div class="col-md-3 satuan">spm</div>
                            </div>

                            <div class="row" style="margin-top: 13px;">
                                <div class="col-md-5 nama">Standpipe Press</div>
                                <div class="col-md-4 nilai standpipe_press">null</div>
                                <div class="col-md-3 satuan">psi</div>
                            </div>

                            <div class="row" style="margin-top: 13px;">
                                <div class="col-md-5 nama">MudFlowIn</div>
                                <div class="col-md-4 nilai mud_flow_in">null</div>
                                <div class="col-md-3 satuan">spm</div>
                            </div>

                            <div class="row" style="margin-top: 13px;">
                                <div class="col-md-5 nama">CO2-1</div>
                                <div class="col-md-4 nilai co2_1">null</div>
                                <div class="col-md-3 satuan">spm</div>
                            </div>

                            <div class="row" style="margin-top: 13px;">
                                <div class="col-md-5 nama">Gas</div>
                                <div class="col-md-4 nilai gas">null</div>
                                <div class="col-md-3 satuan">spm</div>
                            </div>

                            <div class="row" style="margin-top: 13px;">
                                <div class="col-md-5 nama">MudTempIn</div>
                                <div class="col-md-4 nilai mud_temp_in">null</div>
                                <div class="col-md-3 satuan">&deg;C</div>
                            </div>

                            <div class="row" style="margin-top: 13px;">
                                <div class="col-md-5 nama">MudTempOut</div>
                                <div class="col-md-4 nilai mud_temp_out">null</div>
                                <div class="col-md-3 satuan">&deg;C</div>
                            </div>

                            <div class="row" style="margin-top: 13px;">
                                <div class="col-md-5 nama">Tank Vol.</div>
                                <div class="col-md-4 nilai tank_vol">null</div>
                                <div class="col-md-3 satuan">sbbl</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-10">
                        <div class="d-flex gap-3 px-3 ">
                            <!-- Legenda chart 1 -->
                            <div class="w-100 shadow-box px-3 py-2">
                                <div class="mb-2">
                                    <div class="d-flex align-items-center gap-3 mt-2">
                                        <span class="bodytext">Air Rate (scfm)</span>
                                        <div class="tag air_rate">null</div>
                                    </div>
                                    <div style="height: 2px; background-color: #1d1dff;"></div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="bodytext gray">0</span>
                                        <span class="bodytext gray">2000</span>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="bodytext">Mud Conduct. In</span>
                                        <div class="tag mud_cond_in">null</div>
                                    </div>
                                    <div style="height: 2px; background-color:#00ff00;"></div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="bodytext gray">0</span>
                                        <span class="bodytext gray">m m h o</span>
                                        <span class="bodytext gray">10000</span>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="bodytext">Block Position</span>
                                        <div class="tag block_pos">null</div>
                                    </div>
                                    <div style="height: 2px; background-color: #ff00ff;"></div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="bodytext gray">0</span>
                                        <span class="bodytext gray">m</span>
                                        <span class="bodytext gray">150</span>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="bodytext">WOB</span>
                                        <div class="tag wob">null</div>
                                    </div>
                                    <div style="height: 2px; background-color: #800000;"></div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="bodytext gray">0</span>
                                        <span class="bodytext gray">klb</span>
                                        <span class="bodytext gray">50</span>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="bodytext">ROP</span>
                                        <div class="tag rop">null</div>
                                    </div>
                                    <div style="height: 2px; background-color: #00ffff;"></div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="bodytext gray">0</span>
                                        <span class="bodytext gray">m/hr</span>
                                        <span class="bodytext gray">2000</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Legenda chart 2 -->
                            <div class="w-100 shadow-box px-3 py-2">
                                <div class="mb-2">
                                    <div class="d-flex align-items-center gap-3 mt-5">
                                        <span class="bodytext">Mud Conduct. Out</span>
                                        <div class="tag mud_cond_out">null</div>
                                    </div>
                                    <div style="height: 2px; background-color: #0000ff;"></div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="bodytext gray">0</span>
                                        <span class="bodytext gray">m m h o</span>
                                        <span class="bodytext gray">10000</span>
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="bodytext">Torque</span>
                                        <div class="tag torque">null</div>
                                    </div>
                                    <div style="height: 2px; background-color: #00ff00;"></div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="bodytext gray">0</span>
                                        <span class="bodytext gray">klb.ft</span>
                                        <span class="bodytext gray">2000</span>
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="bodytext">RPM Total</span>
                                        <div class="tag rpm">null</div>
                                    </div>
                                    <div style="height: 2px; background-color: #ff00ff"></div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="bodytext gray">0</span>
                                        <span class="bodytext gray">150</span>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="bodytext">Hookload</span>
                                        <div class="tag hookload">null</div>
                                    </div>
                                    <div style="height: 2px; background-color: #00ffff"></div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="bodytext gray">0</span>
                                        <span class="bodytext gray">klb</span>
                                        <span class="bodytext gray">50</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Legenda chart 3 -->
                            <div class="w-100 shadow-box px-3 py-2">
                                <div class="mb-2">
                                    <div class="d-flex align-items-center gap-3 mt-4">
                                        <span class="bodytext">H2S-1</span>
                                        <div class="tag h2s_1">null</div>
                                    </div>
                                    <div style="height: 2px; background-color: #0000ff;"></div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="bodytext gray">0</span>
                                        <span class="bodytext gray">2000</span>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="bodytext">Mud Flow Out (%)</span>
                                        <div class="tag mud_flow_out">null</div>
                                    </div>
                                    <div style="height: 2px; background-color: #00ff00;"></div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="bodytext gray">0</span>
                                        <span class="bodytext gray">10000</span>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="bodytext">Total SPM</span>
                                        <div class="tag total_spm">null</div>
                                    </div>
                                    <div style="height: 2px; background-color: #ff00ff;"></div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="bodytext gray">0</span>
                                        <span class="bodytext gray">150</span>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="bodytext">Standpipe Press.</span>
                                        <div class="tag standpipe_press">null</div>
                                    </div>
                                    <div style="height: 2px; background-color: #00ffff"></div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="bodytext gray">0</span>
                                        <span class="bodytext gray">50</span>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="bodytext">Mud Flow In</span>
                                        <div class="tag mud_flow_in">null</div>
                                    </div>
                                    <div style="height: 2px; background-color: #800000"></div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="bodytext gray">0</span>
                                        <span class="bodytext gray">2000</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Legenda chart 4 -->
                            <div class="w-100 shadow-box px-3 py-2">
                                <div class="mb-2">
                                    <div class="d-flex align-items-center gap-3 mt-4">
                                        <span class="bodytext">CO2-1</span>
                                        <div class="tag co2_1">null</div>
                                    </div>
                                    <div style="height: 2px; background-color: #ff0000;"></div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="bodytext gray">0</span>
                                        <span class="bodytext gray">2000</span>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="bodytext">Gas</span>
                                        <div class="tag gas">null</div>
                                    </div>
                                    <div style="height: 2px; background-color: #00ff00"></div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="bodytext gray">0</span>
                                        <span class="bodytext gray">10000</span>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="bodytext">Mud Temperature In</span>
                                        <div class="tag mud_temp_in">null</div>
                                    </div>
                                    <div style="height: 2px; background-color: #ff00ff"></div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="bodytext gray">0</span>
                                        <span class="bodytext gray">150</span>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="bodytext">Mud Temperature Out</span>
                                        <div class="tag mud_temp_out">null</div>
                                    </div>
                                    <div style="height: 2px; background-color: #00ffff"></div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="bodytext gray">0</span>
                                        <span class="bodytext gray">50</span>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="bodytext">Tank Vol. (total)</span>
                                        <div class="tag tank_vol">null</div>
                                    </div>
                                    <div style="height: 2px; background-color: #800000"></div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="bodytext gray">0</span>
                                    <span class="bodytext gray">2000</span>
                                </div>
                            </div>
                        </div>

                        <!-- Chart section -->
                        <div class="d-flex gap-3 p-3">
                            <div class="shadow-box p-2 w-100" id="chartContainerDashboard">
                                <canvas class="chart" id="myChart1"></canvas>
                            </div>
                            <div class="shadow-box p-2 w-100">
                                <canvas class="chart" id="myChart2"></canvas>
                            </div>
                            <div class="shadow-box p-2 w-100">
                                <canvas class="chart" id="myChart3"></canvas>
                            </div>
                            <div class="shadow-box p-2 w-100">
                                <canvas class="chart" id="myChart4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</x-app-layout>
