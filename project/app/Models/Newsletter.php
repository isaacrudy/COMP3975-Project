<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * required={"id"},
 * @OA\Xml(name="Newsletter"),
 * @OA\Property(
 * property="id",
 * type="integer",
 * readOnly="true",
 * example="1"
 * ),
 * @OA\Property(
 * property="Title",
 * type="string",
 * readOnly="true",
 * format="text",
 * description="Title of Newsletter",
 * example="Newsletter of the Day"
 * ),
 * @OA\Property(
 * property="Content",
 * type="string",
 * readOnly="true",
 * format="text",
 * description="Content of Newsletter",
 * example="Lorem Ipsum"
 * ),
 * @OA\Property(
 * property="ImageURL",
 * type="string",
 * readOnly="true",
 * format="text",
 * description="ImageURL of Newsletter",
 * example="https://picsum.photos/200/300"
 * ),
 * @OA\Property(
 * property="created_at",
 * readOnly="true",
 * format="datetime",
 * description="Created at.",
 * example="2022-05-18 07:50:45"
 * ),
 * @OA\Property(
 * property="updated_at",
 * readOnly="true",
 * format="datetime",
 * description="Updated at.",
 * example="2022-06-11 06:15:25"
 * ),
 * )
 */
class Newsletter extends Model
{
    use HasFactory;

    protected $fillable = ['Title', 'Content', 'ImageURL'];
}
