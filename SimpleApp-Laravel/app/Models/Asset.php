<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'asset_id';
    protected $table = 'assets';

    protected $fillable = [
        'vendor_id',
        'branch_id',
        'asset_no',
        'service',
        'asset_class',
        'type_code',
        'type_name',
        'task_code',
        'taskcode_3',
        'frequency',
        'desc',
        'item_code',
        'item_name',
        'category',
        'model',
        'serial_no',
        'manufacturer',
        'dept',
        'depart_name',
        'area_code',
        'area_name',
        'location_code',
        'location_name',
        'remark',
        'purc_cost',
        'work_group',
        'group',
        'package',
        'package_desc',
        'updateasset',
        'pic',
        'createdate',
        'createby',
    ];

    public $timestamps = false;
}
