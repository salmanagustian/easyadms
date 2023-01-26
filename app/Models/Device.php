<?php

namespace App\Models;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Device",
 *      required={"serial_number"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="serial_number",
 *          description="serial_number",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="additional_info",
 *          description="additional_info",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="attlog_stamp",
 *          description="attlog_stamp",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="operlog_stamp",
 *          description="operlog_stamp",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="attphotolog_stamp",
 *          description="attphotolog_stamp",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="error_delay",
 *          description="error_delay",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="delay",
 *          description="delay",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="trans_times",
 *          description="trans_times",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="trans_interval",
 *          description="trans_interval",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="trans_flag",
 *          description="trans_flag",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="timezone",
 *          description="timezone",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="realtime",
 *          description="realtime",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="encrypt",
 *          description="encrypt",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="server_version",
 *          description="server_version",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="table_name_stamp",
 *          description="table_name_stamp",
 *          type="string"
 *      )
 * )
 */
class Device extends Model
{
    use HasFactory;
    //     use SoftDeletes;

    public $table = 'devices';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $fillable = [
        'serial_number',
        'additional_info',
        'attlog_stamp',
        'operlog_stamp',
        'attphotolog_stamp',
        'error_delay',
        'delay',
        'trans_times',
        'trans_interval',
        'trans_flag',
        'timezone',
        'realtime',
        'encrypt',
        'server_version',
        'table_name_stamp'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'serial_number' => 'string',
        'additional_info' => 'string',
        'attlog_stamp' => 'integer',
        'operlog_stamp' => 'integer',
        'attphotolog_stamp' => 'integer',
        'error_delay' => 'integer',
        'delay' => 'integer',
        'trans_times' => 'string',
        'trans_interval' => 'integer',
        'trans_flag' => 'string',
        'timezone' => 'integer',
        'realtime' => 'boolean',
        'encrypt' => 'boolean',
        'server_version' => 'string',
        'table_name_stamp' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'serial_number' => 'required|string|max:40',
        'additional_info' => 'nullable|string|max:255',
        'attlog_stamp' => 'nullable|integer',
        'operlog_stamp' => 'nullable|integer',
        'attphotolog_stamp' => 'nullable|integer',
        'error_delay' => 'nullable|integer',
        'delay' => 'nullable|integer',
        'trans_times' => 'nullable|string|max:255',
        'trans_interval' => 'nullable|integer',
        'trans_flag' => 'nullable|string|max:255',
        'timezone' => 'nullable|integer',
        'realtime' => 'nullable|boolean',
        'encrypt' => 'nullable|boolean',
        'server_version' => 'nullable|string|max:255',
        'table_name_stamp' => 'nullable|string|max:255'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function attendanceLogs()
    {
        return $this->hasMany(\App\Models\AttendanceLog::class, 'device_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function commands()
    {
        return $this->hasMany(\App\Models\Command::class, 'device_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function templateFingerprintDevices()
    {
        return $this->hasMany(\App\Models\TemplateFingerprintDevice::class, 'device_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function userDevices()
    {
        return $this->hasMany(\App\Models\UserDevice::class, 'device_id');
    }
}
