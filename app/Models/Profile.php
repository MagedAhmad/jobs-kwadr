<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use Spatie\MediaLibrary\HasMedia;
use App\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Http\Filters\ProfileFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

class Profile extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasUploader;
    use Filterable;
    use Selectable;
    use SoftDeletes;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'media',
    ];

    /**
     * The query parameter's filter of the model.
     *
     * @var string
     */
    protected $filter = ProfileFilter::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Gender male type.
     *
     * @var string
     */
    const MALE = 'male';

    /**
     * Gender female type.
     *
     * @var string
     */
    const FEMALE = 'female';

    /**
     * Define the media collections.
     *
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('default');
    }

    /**
     * Get martial
     *
     * @return void
     */
    public function martial()
    {
        return $this->belongsTo(Martial::class);
    }

    /**
     * Get country
     *
     * @return void
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get city
     *
     * @return void
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Get area
     *
     * @return void
     */
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * Get job Type
     *
     * @return void
     */
    public function job_type()
    {
        return $this->belongsTo(JobType::class);
    }

    /**
     * Get job field
     *
     * @return void
     */
    public function job_field()
    {
        return $this->belongsTo(JobField::class);
    }

    /**
     * Get skill
     *
     * @return void
     */
    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    /**
     * Get employer
     *
     * @return void
     */
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    /**
     * Get supporter
     *
     * @return void
     */
    public function supporter()
    {
        return $this->belongsTo(Supporter::class);
    }

    /**
     * Get training type
     *
     * @return void
     */
    public function training_type()
    {
        return $this->belongsTo(TrainingType::class);
    }
}
