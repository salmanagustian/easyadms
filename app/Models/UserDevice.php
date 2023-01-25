<?php

namespace App\Models;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="UserDevice",
 *      required={"device_id", "pin", "name", "pri", "passwd", "card", "grp", "tz", "verify", "vice_card"},
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
class UserDevice extends Model
{
    use HasFactory;
    //     use SoftDeletes;

    public $table = 'user_devices';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'device_id',
        'pin',
        'name',
        'pri',
        'passwd',
        'card',
        'grp',
        'tz',
        'verify',
        'vice_card',
        'start_datetime',
        'end_datetime'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'device_id' => 'integer',
        'pin' => 'string',
        'name' => 'string',
        'pri' => 'string',
        'passwd' => 'string',
        'card' => 'string',
        'grp' => 'string',
        'tz' => 'string',
        'verify' => 'boolean',
        'vice_card' => 'string',
        'start_datetime' => 'datetime',
        'end_datetime' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'device_id' => 'required',
        'pin' => 'required|string|max:30',
        'name' => 'required|string|max:255',
        'pri' => 'required|string|max:255',
        'passwd' => 'required|string|max:255',
        'card' => 'required|string|max:255',
        'grp' => 'required|string|max:10',
        'tz' => 'required|string|max:255',
        'verify' => 'required|boolean',
        'vice_card' => 'required|string|max:255',
        'start_datetime' => 'nullable',
        'end_datetime' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function device()
    {
        return $this->belongsTo(\App\Models\Device::class, 'device_id');
    }
}
