<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Account extends Model
{
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'accounts';

    /**
     * Mass assignable fields.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'city',
        'postal_code',
        'country',
        'about',
        'website',
        'facebook_page',
        'twitter_page',
        'phone',
        'profile_image'
    ];

    /**
     * Returns all related User accounts
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Returns all related Events.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    /**
     * Returns all related Ticket Types.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ticketTypes()
    {
        return $this->hasMany(TicketType::class);
    }

    /**
     * Returns all related Payment Gateways.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function paymentGateways()
    {
        return $this->belongsToMany(PaymentGateway::class, 'account_payment_gateways', 'payment_gateway_id', 'account_id');
    }

    /**
     * Updates the given Account.
     *
     * @param Request $request
     * @param $id
     */
    public static function updateAccount(Request $request, $id)
    {
        $account = Account::find($id);
        $account->name = $request->name;
        $account->address = $request->address;
        $account->city = $request->city;
        $account->postal_code = $request->postalCode;
        $account->country = $request->country;
        $account->about = $request->about;
        $account->website = $request->website;
        $account->facebook_page = $request->facebook;
        $account->twitter_page = $request->twitter;
        $account->phone = $request->phone;
        $account->profile_image = Helpers::uploadImage($request, 'profile-images', 'profileImage');
        $account->updated_at = Carbon::now('Europe/Istanbul');
        $account->save();
    }
}
