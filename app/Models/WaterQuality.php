<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaterQuality extends Model
{
    // Khai báo bảng liên kết
    protected $table = 'water_quality';

    // Khai báo các trường được phép gán dữ liệu (Mass Assignment)
    protected $fillable = [
        'district_name',
        'pH',
        'turbidity',
        'dissolved_oxygen',
        'temperature',
        'status',
        'lat',
        'lon',
    ];

    // Tắt timestamps nếu không cần thiết
    public $timestamps = true;

    // Định nghĩa một số hàm tiện ích
    public function isSafe()
    {
        return $this->status === 'Tốt';
    }

    public function isWarning()
    {
        return in_array($this->status, ['Kém', 'Xấu']);
    }

    public function getFormattedTemperature()
    {
        return $this->temperature . "°C";
    }

    public function getCoordinates()
    {
        return "{$this->lat}, {$this->lon}";
    }
}
