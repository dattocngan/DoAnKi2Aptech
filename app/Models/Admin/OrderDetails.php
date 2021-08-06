<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $table = 'order_details';

	protected $fillable = [
		'order_id',
		'product_id',
		'quantity',
		'price',
		'created_at',
		'updated_at',
		'is_deleted',	
	];

	
}



	
	
	
	
	
	
	