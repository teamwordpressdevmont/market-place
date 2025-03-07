<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class OrderProposal extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'customer_id', 'tradeperson_id', 'order_id', 'proposed_price', 'proposal_description', 'proposal_status', 'featured'
    ];
    
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    // Relationship with Tradeperson
    public function tradeperson()
    {
        return $this->belongsTo(Tradeperson::class, 'tradeperson_id', 'id');
    }

    // Relationship with Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
    
    public function proposalStatus()
    {
        return $this->belongsTo(ProposalStatus::class, 'proposal_status', 'id');
    }
    
}
