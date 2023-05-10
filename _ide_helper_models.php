<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models\Site{
/**
 * App\Models\Site\Slider
 *
 * @property int $id
 * @property string|null $ratio
 * @property string|null $title
 * @property int|null $width
 * @property int|null $height
 * @property int|null $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereRatio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereWidth($value)
 */
	class Slider extends \Eloquent {}
}

namespace App\Models\Site{
/**
 * App\Models\Site\SliderImage
 *
 * @property int $id
 * @property int $sitesliders_id
 * @property int|null $sort
 * @property string|null $picture
 * @property string|null $title
 * @property string|null $url
 * @property string|null $content
 * @property string|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SliderImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderImage whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderImage wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderImage whereSiteslidersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderImage whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderImage whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderImage whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderImage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderImage whereUrl($value)
 */
	class SliderImage extends \Eloquent {}
}

namespace App\Models\Site{
/**
 * App\Models\Site\Websitebloc
 *
 * @property int $id
 * @property int|null $sitepages_id
 * @property int|null $sitesliders_id
 * @property string|null $title
 * @property string|null $content
 * @property string|null $content_two
 * @property string|null $image
 * @property string|null $title_img
 * @property string|null $alt_img
 * @property string|null $url_image
 * @property string|null $format
 * @property int|null $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Websitebloc newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Websitebloc newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Websitebloc query()
 * @method static \Illuminate\Database\Eloquent\Builder|Websitebloc whereAltImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitebloc whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitebloc whereContentTwo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitebloc whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitebloc whereFormat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitebloc whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitebloc whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitebloc whereSitepagesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitebloc whereSiteslidersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitebloc whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitebloc whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitebloc whereTitleImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitebloc whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitebloc whereUrlImage($value)
 */
	class Websitebloc extends \Eloquent {}
}

namespace App\Models\Site{
/**
 * App\Models\Site\Websitepage
 *
 * @property int $id
 * @property string|null $lng
 * @property string|null $last_review
 * @property string|null $paginate
 * @property int $status
 * @property string|null $name
 * @property string|null $title
 * @property string|null $title_article
 * @property string $slug
 * @property string|null $thumbnail
 * @property string|null $image
 * @property string|null $alt_img
 * @property string|null $title_img
 * @property string|null $meta_title
 * @property string|null $meta_desc
 * @property string|null $author
 * @property string|null $content
 * @property int|null $count
 * @property int|null $slider_id
 * @property string|null $model
 * @property int|null $translate_id
 * @property string|null $schedul
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage query()
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage whereAltImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage whereLastReview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage whereMetaDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage wherePaginate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage whereSchedul($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage whereSliderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage whereTitleArticle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage whereTitleImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage whereTranslateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Websitepage whereUpdatedAt($value)
 */
	class Websitepage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

