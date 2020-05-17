<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable=['title'];

    const WORKOUT_CREATE = "workout create";
    const WORKOUT_SHOW= "workout show";
    const WORKOUT_EDIT= "workout edit";
    const WORKOUT_DELETE= "workout delete";
    const WORKOUT_ACCESS= "workout access";
    const ADMIN_PANEL_ACCESS="admin panel access";
    const USER_DELETE = "user delete";
    const USER_SHOW = "user show";
    const USER_INDEX = "user index";
    const ARTICLE_CREATE="blog create";
    const ARTICLE_INDEX="blog index";
    const ARTICLE_EDIT="blog edit";
    const ARTICLE_DELETE="blog delete";
    const CATEGORY_ACCESS="category access";
    const CATEGORY_INDEX="category index";
    const CATEGORY_CREATE="category create";
    const CATEGORY_EDIT="category edit";
    const CATEGORY_DELETE="category delete";
    const PROGRAM_ACCESS="program access";
    const PROGRAM_INDEX="program index";
    const PROGRAM_CREATE="program create";
    const PROGRAM_EDIT="program edit";
    const PROGRAM_DELETE="program delete";
}
