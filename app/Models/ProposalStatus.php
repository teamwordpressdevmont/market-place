<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ProposalStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'status'
    ];
    
    
    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'proposal_status', 'id');
    }
    
}
