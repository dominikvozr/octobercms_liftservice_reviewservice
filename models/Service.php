<?php namespace Dondo\ReviewService\Models;

use Model;

/**
 * Model
 */
class Service extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'dondo_reviewservice_service';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'time' => 'date_format:H:i:s',
        'date' => 'date',
        'service' => 'required',
        'product_id' => 'required'
    ];

    public $fillable = ['time', 'date', 'service', 'product_id'];
}
