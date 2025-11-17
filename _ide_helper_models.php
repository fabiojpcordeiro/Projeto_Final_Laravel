<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $status
 * @property string|null $message
 * @property string|null $resume
 * @property int $candidate_id
 * @property int $job_offer_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Candidate $candidate
 * @property-read \App\Models\JobOffer $jobOffer
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereCandidateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereJobOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereResume($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereUpdatedAt($value)
 */
	class Application extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $birthdate
 * @property string $phone
 * @property string $state
 * @property string $city
 * @property string|null $bio
 * @property string|null $profile_photo
 * @property numeric $rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\JobOffer> $jobs
 * @property-read int|null $jobs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Skill> $skills
 * @property-read int|null $skills_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Candidate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Candidate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Candidate query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Candidate whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Candidate whereBirthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Candidate whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Candidate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Candidate whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Candidate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Candidate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Candidate wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Candidate wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Candidate whereProfilePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Candidate whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Candidate whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Candidate whereUpdatedAt($value)
 */
	class Candidate extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property int $state_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\State $state
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereUpdatedAt($value)
 */
	class City extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $public_email
 * @property string $state
 * @property string $city
 * @property string $street
 * @property string $number
 * @property string|null $sector
 * @property string|null $about
 * @property string|null $logo
 * @property int $review_count
 * @property string $review_sum
 * @property string $rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\JobOffer> $jobs
 * @property-read int|null $jobs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CompanyReview> $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company wherePublicEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereReviewCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereReviewSum($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereSector($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereUpdatedAt($value)
 */
	class Company extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $company_id
 * @property int $user_id
 * @property int $rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company $company
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyReview query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyReview whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyReview whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyReview whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyReview whereUserId($value)
 */
	class CompanyReview extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $job_offer_id
 * @property \Illuminate\Support\Carbon $work_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\JobOffer $jobOffer
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobDates newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobDates newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobDates query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobDates whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobDates whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobDates whereJobOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobDates whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobDates whereWorkDate($value)
 */
	class JobDates extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $company_id
 * @property string $title
 * @property string $description
 * @property string $city
 * @property string|null $sector
 * @property string|null $salary
 * @property int $is_temporary
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon $open_until
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Candidate> $candidates
 * @property-read int|null $candidates_count
 * @property-read \App\Models\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\JobDates> $dates
 * @property-read int|null $dates_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobOffer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobOffer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobOffer query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobOffer whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobOffer whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobOffer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobOffer whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobOffer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobOffer whereIsTemporary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobOffer whereOpenUntil($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobOffer whereSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobOffer whereSector($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobOffer whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobOffer whereUpdatedAt($value)
 */
	class JobOffer extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Candidate> $candidates
 * @property-read int|null $candidates_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Skill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Skill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Skill query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Skill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Skill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Skill whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Skill whereUpdatedAt($value)
 */
	class Skill extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $abbr
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\City> $cities
 * @property-read int|null $cities_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State whereAbbr($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State whereUpdatedAt($value)
 */
	class State extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $role
 * @property int|null $company_id
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company|null $company
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

