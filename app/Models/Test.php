<?php

namespace App\Models;

use App\Enums\QuestionCategory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Payment
 *
 * @property int $id
 * @property string $category
 * @property string $question
 * @property string $first_choice
 * @property string $second_choice
 * @property string $third_choice
 * @property string $fourth_choice
 * @property string $correct_answer
 * @property string $weight
 * @property boolean $status
 * @property int $created_by_id
 * @property int $updated_by_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 *
 */



class Test extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category',
        'question',
        'first_choice',
        'second_choice',
        'third_choice',
        'fourth_choice',
        'correct_answer',
        'weight',
        'status',
        'created_by_id',
        'updated_by_id',
        'deleted_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'category' => QuestionCategory::class,
        'question' => 'string',
        'first_choice' => 'string',
        'second_choice' => 'string',
        'third_choice' => 'string',
        'fourth_choice' => 'string',
        'correct_answer' => 'string',
        'weight' => 'string',
        'status' => 'boolean',
        'created_by_id' => 'int',
        'updated_by_id' => 'int',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];


    public function exams(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Exam::class)->withPivot('selected_choice')->withTimestamps();
    }

}
