@extends('layouts.app')

@section('content')
    @push('breadcrumb')
    <ol class="breadcrumb  my-0 ms-2">
        <li class="breadcrumb-item">@lang('models/devices.plural')</li>
    </ol>
    @endpush
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <h5>Operasi Device {{ $device->name }} ( {{ $device->serial_number }} )</h5>
                         </div>
                         <div class="card-body">                             
                             <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Clear Attendance Logs</span><button class="btn btn-danger" value="CLEAR LOG"onclick="sendCommand(this)">GO</button>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Clear All Data</span><button class="btn btn-danger" value="CLEAR DATA"onclick="sendCommand(this)">GO</button>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Reupload Attendance Logs</span><button class="btn btn-danger" value="LOG"onclick="sendCommand(this)">GO</button>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Reinitialisasi (check)</span><button class="btn btn-danger" value="CHECK"onclick="sendCommand(this)">GO</button>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Device Information</span><button class="btn btn-danger" value="INFO"onclick="sendCommand(this)">GO</button>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Device Restart</span><button class="btn btn-danger" value="REBOOT"onclick="sendCommand(this)">GO</button>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Unlock Door</span><button class="btn btn-danger" value="AC_UNLOCK"onclick="sendCommand(this)">GO</button>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Disable Alarm</span><button class="btn btn-danger" value="AC_UNALARM"onclick="sendCommand(this)">GO</button>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Request Attendance</span>                                    
                                    <input type="text" class="datetime" data-optiondate='{{ json_encode(config('local.datetime')) }}' name="startTime" placeholder="YYYY-MM-DD HH:MM:SS">
                                    <span>sd</span>
                                    <input type="text" class="datetime" data-optiondate='{{ json_encode(config('local.datetime')) }}' name="endTime" placeholder="YYYY-MM-DD HH:MM:SS">
                                    <button class="btn btn-danger" value="QUERY" onclick="sendQueryCommand(this)">GO</button>
                                </li>
                             </ul>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

@push('scripts')    
    <script>
        $(function(){
            main.initDatetime($('.body'))
        })
        function sendCommand(elm){
            const _url = "{{ route('deviceOperationCommand', $device->id) }}"
            const _json = { command: $(elm).val() }
            $.redirect(
                _url, _json,
                'POST',
                '_parent'
            )
        }

        function sendQueryCommand(elm){
            const _url = "{{ route('deviceOperationCommand', $device->id) }}"
            let _startTime, _endTime 
            if($('input[name=startTime]').data('daterangepicker') !== undefined) {
                _startTime = main.getValueDateSQL($('input[name=startTime]'))
            }
            if($('input[name=endTime]').data('daterangepicker') !== undefined) {
                _endTime = main.getValueDateSQL($('input[name=endTime]'))
            }
            
            if(_.isEmpty(_startTime) || _.isEmpty(_endTime)) {
                main.alertDialog('Warning', 'Tanggal awal dan akhir harus diisi')
                return
            }
            
            const _json = { command: $(elm).val(), startTime: _startTime, endTime: _endTime }
            $.redirect(
                _url, _json,
                'POST',
                '_parent'
            )
        }
    </script>
@endpush