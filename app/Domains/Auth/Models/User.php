<?php

namespace App\Domains\Auth\Models;

use App\Domains\Auth\Models\Traits\Attribute\UserAttribute;
use App\Domains\Auth\Models\Traits\Method\UserMethod;
use App\Domains\Auth\Models\Traits\Relationship\UserRelationship;
use App\Domains\Auth\Models\Traits\Scope\UserScope;
use App\Domains\Auth\Notifications\Frontend\ResetPasswordNotification;
use App\Domains\Auth\Notifications\Frontend\VerifyEmail;
use App\Domains\Subscription\Models\CodeChallengeSubmission;
use App\Domains\Subscription\Models\PersonalQuestion;
use App\Domains\Subscription\Models\Subscription;
use App\Domains\Subscription\Models\SubscriptionInfo;
use App\Domains\Subscription\Models\UserEnglishTest;
use App\Domains\Subscription\Notifications\VerifyCustomVerification;
use App\Domains\Subscription\Notifications\VerifyCustomSubscription;
use App\Domains\Subscription\Services\UserEnglishTestService;
use App\Models\Exam;
use DarkGhostHunter\Laraguard\Contracts\TwoFactorAuthenticatable;
use DarkGhostHunter\Laraguard\TwoFactorAuthentication;
use Database\Factories\UserFactory;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Lab404\Impersonate\Models\Impersonate;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property integer $id
 * @property string $type
 * @property string $name
 * @property string $email
 * @property string $email_verified_at
 * @property string $password
 * @property string $password_changed_at
 * @property boolean $active
 * @property string $timezone
 * @property string $last_login_at
 * @property string $last_login_ip
 * @property boolean $to_be_logged_out
 * @property string $provider
 * @property string $provider_id
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property string $phone_number
 * @property Subscription[] $subscriptions
 */
class User extends Authenticatable implements MustVerifyEmail, TwoFactorAuthenticatable
{
    use HasApiTokens,
        HasFactory,
        HasRoles,
        Impersonate,
        MustVerifyEmailTrait,
        Notifiable,
        SoftDeletes,
        TwoFactorAuthentication,
        UserAttribute,
        UserMethod,
        UserRelationship,
        UserScope;

    public const TYPE_ADMIN = 'admin';
    public const TYPE_USER = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'name',
        'email',
        'phone_number',
        'email_verified_at',
        'phone_number_verified_at',
        'password',
        'password_changed_at',
        'active',
        'timezone',
        'last_login_at',
        'last_login_ip',
        'to_be_logged_out',
        'provider',
        'provider_id',
        'verification_code',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'last_login_at',
        'email_verified_at',
        'phone_number_verified_at',
        'password_changed_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
        'last_login_at' => 'datetime',
        'email_verified_at' => 'datetime',
        'phone_number_verified_at' => 'datetime',
        'to_be_logged_out' => 'boolean',
    ];

    /**
     * @var array
     */
    protected $appends = [
        'avatar',
    ];

    /**
     * @var string[]
     */
    protected $with = [
        'permissions',
        'roles',
    ];

    /**
     * @var Subscription $subscription
     */
    private Subscription $subscription;



    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Send the registration verification email.
     * @throws \Swift_TransportException
     */

    /**
     * Send the registration verification email.
     * @throws \Swift_TransportException
     */

    /**
     * @param $subscription
     * @param $business
     */
    public function sendCustomEmailVerification($subscription, $business)
    {
        $this->subscription = $subscription;
        $this->business = $business;
        $this->sendEmailVerificationNotification();
    }
    /**
     * @param $subscription
     * @param $business
     */
    public function sendCustomEmailSubscription($subscription, $business)
    {
        $this->subscription = $subscription;
        $this->business = $business;
        $this->sendEmailSubscriptionNotification();
    }
    /**
     * Return true or false if the user can impersonate an other user.
     *
     * @param void
     * @return bool
     */
    public function canImpersonate(): bool
    {
        return $this->can('admin.access.user.impersonate');
    }

    /**
     * Return true or false if the user can be impersonate.
     *
     * @param void
     * @return bool
     */
    public function canBeImpersonated(): bool
    {
        return ! $this->isMasterAdmin();
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return UserFactory::new();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function subscription(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Subscription::class);
    }

        /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function subscriptionInfo(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(SubscriptionInfo::class);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function personalQuestion(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(PersonalQuestion::class);
    }
    public function userEnglishTest(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(UserEnglishTest::class);
    }
    public function codeChallengeSubmission(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(CodeChallengeSubmission::class);
    }

    public function exams(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Exam::class);
    }
}
