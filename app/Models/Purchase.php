<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'light_id',
        'customer_id',
        'quantity'
    ];

    /**
     * Get the customer associated with the purchase.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the light associated with the purchase.
     */
    public function light()
    {
        return $this->belongsTo(SmartLight::class, 'light_id');
    }
}
