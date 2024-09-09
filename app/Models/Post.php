<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// Fitur ini namanya Eloquent ORM
class Post extends Model // Ini langsung menghubung ke database dengan table posts
{
    // ! Kalo misalanya nama databasenya beda sama yang di default dari laravel kita bisa menambahkan protected $table = 'nama_table';
    // ! Kalo misalnya nama primary keynya bu kan id kita bisa menambahkan protected $primaryKey = 'nama_primary_key';

    use HasFactory;

    protected $with = ['author', 'category']; // * Ini untuk mengambil data author dan category secara eager laoding

    // * Kalo misalnya kita pakai yang find method bisa sebenernya ada di laravel tapi defaultnya itu buat nyari ID nah kita bisa atur menggunakan fitur Route Model Binding
    public static function find_buatan_sendiri($slug) :array // Mmeberikan expetasi terkait pengembaliannya harus apa
    {
        // * Karena kita memanggil function di kelas yang sama dan static kit  memanggilnya menggunakan static
        // * Kalo misalnya dia tidak static kita bisa pakai this
        // ! Disini kita pakai use $slug karena tidak bisa ngintip ke luar function dia alias $ slug yang menjadi global variable di funtion lain
        // $post = Arr::first(static::all(), function ($post) use ($slug) {
        //     return $post['slug'] == $slug;
        // });
        //  * Di bawah ini kita menggunakan arrow function yang lebih simple untuk mengembalikan nilai
        $post = Arr::first(static::all(), fn($post) => $post['slug'] == $slug);
        if (!$post){
            abort(404); // kalo gak ada ke 404
        } else {
            return $post;
        }
    }

    // ! Kita bisa pakai tinker di comand line buat oprek atau coba coba data dummy ke database
    // ! Sebelum itu kita harus ngasih tahu dulu apakah model ini fillabel atau protected
    protected $fillable = ['title', 'slug', 'body'];

    public function author() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category() :BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function nomertlpn() :array
    {
        return [
            [
                'nomor' => '08123456789'
            ],
            [
                'nomor' => '08123456789'
            ],
            [
                'nomor' => '08123456789'
            ]
            ];
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        // ! Pake tenary
        // if(isset($filters['search']) ? $filters['search'] : false){
        //     $query->where('title', 'like', '%'.request('search'). '%');
        // }

        // ! Pake null coalescing operator
        $query->when($filters['search'] ?? false, function($query, $search){
            $query->where('title', 'like', '%'.$search. '%');
        });

        $query->when($filters['category'] ?? false, 
                fn($query, $category) => 
                $query->whereHas('category', fn($query) => $query->where('slug', $category)));
        
        $query->when($filters['author'] ?? false, 
                fn($query, $author) =>
                $query->whereHas('author', fn($query) => $query->where('username', $author)));
    }
}

?>