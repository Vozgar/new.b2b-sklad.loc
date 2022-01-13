<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function getSettingsAttribute()
    {
        $settings = UserSettings::orderBy('id','desc')->where(['customer_id'=>$this->customer_code])->first();
        return $settings;
    }

    public function getCurrentContractAttribute()
    {
        $user = auth()->user();
        //dd($user->selected_contract_id);
        $contract = Contract::orderBy('id','desc')->where(['id'=>$user->selected_contract_id])->first();
        // if ($contract==null) {
        //     $contract = Contract::orderBy('id','desc')->where(['client_id'=>$this->customer_code,'type'=>0])->first();
        // }
        return $contract;
    }

    public function getContractsAttribute()
    {
        $contracts = Contract::orderBy('id','desc')->where(['client_id'=>$this->customer_code])->get();
        return $contracts;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
