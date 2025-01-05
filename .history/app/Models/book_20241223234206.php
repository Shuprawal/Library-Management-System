namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model {
    protected $table = 'books';
    protected $fillable = ['name', 'isbn', 'description', 'available_copies', 'publisherID', 'image'];
}
